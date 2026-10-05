---
name: inmobiliaria-ui-design
description: >-
  Usa esta skill cuando el usuario pida crear, modificar o mejorar la interfaz
  visual del proyecto "Oportunidades Inmobiliarias Peru". Aplica cuando se
  necesite agregar secciones, componentes, cards de propiedades, CTAs, estilos
  CSS o cualquier elemento visual en el stack PHP + Vanilla CSS del proyecto.
  Tambien activarla para decisiones de paleta de colores, tipografia, layout
  responsive o patrones UX del sitio inmobiliario peruano.
---

# Skill: UI/UX Design - Oportunidades Inmobiliarias Peru

Guia de diseno e implementacion visual para el sitio web inmobiliario
peruano. Toda decision de interfaz debe seguir estas instrucciones antes
de escribir codigo.

---

## 1. Stack Tecnologico (INMUTABLE - no modificar)

| Capa | Tecnologia | Restriccion |
|---|---|---|
| Estructura | PHP puro con includes | Solo `header.php` / `footer.php` |
| Estilos | Vanilla CSS (`css/styles2k2k2.css`) | Sin Tailwind, sin Bootstrap |
| Fuente | `Kanit` - Google Fonts (100, 300, 600, 800) | No cambiar familia tipografica |
| Iconos | `flaticon_inmobiliaria` + RemixIcon 3.5.0 | Preferir flaticon antes de RemixIcon |
| Animaciones | Animate.css 3.7.2 + GSAP 3.4.2 | No agregar librerias nuevas |
| Slider | Swiper 8 (`swiper-bundle`) | No usar Slick en paginas nuevas |
| Alerts | SweetAlert legacy (NO SweetAlert2) | Ya incluido en `footer.php` |
| jQuery | 3.7.1 (CDN, cargado en footer) | Disponible globalmente como `$` |

**Regla critica:** Todo CSS va en `css/styles2k2k2.css`. Estilos de
alcance de una sola pagina pueden ir en `<style>` en el `.php`
correspondiente, pero nunca en atributos `style=""` inline.

---

## 2. Design Tokens (CSS Custom Properties)

Usar **siempre** las variables definidas en `:root`. Nunca hardcodear colores.

```css
--main-color: #0a1b3d        /* Azul marino -- headers, navbars, footers, fondos oscuros */
--main2-color: #386dbd       /* Azul medio -- enlaces, elementos secundarios */
--accent-color: #97DEFA      /* Celeste -- hover, focus, CTA secundario, highlights */
--gold-color: #b1976b        /* Dorado -- badges premium, precios especiales */
--text-color: #41474f        /* Texto base */
--alter-main: #f6f6f6        /* Fondo claro alternativo de secciones */
--raphi-color: #ff9a00       /* Naranja -- CTAs secundarios, badges de oferta */
--white-color: #ffffff
--black-color: #3a3132
--sombra: 0 6px 8px hsla(220, 68%, 12%, .2)
--normal-font-size: .938rem  /* 1rem en mayor o igual a 1024px */
--small-font-size: .813rem   /* .875rem en mayor o igual a 1024px */
--font-medium: 300
--font-semi-bold: 600
```

### Guia de uso de color por intencion

| Intencion | Color a usar |
|---|---|
| Fondo hero / header / nav / footer | `--main-color` |
| CTA principal | bg `--main-color` + color `--accent-color` o blanco |
| CTA secundario / oferta | `--raphi-color` |
| Badge premium / precio especial | `--gold-color` |
| Hover / estado activo | `--accent-color` |
| Seccion alternada (fondo claro) | `--alter-main` |
| Seccion de contraste (fondo oscuro) | clase `bg-accent` usa `--main-color` |

---

## 3. Clases de Layout Utilitarias Existentes

Usar siempre estas clases antes de crear CSS nuevo:

```html
<!-- Contenedores -->
<div class="l-container">   <!-- Contenedor centrado con max-width -->
<div class="f-container">   <!-- Contenedor full-width -->

<!-- Espaciado vertical (divs vacios para padding de seccion) -->
<div class="pd1"></div>     <!-- Padding pequeno -->
<div class="pd2"></div>     <!-- Padding grande -->

<!-- Fondos de seccion predefinidos -->
<section class="bg-accent"> <!-- Fondo azul marino (--main-color) -->
<section class="bg-light">  <!-- Fondo claro (--alter-main) -->

<!-- Columnas two-column layout -->
<div class="columns-two__center">
  <div class="column-60__content"> <!-- 60% ancho -->
  <div class="column-40__content"> <!-- 40% ancho -->
```

---

## 4. Iconos Disponibles - flaticon_inmobiliaria

Usar con la clase `flaticon-` como prefijo en elemento `<i>` o `<div>`:

```
flaticon-phone-call   flaticon-house        flaticon-building
flaticon-land-1       flaticon-land-2       flaticon-beach
flaticon-instagram    flaticon-facebook     flaticon-whatsapp
flaticon-tik-tok      flaticon-linkedin     flaticon-office
flaticon-email
```

Ejemplo: `<i class="flaticon-house"></i>`

Para iconos no disponibles en flaticon, usar RemixIcon:
`<i class="ri-map-pin-line"></i>`

---

## 5. Patrones de Componentes con Codigo

### 5.1 Card de Propiedad

```html
<div class="property-card">
  <div class="property-card__img">
    <img loading="lazy" src="img/propiedad.webp" alt="Terreno en [Zona], Arequipa">
    <span class="property-card__badge">Terreno</span>
    <span class="property-card__badge--gold">Oferta</span>
  </div>
  <div class="property-card__body">
    <h3 class="property-card__title">Nombre del Proyecto</h3>
    <p class="property-card__location"><i class="ri-map-pin-line"></i> Arequipa, Peru</p>
    <p class="property-card__price">Desde <strong>S/ 8,900</strong></p>
    <a href="/proyecto-nombre" class="btn-cta">Ver proyecto en Arequipa</a>
  </div>
</div>
```

CSS en `styles2k2k2.css`:
```css
.property-card {
  border-radius: 12px;
  box-shadow: var(--sombra);
  overflow: hidden;
  background: var(--white-color);
  transition: transform .25s ease, box-shadow .25s ease;
}
.property-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px hsla(220, 68%, 12%, .25);
}
.property-card__badge {
  position: absolute;
  top: 12px; left: 12px;
  background: var(--main-color);
  color: var(--accent-color);
  font-size: var(--small-font-size);
  font-weight: var(--font-semi-bold);
  padding: 4px 10px;
  border-radius: 4px;
}
.property-card__badge--gold {
  background: var(--gold-color);
  color: var(--white-color);
}
```

### 5.2 Boton CTA Principal

```html
<a href="/contacto" class="btn-cta">Ver proyecto en Arequipa</a>
```

CSS:
```css
.btn-cta {
  display: inline-block;
  background: var(--main-color);
  color: var(--accent-color);
  font-family: 'Kanit', sans-serif;
  font-weight: var(--font-semi-bold);
  padding: .75rem 1.75rem;
  border-radius: 6px;
  text-decoration: none;
  transition: background .2s ease, color .2s ease;
  letter-spacing: .03em;
}
.btn-cta:hover {
  background: var(--main2-color);
  color: var(--white-color);
}
```

### 5.3 Nueva Seccion Estandar

Plantilla PHP para cualquier seccion nueva:

```php
<section class="bg-light">
  <div class="pd2"></div>
  <div class="l-container">
    <h2 class="main_title center main-color">Titulo de Seccion</h2>
    <div class="pd1"></div>

    <!-- Contenido de la seccion aqui -->

  </div>
  <div class="pd2"></div>
</section>
```

### 5.4 Carrusel con Swiper 8

```html
<div class="swiper proyectos-swiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><!-- card aqui --></div>
    <div class="swiper-slide"><!-- card aqui --></div>
  </div>
  <div class="swiper-pagination"></div>
</div>

<script>
  new Swiper('.proyectos-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    pagination: { el: '.swiper-pagination', clickable: true },
    breakpoints: {
      768:  { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
</script>
```

### 5.5 Animacion de entrada con GSAP

```javascript
gsap.from('.property-card', {
  opacity: 0,
  y: 40,
  duration: 0.6,
  stagger: 0.15,
  scrollTrigger: { trigger: '.properties-grid', start: 'top 80%' }
});
```

Para entradas simples usar clases de Animate.css directamente:
```html
<div class="animated fadeInUp">Contenido</div>
```

---

## 6. Principios UX del Proyecto

### Audiencia y tono
- **Audiencia:** Familias peruanas de clase media buscando primer inmueble
- **Tono visual:** Confiable, aspiracional, calido - NO frio ni corporativo
- **Idioma:** Espanol peruano. Tutear al usuario en los CTAs

### Jerarquia tipografica

| Elemento | Peso Kanit | Uso |
|---|---|---|
| `<h1>` | 800 | Solo uno por pagina. Frase aspiracional |
| `<h2>` | 600 | Titulo de seccion principal |
| `<h3>` | 600 | Subseccion o titulo de card |
| Cuerpo | 300 | Texto descriptivo general |
| Labels / badges | 600 | Cortos, con letter-spacing |

### Reglas UX fundamentales
1. **Un solo `<h1>` por pagina.** Siempre en el hero.
2. **CTAs descriptivos.** MALO: "Ver mas" / BUENO: "Ver proyecto en Arequipa"
3. **`alt` descriptivo.** Incluir zona: `alt="Terreno en Hunter, Arequipa"`
4. **Espaciado con `.pd1` / `.pd2`**, no con margin-top excesivo.
5. **Imagenes en `.webp`** con `loading="lazy"` siempre.
6. **No usar `position: absolute`** para layout; usar flex o grid.
7. **Hover states** en todos los elementos interactivos.

### Responsive Mobile-First
- Breakpoint principal: **1024px**
- Diseniar primero para movil, escalar con `@media (min-width: 1024px)`
- Grid de cards: 1 col movil -> 2 col 768px -> 3 col 1024px

---

## 7. Esqueleto de pagina PHP nueva

```php
<?php
$page        = 'Titulo de la Pagina';
$description = 'Descripcion SEO entre 150-160 caracteres.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/ruta-de-pagina';
// $og_image = 'https://oportunidadesinmobiliariasperu.com/img/og-pagina.jpg';
include_once 'header.php';
?>

<main>
  <!-- secciones aqui -->
</main>

<?php include_once 'footer.php'; ?>
```

---

## 8. Checklist de Validacion Pre-entrega

Antes de dar por terminado cualquier componente o seccion verificar:

- [ ] Se usaron variables CSS en lugar de colores hardcodeados?
- [ ] El nuevo CSS esta en `styles2k2k2.css` o en `<style>` dentro del `.php`?
- [ ] Hay exactamente un `<h1>` en la pagina?
- [ ] Las imagenes tienen `loading="lazy"` y `alt` descriptivo con zona/ciudad?
- [ ] Los CTAs tienen texto descriptivo (no solo "Ver mas")?
- [ ] El componente es responsive: 1 col movil -> multi-col desktop?
- [ ] Los elementos interactivos tienen estado `:hover`?
- [ ] Se uso `flaticon_inmobiliaria` antes de buscar otro icono?
- [ ] La pagina nueva incluye `$page`, `$description` y `$canonical`?

---

## 9. Referencias de archivos del proyecto

- [Estilos globales](../../../Codigo/public_html/css/styles2k2k2.css)
- [Header con design tokens y nav](../../../Codigo/public_html/header.php)
- [Footer con scripts JS cargados](../../../Codigo/public_html/footer.php)
- [Ejemplo de pagina: index.php](../../../Codigo/public_html/index.php)