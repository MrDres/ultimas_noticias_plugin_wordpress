<?php
/**
 * Plugin Name: Ultimos Posts Grid
 * Description: Muestra las últimas entradas en un grid con imagen y título superpuesto, puede modificarse el numero de posts a buscar y filtrar por categorias.
 * Version: 1.0
 * 
 * Author: André  M. Santamaría Regal
 */

 //Instrucciones de uso del plugin ver documentacion.md
 // Seguridad
 if ( ! defined( 'ABSPATH' ) ) exit;

 // añadir estilos
 function lpg_enqueue_styles() {
     wp_enqueue_style( 'lpg-grid-style', plugin_dir_url( __FILE__ ) . 'css/grid-style.css' );
 }
 add_action( 'wp_enqueue_scripts', 'lpg_enqueue_styles' );

 // Shortcode [ultimos_posts_grid]

 function lpg_ultimos_posts_grid($atts) {
 // Valor por defecto: 6 posts
    $atts = shortcode_atts( array(
        'posts' => 6,
        'category' => '', //Probando a añadir seleccion por categoría
    ), $atts, 'ultimos_posts_grid' );

     $args = array(
         'post_type' => 'post',
         'posts_per_page' => intval($atts['posts']),
         'orderby' => 'date',
         'order' => 'DESC',
         'post_status' => 'publish',
     );
     // Si se especifica una categoria añadirlo a la consulta
     if ( !empty($atts['category']) ) {
        $args['category_name'] = sanitize_text_field($atts['category']);
    }

     $query = new WP_Query( $args );

     $output = '<div class="lpg-grid">';

     while ( $query->have_posts() ) {
         $query->the_post();
         $image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
        //  if ( $image_url ) {
       
        // $parsed = wp_parse_url( $image_url ); // Convierte la URL absoluta en ruta relativa
        // $image_url = isset($parsed['path']) ? $parsed['path'] : $image_url; // Convierte la URL absoluta en ruta relativa
        // } 

         $title = get_the_title();
         
         $permalink = get_permalink();
         
         if ( $permalink ) {
        // Convierte la URL absoluta en ruta relativa
         $parsed = wp_parse_url( $permalink );
         $permalink = isset($parsed['path']) ? $parsed['path'] : $permalink;
        }
         $output .= '<div class="lpg-grid-item" style="background-image: url(' . esc_url( $image_url ) . ');">';
         $output .= '<a href="' . esc_url( $permalink ) . '">';
         $output .= '<div class="lpg-title">' . esc_html( $title ) . '</div>';
         $output .= '</a>';
         $output .= '</div>';
         
     }
     // Esta funcion se utiliza para resetear la variable global $post a su estado original despues de haberla reordenado con la WP_Query
     wp_reset_postdata();

     $output .= '</div>';

     return $output;
 }
 // con esto se crea un shortcode para poder utilizar el plugin en las entradas
 add_shortcode( 'ultimos_posts_grid', 'lpg_ultimos_posts_grid' );

 