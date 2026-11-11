# Documentación Técnica — Avance 6: Sección Interactiva «Departamentos en Estreno», Homologación de Proyectos «Terminados» y Nuevas Propiedades

**Proyecto:** Oportunidades Inmobiliarias Perú (`oportunidadesinmobiliariasperu.com`)  
**Fecha:** 11 de noviembre de 2026  
**Avance:** Avance 6  
**Repositorio:** Rama `main`  

---

## 1. Resumen Ejecutivo

En el **Avance 6** se diseñó, desarrolló e integró la nueva sección interactiva **«Departamentos en estreno»** en la página principal (`index.php`), posicionada estratégicamente entre los apartados *«Nuestros proyectos»* y *«Propiedades destacadas»*, bajo un diseño de **Acordeón Arquitectónico Expandible** inspirado en portales inmobiliarios contemporáneos.

Adicionalmente:
1. Se integró el acceso directo a **«Departamentos en estreno»** dentro del megamenú desplegable de **Departamentos** (`header.php`) y como una subsección/pestaña dedicada (`?tab=estreno`) dentro del catálogo general (`departamentos.php`).
2. Se homologó en todo el sitio web la denominación **«Entregado / Entregados»** por **«Terminado / Terminados»** (*Proyectos terminados*).
3. Se configuró la sección de **«Departamentos en estreno»** para mostrar exclusivamente departamentos **«Terminados»** (excluyendo los proyectos en construcción).
4. Se crearon **3 nuevas propiedades de departamentos terminados de estreno** (*Terrazas de Vallecito*, *Residencial Los Arces* y *Mirador de Santa Catalina*, reemplazando a *Torres del Sol* y *Condominio Verde*), generando **9 fotografías exclusivas en formato `.webp`** optimizado y conservando el visor **Vista 360°** y **Tour 360** interactivo.
5. Se implementó la redirección interactiva adaptada por formato en el acordeón del Home (clic directo en Desktop; primer toque para expandir y segundo toque para redirigir en Móvil/Tablet) junto con carga diferida (`IntersectionObserver`) para proteger el rendimiento en Google PageSpeed.

---

## 2. Detalle Técnico de las Implementaciones

### 2.1. Nueva Sección «Departamentos en Estreno» en el Home (`index.php` y `css/styles2k2k2.css`)
- **Ubicación en el DOM:** Insertada en `index.php` entre `section.projects-home` (*Nuestros proyectos*) y `section.featured-grid-section` (*Propiedades destacadas*).
- **Diseño UI/UX (Acordeón Arquitectónico Expandible):**
  - Compuesto por 4 paneles interactivos (`.estreno-panel`) dentro de `.estreno-accordion`.
  - **Estado contraído:** Muestra únicamente la píldora superior con el distrito (`glassmorphism` con `backdrop-filter: blur(8px)`) y el nombre del proyecto en la parte inferior sobre un degradado oscuro suave.
  - **Estado expandido (`.is-active`):** Se expande suavemente (`flex: 3.4` en Desktop, `flex: 2.8` en Tablet y `height: 255px` en Móvil) revelando la fotografía arquitectónica a todo color (`grayscale(0%)`) y únicamente los 3 datos esenciales:
    1. Nombre del proyecto y distrito.
    2. Resumen tipológico (`Dormitorios · Área m²`).
    3. Precio (`Desde S/ ...`).
  - **Cabecera de sección:** Incluye el enlace directo `Ver todos →` hacia `/departamentos?tab=estreno`.
- **Comportamiento Interactivo Adaptativo por Formato:**
  - **Formato Desktop (`> 992px` con puntero/hover):** Al pasar el cursor (`mouseenter`), el panel se expande automáticamente; al hacer **clic** sobre la propiedad, redirige de inmediato a su ficha individual (`/departamentos/<slug>`).
  - **Formato Celular y Tablet (`<= 992px` o pantallas táctiles):**
    - **1.er toque** sobre una tarjeta contraída: intercepta el evento (`e.preventDefault()`) y agranda la tarjeta (`.is-active`) para que el usuario revise la fotografía, metraje y precio.
    - **2.º toque** sobre la tarjeta ya desplegada: ejecuta la redirección automática hacia la ficha de la propiedad.
  - **Accesibilidad por teclado:** Soporte para navegación mediante tecla `Tab` (`keyup`) y atributos `aria-expanded` / `aria-label`.

---

### 2.2. Integración en el Megamenú y Catálogo de Departamentos (`header.php` y `departamentos.php`)
- **Megamenú de Navegación (`header.php`):**
  - Se incorporó el bloque **«Departamentos en estreno»** con ícono `ri-key-2-line` dentro del desplegable de *Departamentos*, listando los 4 proyectos terminados de estreno (*Terrazas de Vallecito*, *Residencias del Norte*, *Residencial Los Arces* y *Mirador de Santa Catalina*) junto con el enlace destacado **«Ver todos →»** (`/departamentos?tab=estreno`).
- **Subsección en el Catálogo (`departamentos.php`):**
  - Se agregó la pestaña **«Departamentos en estreno»** (`data-target="estreno"`) con contador dinámico y el contenedor `#panel-estreno`.
  - Soporte para activación directa por URL mediante el parámetro GET `?tab=estreno`, manteniendo el diseño de grilla de tarjetas (`includes/card-propiedad.php`) y el sidebar lateral de filtros por dormitorios y precio máximo.
  - Se corrigió el cierre de etiqueta `<div class="filter-group">` en el sidebar y se agregó activación inmediata de `.reveal-card.is-visible` al alternar entre pestañas.

---

### 2.3. Cambio Global de Denominación: «Entregado» a «Terminado»
Se reemplazó toda aparición visible al usuario de *«Entregado / Entregados»* por *«Terminado / Terminados»* manteniendo la clave interna `'estado' => 'entregado'` para preservar las reglas CSS (`.badge--entregado`):
- `header.php`: Columna *«Proyectos terminados»* en el menú de Departamentos y enlace en el menú *Nosotros*.
- `departamentos.php`: Meta título, meta descripción, subtítulo del hero, pestaña *«Terminados»* y encabezado *«Proyectos terminados»*.
- `includes/card-propiedad.php`: Etiqueta de estado superior derecha cambiada a `Terminado`.
- `departamentos/detalle.php` y `terrenos/detalle.php`: Insignias de estado actualizadas a `✅ Terminado` y `Terminado`.
- `data/propiedades.php`: Etiquetas `tag`, fechas de entrega (`Terminado 2023`, `Terminado 2025`) y descripciones actualizadas.
- `depas/index.php` y `blog.php`: Metadatos y enlaces secundarios actualizados a *«terminados»*.

---

### 2.4. Nuevos Departamentos Terminados de Estreno y Galerías WebP (`data/propiedades.php`)
Se filtró el apartado de **«Departamentos en estreno»** para incluir únicamente departamentos **«Terminados»** (excluyendo los que están *«En construcción»*) y se conformó el portafolio de 4 proyectos terminados de estreno:

| # | Proyecto | Slug / URL | Ubicación | Precio | Área / Tipología | Imágenes WebP Nuevas |
|---|----------|------------|-----------|--------|------------------|----------------------|
| 1 | **Residencias del Norte** | `/departamentos/residencias-norte` | José L. Bustamante, Arequipa | S/ 240,000 | 70–90 m² · 3 dorm · 2 baños | *(Existentes optimizadas)* |
| 2 | **Residencial Los Arces** *(reemplaza a Torres del Sol)* | `/departamentos/residencial-los-arces` | Cayma, Arequipa | S/ 295,000 | 82–105 m² · 3 dorm · 2 baños | `arces-fachada.webp` (122 KB)<br>`arces-sala.webp` (117 KB)<br>`arces-dormitorio.webp` (73 KB) |
| 3 | **Mirador de Santa Catalina** *(reemplaza a Condominio Verde)* | `/departamentos/mirador-santa-catalina` | Yanahuara, Arequipa | S/ 235,000 | 68–88 m² · 2 dorm · 2 baños | `catalina-fachada.webp` (108 KB)<br>`catalina-sala.webp` (84 KB)<br>`catalina-dormitorio.webp` (76 KB) |
| 4 | **Terrazas de Vallecito** *(nuevo)* | `/departamentos/terrazas-de-vallecito` | Vallecito, Arequipa | S/ 265,000 | 78–98 m² · 3 dorm · 2 baños | `vallecito-fachada.webp` (135 KB)<br>`vallecito-sala.webp` (95 KB)<br>`vallecito-dormitorio.webp` (79 KB) |

- **Visor 360° y Tour Virtual 360:** Las 3 nuevas propiedades heredan automáticamente la configuración `$tour_360_default` en `data/propiedades.php` (Visor Panorámico 360° exterior + Tour Virtual 3D interactivo con escenas de *Sala Principal*, *Cocina* y *Dormitorio Principal*).

---

### 2.5. Optimizaciones de Rendimiento (Google PageSpeed / Core Web Vitals)
1. **Carga diferida (`IntersectionObserver`) de fondos en el Home:** Los paneles `.estreno-panel` utilizan el atributo `data-bg` y solo descargan sus imágenes `.webp` cuando el usuario hace scroll a menos de `350px` de la sección, evitando competir en ancho de banda con la imagen LCP del Hero.
2. **Compresión WebP (`1280×714 px`, calidad 82):** Las 9 imágenes generadas pesan entre **73 KB y 135 KB** cada una.
3. **Estabilidad Visual (CLS = 0):** Alturas fijas en Desktop (`430px`), Tablet (`360px`) y suma constante en Móvil (`1 × 255px + 3 × 72px`), garantizando cero desplazamientos de diseño al interactuar con el acordeón.
4. **Cache Busting:** Actualización de versión de hoja de estilos en `header.php` a `/css/styles2k2k2.css?v=0.2.7`.

---

## 3. Inventario de Archivos Modificados y Nuevos (Para Despliegue en SiteGround)

### Archivos Modificados (11)
1. `/index.php`
2. `/header.php`
3. `/departamentos.php`
4. `/data/propiedades.php`
5. `/css/styles2k2k2.css`
6. `/includes/card-propiedad.php`
7. `/departamentos/detalle.php`
8. `/terrenos/detalle.php`
9. `/depas/index.php`
10. `/blog.php`
11. `/sitemap.xml`

### Archivos Nuevos de Imagen en `/img/proyectos/` (9)
1. `/img/proyectos/arces-fachada.webp`
2. `/img/proyectos/arces-sala.webp`
3. `/img/proyectos/arces-dormitorio.webp`
4. `/img/proyectos/catalina-fachada.webp`
5. `/img/proyectos/catalina-sala.webp`
6. `/img/proyectos/catalina-dormitorio.webp`
7. `/img/proyectos/vallecito-fachada.webp`
8. `/img/proyectos/vallecito-sala.webp`
9. `/img/proyectos/vallecito-dormitorio.webp`
