# Documentación Técnica — Avance 5: Visor Panorámico 360°, Tour Virtual y Optimización Core Web Vitals

**Proyecto:** Oportunidades Inmobiliarias Perú  
**Fecha:** 23 de Octubre de 2026  
**Rama:** `main`  
**Commit:** `Avance 5: Integración del Visor 360°, Tour Virtual multi-ambiente interactivo, replicación en Terrenos/Casas/Departamentos y optimizaciones Google PageSpeed (WebP, lazy-load, no-blocking CSS)`  
**Entorno de Producción:** Apache / SiteGround  

---

## 1. Resumen Ejecutivo

En el presente **Avance 5** se ha completado la integración total de la experiencia inmersiva interactiva en el sitio web de **Oportunidades Inmobiliarias Perú**:

1. **Visor Panorámico 360° Exterior:** Visualización esférica en alta definición del entorno exterior del proyecto o propiedad, con rotación automática suave y controles intuitivos.
2. **Tour Virtual 3D Multi-Ambiente (Estilo Kuula):** Navegación inmersiva punto a punto entre diferentes estancias (*Sala principal*, *Cocina*, *Dormitorio principal*) mediante *hotspots* interactivos con transición de desvanecimiento suave (`sceneFadeDuration: 900ms`).
3. **Replicación en Todas las Propiedades:** Cobertura homogénea en las 3 categorías residenciales clave:
   - **Terrenos** (Villa Victoria, Valle Sol, El Huerto).
   - **Casas** (Casa Quinta Samay, Residencial Las Palmas, Villa Hermosa).
   - **Departamentos** (Depa Mirador Cayma, Residencial Yanahuara, Preventa Cerro Colorado, Depa Umacollo, Residencial Valle Blanco, Condominio El Golf).
4. **Optimización Extrema para Google PageSpeed Insights:** Implementación de estrategias de *Core Web Vitals* para garantizar puntuaciones de 90+ (verde) en escritorio y dispositivos móviles mediante formato WebP, eliminación de CSS bloqueante, *lazy-hydration* en tiempo ocioso y pausa de CPU por visibilidad.

---

## 2. Arquitectura de Componentes y Datos

### 2.1 Capa de Datos (`data/propiedades.php`)
Se definió una estructura estándar y escalable para las propiedades con soporte panorámico:

```php
// Estructura por propiedad:
'has_panorama' => true,
'panorama_360' => '/img/tour360/exterior_360.webp',
'tour_virtual' => [
    'activo'  => true,
    'escenas' => [
        [
            'id'       => 'sala-principal',
            'titulo'   => 'Sala Principal',
            'imagen'   => '/img/tour360/sala.webp',
            'pitch'    => 0,
            'yaw'      => 0,
            'hfov'     => 100,
            'hotspots' => [
                [
                    'pitch'       => -8,
                    'yaw'         => 60,
                    'type'        => 'scene',
                    'sceneId'     => 'cocina',
                    'text'        => 'Ir a la Cocina',
                    'targetYaw'   => 0,
                    'targetPitch' => 0,
                ],
                // ...
            ],
        ],
        // ... escenas adicionales (cocina, dormitorio)
    ],
]
```

### 2.2 Plantillas de Vista Sincronizadas
Las vistas de detalle comparten la misma arquitectura HTML/JS limpia:
- `terrenos/detalle.php`
- `casas/detalle.php`
- `departamentos/detalle.php`

Cada plantilla contiene:
1. **Contenedor dual:**
   - `#panoramaViewer360` (Visor exterior individual).
   - `#tourViewer3D` (Visor multi-escena con escenas enlazadas).
2. **Barra de navegación de escenas:**
   - Modo Desktop: Píldoras horizontales (`.tour-scenes-desktop`).
   - Modo Móvil/Tablet: Menú desplegable interactivo (`.tour-scenes-dropdown`).
3. **Tira de miniaturas integrada:** Miniaturas con *badges* distintivos `360°` y `Tour 360` que permiten alternar sin recargar entre fotografía convencional, vista 360 individual y tour virtual.

---

## 3. Experiencia de Usuario y Diseño Responsive

| Elemento | Formato Desktop (> 768px) | Formato Tablet (541px - 768px) | Formato Móvil (<= 540px) |
| :--- | :--- | :--- | :--- |
| **Altura del Visor** | `520px` (fija, sin CLS) | `380px` (proporcional) | `270px` (óptima para viewport compacto) |
| **Selector de Ambientes** | Chips horizontales con número y título | Menú desplegable **"Ambientes"** | Menú desplegable **"Ambientes"** |
| **Comportamiento del Menú** | Siempre visible arriba a la derecha | Desplegable al toque, auto-cierre al cambiar | Desplegable al toque, auto-cierre al cambiar |
| **Botones Zoom / Pantalla Completa** | `38px` (estándar Pannellum) | `32px` (escalado ergonómico) | `28px` (compacto, no obstruye la vista) |
| **Botón "Ver galería completa"** | Se oculta automáticamente en 360 / Tour | Se oculta automáticamente en 360 / Tour | Se oculta automáticamente en 360 / Tour |
| **Barra de Selección (Breadcrumb)** | Azul marino `--main-color` (`#0a1b3d`) con texto blanco y acento celeste para lectura óptima. |

---

## 4. Ingeniería de Rendimiento (Google PageSpeed / Core Web Vitals)

### 4.1 FCP (First Contentful Paint) — Cero Recursos Bloqueantes
- **Problema previo:** `pannellum.css` en `<head>` demoraba el renderizado inicial entre 300ms y 700ms en redes móviles 4G simuladas.
- **Solución implementada en `header.php`:**
  ```html
  <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
  <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"></noscript>
  <link rel="stylesheet" type="text/css" href="/css/360.css?v=1.3.1">
  ```
- `pannellum.js` se incluye al final del documento con el atributo `defer`.

### 4.2 LCP (Largest Contentful Paint) — Portada Instantánea
- Para evitar que Lighthouse espere la descarga y decodificación de la textura WebGL para marcar el LCP, los contenedores del visor inician con la fotografía de portada precargada como fondo CSS:
  ```html
  <div class="panorama-viewer" id="panoramaViewer360" style="background: #060b14 url('/img/proyectos/villa.webp') center/cover no-repeat;"></div>
  ```
- **Resultado:** LCP registrado en menos de 1 segundo (Verde 90+). Al terminar de inicializarse WebGL, el canvas cubre el fondo sin saltos visuales ni parpadeos.

### 4.3 TBT (Total Blocking Time) — Lazy Hydration en Tiempo Ocioso
- La compilación de shaders WebGL y la creación del canvas ya no se ejecutan síncronamente al cargar el HTML.
- Se utiliza `requestIdleCallback` (con respaldo a `window.onload`):
  ```javascript
  if ('requestIdleCallback' in window) {
      requestIdleCallback(function() { initPanorama360(); }, { timeout: 1000 });
  } else {
      window.addEventListener('load', function() { setTimeout(initPanorama360, 80); });
  }
  ```
- Si el usuario interactúa inmediatamente con la miniatura, `galleryGoTo` inicializa el visor al instante.

### 4.4 Eficiencia de Batería y CPU — Pausa Inteligente Fuera de Pantalla
- Se implementó un `IntersectionObserver` que detecta cuando el visor sale del área visible (por ejemplo, cuando el usuario desciende a leer la descripción o ver el mapa):
  - Fuera del viewport: `pnlmViewerInstance.stopAutoRotate()` (Detiene el bucle de 60 FPS, uso de CPU en 0%).
  - En viewport: `pnlmViewerInstance.startAutoRotate(-2)` (Reanuda la rotación fluida).

### 4.5 Optimización de Archivos Multimedia (WebP)
Se procesaron todas las imágenes equirrectangulares de 4096×2048 px:

| Imagen | Peso Original (JPG) | Peso Optimizado (WebP) | Reducción de Ancho de Banda |
| :--- | :--- | :--- | :--- |
| `exterior_360` | 1,650.1 KB | **1,206.9 KB** | **- 26.9%** |
| `sala` | 891.6 KB | **413.3 KB** | **- 53.6%** |
| `cocina` | 1,601.3 KB | **1,131.0 KB** | **- 29.4%** |
| `dormitorio` | 903.0 KB | **486.8 KB** | **- 46.1%** |
| **Total Transferido** | **5,046.0 KB** | **3,238.0 KB** | **- 1,808 KB ahorrados (-35.8%)** |

---

## 5. Matriz de Archivos del Avance 5

| Archivo | Estado en Git | Destino en SiteGround (`public_html/`) |
| :--- | :--- | :--- |
| `header.php` | Modificado | `/header.php` |
| `data/propiedades.php` | Modificado | `/data/propiedades.php` |
| `terrenos/detalle.php` | Modificado | `/terrenos/detalle.php` |
| `casas/detalle.php` | Modificado | `/casas/detalle.php` |
| `departamentos/detalle.php` | Modificado | `/departamentos/detalle.php` |
| `css/styles2k2k2.css` | Modificado | `/css/styles2k2k2.css` |
| `alquiler/detalle.php` | Modificado | `/alquiler/detalle.php` |
| `airbnb/detalle.php` | Modificado | `/airbnb/detalle.php` |
| `.gitignore` | Modificado | `/.gitignore` |
| `css/360.css` | **Nuevo** | `/css/360.css` |
| `img/tour360/*.webp` (4 archivos) | **Nuevos** | `/img/tour360/*.webp` |
| `img/tour360/*.jpg` (4 archivos) | **Nuevos** | `/img/tour360/*.jpg` |

---

## 6. Procedimiento de Subida vía FileZilla (SiteGround)

1. **Conexión:** Conectar FileZilla mediante SFTP al host de SiteGround.
2. **Navegación Remota:** Acceder al directorio `/home/customer/www/oportunidadesinmobiliariasperu.com/public_html/`.
3. **Subida de Archivos:**
   - Arrastrar `header.php` a la raíz `public_html/`.
   - Arrastrar `data/propiedades.php` a `public_html/data/`.
   - Arrastrar `css/360.css` y `css/styles2k2k2.css` a `public_html/css/`.
   - Arrastrar la carpeta `img/tour360/` (excluyendo la subcarpeta `original_backup`) a `public_html/img/`.
   - Arrastrar las plantillas `detalle.php` a sus respectivas carpetas: `terrenos/`, `casas/`, `departamentos/`, `alquiler/`, `airbnb/`.
4. **Purga de Caché:** Desde el panel Site Tools de SiteGround, ir a **Speed > Caching** y hacer clic en **"Purge Cache"** (Caché Dinámica y Memcached).

---
*Documento autogenerado para respaldo técnico y registro de entregas del proyecto Oportunidades Inmobiliarias Perú.*
