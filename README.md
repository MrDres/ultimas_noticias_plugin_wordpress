# Plugin: Ultimos Posts Grid

## 📜 Descripción:
Este plugin de WordPress permite mostrar las últimas entradas publicadas del wordpress en formato de cuadrícula (grid) con imagen destacada y título superpuesto, mediante un shortcode personalizable.

---

## 💻 Instalación
Copia la carpeta del plugin noticias2 en la carpeta wp-content/plugins de tu wordpress.
Activa el plugin desde el panel de administración de WordPress.
Asegúrate de que el archivo de estilos grid-style.css está presente en la carpeta CSS del plugin.

---

## 💡 Uso
Utiliza el siguiente shortcode en cualquier entrada o página para mostrar el grid de posts, por defecto se mostraran las 6 ultimas entradas publicadas: 
``` [ultimos_posts_grid] ```

### 1️⃣ Uso del atributo posts
Puedes personalizar el número de posts mostrados utilizando el siguiente shortcode, modificando la cantidad en posts para que muestre los requeridos:
``` [ultimos_posts_grid posts=6] ```

### 2️⃣ Uso del atributo category
Ahora puedes filtrar los posts por una categoría específica usando el atributo category en el shortcode.
Por ejemplo, para mostrar los 6 últimos posts de la categoría "noticias":

Donde noticias es el slug de la categoría que quieres mostrar.

Ejemplo de uso
Mostrar posts de la categoría "eventos" (por defecto 6 ultimos):
``` [ultimos_posts_grid category=eventos] ```

Mostrar 8 posts de la categoría "blog":
``` [ultimos_posts_grid posts=8 category=blog] ```

---

## ⚡ Funcionalidad
### 🔖 Shortcode: 
```[ultimos_posts_grid]```
### Atributos:
- 1️⃣ **posts (opcional):** Número de entradas a mostrar (por defecto, 6).
Ejemplo mostrar 4 ultimos posts ```[ultimos_posts_grid posts=4] ```.
- 2️⃣ **category (opcional):** Slug de la categoría a mostrar. Ejemplo: `[ultimos_posts_grid posts=4 category=noticias]`

### 👁️ Visualización:
- Muestra las entradas en una cuadrícula de 3 columnas.
- Cada celda muestra la imagen destacada como fondo y el título superpuesto.
- El título se limita a dos líneas y el fondo es oscuro y translúcido para mejorar la legibilidad.
- El grid es responsive y se adapta a diferentes tamaños de pantalla.

---

### 🎨 Estilos principales (grid-style.css)
- 1️⃣ **.lpg-grid:** Define el grid de 3 columnas y el espacio entre elementos.
- 2️⃣ **.lpg-grid-item:** Define el aspecto de cada celda, con imagen de fondo, borde redondeado y sombra.
- 3️⃣ **.lpg-title:** Título superpuesto, centrado, con fondo oscuro translúcido y limitado a dos líneas.

---

### 📓 Notas
-  Si una entrada no tiene imagen destacada, el fondo de la celda puede quedar vacío.
-  El plugin solo muestra entradas publicadas (post_status = publish).



