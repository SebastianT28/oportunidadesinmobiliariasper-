<?php
$page              = 'Venta de Departamentos en Arequipa — Proyectos de Estreno y Preventa';
$description       = 'Oportunidades Inmobiliarias Perú — Venta de departamentos de estreno y en construcción en Arequipa. Proyectos exclusivos en Cayma, Yanahuara, Vallecito y José L. Bustamante con entrega inmediata.';
$canonical         = 'https://oportunidadesinmobiliariasperu.com/';
$use_swiper        = true;
$use_gsap          = true;
$preload_lcp_image = '/img/sections/hero-home-bg.webp';
include_once 'header.php';

require_once 'data/propiedades.php';
require_once 'data/articulos.php';

// Selección de departamentos en preventa/construcción para la sección de destacados del home
$destacados_home = array_values(
    array_filter($departamentos, fn($p) => $p['estado'] === 'en-construccion')
);

// Departamentos en estreno (solo departamentos terminados para el acordeón arquitectónico del home)
$depas_estreno = array_values(array_filter($departamentos, fn($p) => $p['estado'] === 'entregado'));
?>

<!-- ═══════════════════════════════════════════════
     HERO SECTION — Cinematográfico
════════════════════════════════════════════════ -->
<section class="hero-cinematic" id="hero">
    <!-- Fondo con imagen real del proyecto estrella -->
    <div class="hero-bg" id="heroBg" style="background-image: url('img/sections/hero-home-bg.webp');"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content l-container">
        <div class="hero-left">
            <!-- Etiqueta superior -->
            <div class="hero-eyebrow reveal-up">
                <span class="hero-dot"></span>
                Departamentos en Arequipa — 2026
            </div>

            <!-- Titular principal -->
            <h1 class="hero-headline reveal-up">
                Encuentra tu<br>
                <span class="hero-rotating-wrap">
                    <span class="hero-rotating" id="heroRotating">Departamento</span>
                </span><br>
                <span class="hero-headline--light">en Arequipa.</span>
            </h1>

            <!-- Subtítulo -->
            <p class="hero-sub reveal-up">
                Proyectos residenciales de estreno y en construcción con independización en SUNARP y financiamiento directo o bancario.<br>
                Departamentos de 2 y 3 dormitorios · Cuotas accesibles y precios exclusivos de preventa.
            </p>
        </div>

        <!-- Panel de proyecto destacado (lado derecho) -->
        <div class="hero-right reveal-right">
            <div class="hero-featured-card">
                <div class="hero-featured-img">
                    <img src="/img/proyectos/vallecito-fachada.webp" alt="Terrazas de Vallecito — Departamento de estreno en Arequipa" width="420" height="280" loading="eager" fetchpriority="high" decoding="sync">
                </div>
                <div class="hero-featured-info">
                    <span class="hero-featured-tag">⭐ Departamento en estreno</span>
                    <h3>Terrazas de Vallecito</h3>
                    <p><i class="flaticon-location-pin"></i> Vallecito, Arequipa</p>
                    <p class="hero-featured-price">desde <strong>S/ 265,000</strong></p>
                    <a href="/departamentos/terrazas-de-vallecito" class="hero-featured-link">
                        Ver departamento <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Indicador de scroll -->
    <div class="hero-scroll-hint">
        <span>Desplázate</span>
        <div class="hero-scroll-arrow">
            <i class="ri-arrow-down-line"></i>
        </div>
    </div>
</section>





<!-- ═══════════════════════════════════════════════
     PRODUCTOS / TIPOS DE PROPIEDAD
════════════════════════════════════════════════ -->
<section class="tipos-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <span class="section-eyebrow">Catálogo Inmobiliario en Arequipa</span>
        <h2 class="main_title main-color">Venta de Departamentos</h2>
        <p class="section-intro">Especialistas en proyectos residenciales y propiedades de alta rentabilidad en las mejores zonas de Arequipa.</p>
    </div>
    <div class="pd1"></div>
    <div class="tipos-grid l-container">
        <a href="/departamentos" class="tipo-card reveal-card">
            <div class="tipo-card__icon"><i class="flaticon-building"></i></div>
            <h3>Departamentos en Venta</h3>
            <p>Proyectos en planos, en construcción y estreno en distritos exclusivos.</p>
            <span class="tipo-card__link">Ver departamentos <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/terrenos" class="tipo-card reveal-card tipo-card--hidden" aria-hidden="true" tabindex="-1">
            <div class="tipo-card__icon"><i class="flaticon-land-1"></i></div>
            <h3>Terrenos en Venta</h3>
            <p>Lotes residenciales y comerciales con habilitación urbana en zonas de alta plusvalía.</p>
            <span class="tipo-card__link">Ver terrenos <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/casas" class="tipo-card reveal-card tipo-card--hidden" aria-hidden="true" tabindex="-1">
            <div class="tipo-card__icon"><i class="flaticon-house"></i></div>
            <h3>Casas en Venta</h3>
            <p>Viviendas unifamiliares modernas y seguras en las mejores urbanizaciones de Arequipa.</p>
            <span class="tipo-card__link">Ver casas <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/alquiler" class="tipo-card reveal-card tipo-card--hidden" aria-hidden="true" tabindex="-1">
            <div class="tipo-card__icon"><i class="flaticon-land-2"></i></div>
            <h3>Propiedades en Alquiler</h3>
            <p>Inmuebles residenciales y locales comerciales listos para operar en ubicaciones estratégicas.</p>
            <span class="tipo-card__link">Ver alquileres <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/airbnb" class="tipo-card reveal-card tipo-card--hidden" aria-hidden="true" tabindex="-1">
            <div class="tipo-card__icon"><i class="ri-hotel-bed-line"></i></div>
            <h3>Alojamientos Airbnb</h3>
            <p>Departamentos y suites totalmente amoblados para estadías cortas y ejecutivas.</p>
            <span class="tipo-card__link">Ver alojamientos <i class="ri-arrow-right-line"></i></span>
        </a>
    </div>
    <div class="pd2"></div>
</section>


<!-- ═══════════════════════════════════════════════
     PROYECTOS DESTACADOS
════════════════════════════════════════════════ -->
<section class="proyectos-section">
    <div class="pd2"></div>
    <div class="projects-home l-container">
        <div class="projects-home__content">
            <span class="section-eyebrow">Nuestros Proyectos</span>
            <h2>Departamentos en las Mejores<br>Zonas de Arequipa</h2>
            <p>Edificios modernos de alta plusvalía en <strong>Yanahuara, Cayma, Cercado y Cerro Colorado</strong>, a pasos de centros comerciales, universidades y vías principales.</p>
            <ul class="counter">
                <li>
                    <h3><i class="flaticon-family"></i><span class="count-up" data-target="214" data-suffix="+">214+</span></h3>
                    <span>familias satisfechas</span>
                </li>
                <li>
                    <h3><i class="ri-shield-check-line"></i><span class="count-up" data-target="100" data-suffix="%">100%</span></h3>
                    <span>respaldo y registro SUNARP</span>
                </li>
                <li>
                    <h3><i class="ri-building-2-line"></i><span class="count-up" data-target="6" data-suffix="+">6+</span></h3>
                    <span>proyectos residenciales activos</span>
                </li>
            </ul>
            <a href="/departamentos" class="button primary">
                Ver todos los departamentos <i class="ri-arrow-right-line"></i>
            </a>
        </div>
        <div class="projects-home__img">
            <div class="swiper offer-slider offer-slider-s">
                <div class="swiper-wrapper">
                    <?php
                    $slider_props = array_slice($departamentos, 0, 6);
                    foreach ($slider_props as $sp):
                        $sp_img = '/' . ltrim($sp['imagenes'][0], '/');
                    ?>
                    <div class="swiper-slide" data-slide-bg="<?= htmlspecialchars($sp_img, ENT_QUOTES) ?>" style="background: #0f2027;">
                        <span class="target <?= $sp['tag_class'] ?>">
                            <i class="flaticon-offer"></i><?= htmlspecialchars($sp['tag']) ?>
                        </span>
                        <div>
                            <h2><?= htmlspecialchars($sp['nombre']) ?></h2>
                            <p><i class="flaticon-location-pin"></i> <?= htmlspecialchars($sp['ubicacion']) ?></p>
                            <p class="price">
                                <i class="flaticon-save-money"></i>
                                <span>desde</span> <?= $sp['moneda'] ?> <?= number_format($sp['precio'], 0, '.', ',') ?>
                            </p>
                            <a href="/<?= $sp['categoria'] ?>/<?= $sp['slug'] ?>">Ver proyecto</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pd2"></div>
</section>


<!-- ═══════════════════════════════════════════════
     DEPARTAMENTOS EN ESTRENO — Acordeón Arquitectónico
════════════════════════════════════════════════ -->
<section class="estreno-section">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="estreno-header">
            <div>
                <p class="section-eyebrow">Nuevos lanzamientos</p>
                <h2 class="main_title main-color">Departamentos en estreno</h2>
            </div>
            <a href="/departamentos?tab=estreno" class="estreno-ver-todos">
                Ver todos <i class="ri-arrow-right-line"></i>
            </a>
        </div>
    </div>
    <div class="pd1"></div>
    <div class="l-container">
        <div class="estreno-accordion reveal-up" id="estrenoAccordion">
            <?php foreach ($depas_estreno as $idx => $depa):
                $distrito_depa = trim(explode(',', $depa['ubicacion'])[0]);
                $resumen_depa  = ($depa['dormitorios'] ?? 2) . ' Dorm · ' . ($depa['area_min'] ?? 60) . ' m²';
                $precio_depa   = ($depa['moneda'] ?? 'S/') . ' ' . number_format($depa['precio'], 0, '.', ',');
                $img_depa      = '/' . ltrim($depa['imagenes'][0], '/');
                $url_depa      = '/departamentos/' . ltrim($depa['slug'], '/');
            ?>
            <a href="<?= htmlspecialchars($url_depa, ENT_QUOTES) ?>"
               class="estreno-panel <?= $idx === 0 ? 'is-active' : '' ?>"
               data-bg="<?= htmlspecialchars($img_depa, ENT_QUOTES) ?>"
               data-estreno-index="<?= $idx ?>"
               aria-expanded="<?= $idx === 0 ? 'true' : 'false' ?>"
               aria-label="Ver <?= htmlspecialchars($depa['nombre']) ?> en <?= htmlspecialchars($distrito_depa) ?>">
                <div class="estreno-panel__overlay"></div>

                <div class="estreno-panel__top">
                    <span class="estreno-panel__district"><?= htmlspecialchars($distrito_depa) ?></span>
                </div>

                <div class="estreno-panel__bottom">
                    <h3 class="estreno-panel__compact-title"><?= htmlspecialchars($depa['nombre']) ?></h3>

                    <div class="estreno-panel__expanded">
                        <div class="estreno-panel__info">
                            <h3><?= htmlspecialchars($depa['nombre']) ?></h3>
                            <p class="estreno-panel__meta"><?= htmlspecialchars($resumen_depa) ?></p>
                        </div>
                        <div class="estreno-panel__price-box">
                            <span class="estreno-panel__price-label">Desde</span>
                            <span class="estreno-panel__price-val"><?= htmlspecialchars($precio_depa) ?></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pd2"></div>
</section>


<!-- ═══════════════════════════════════════════════
     PROPIEDADES DESTACADAS — Grid de cards
════════════════════════════════════════════════ -->
<section class="featured-grid-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <span class="section-eyebrow">Oportunidades de Inversión</span>
        <h2 class="main_title main-color">Departamentos Destacados en Arequipa</h2>
        <p class="section-intro">Separa tu departamento con precios de lanzamiento, cuotas flexibles y alta proyección de valorización en Cayma, Yanahuara y Cerro Colorado.</p>
    </div>
    <div class="pd1"></div>
    <div class="props-grid l-container">
        <?php foreach ($destacados_home as $prop): ?>
        <?php include 'includes/card-propiedad.php'; ?>
        <?php endforeach; ?>
    </div>
    <div class="pd2"></div>
</section>


<!-- ═══════════════════════════════════════════════
     CTA BANNER — ACCIÓN
════════════════════════════════════════════════ -->
<section class="bg-action">
    <div class="pd2"></div>
    <div class="columns-two__center l-container content-action">
        <div class="column-60__content banner-home">
            <h2 class="main_title white">Agenda una Visita a Nuestros Departamentos Piloto en Arequipa</h2>
            <p class="banner-home__subtitle white">Recibe planos de distribución, precios de preventa y asesoría gratuita para elegir el departamento ideal para tu familia o inversión.</p>
        </div>
        <div class="column-40__content">
            <div class="contact-box">
                <?php
                $form_titulo = 'Solicita Información y Precios';
                include 'includes/form-contacto.php';
                ?>
            </div>
        </div>
    </div>
    <div class="pd2"></div>
</section>


<!-- ═══════════════════════════════════════════════
     PREGUNTAS FRECUENTES — Acordeón FAQ (SEO + Schema)
════════════════════════════════════════════════ -->
<section class="home-faq-section" id="preguntas-frecuentes" aria-labelledby="faq-heading">
    <div class="pd2"></div>
    <div class="l-container home-faq-layout">
        <!-- Columna izquierda: Cabecera editorial + tarjeta de soporte -->
        <div class="home-faq__intro reveal-up">
            <span class="section-eyebrow">Resolvemos tus dudas</span>
            <h2 class="main_title main-color home-faq__title" id="faq-heading">
                Preguntas frecuentes
            </h2>
            <p class="home-faq__lead">
                Todo lo que necesitas saber sobre ubicaciones, beneficios de preventa, respaldo legal en SUNARP y opciones de financiamiento.
            </p>
            <div class="home-faq__support-card">
                <div class="home-faq__support-icon">
                    <i class="ri-customer-service-2-line"></i>
                </div>
                <div class="home-faq__support-text">
                    <strong>¿Tienes otra consulta específica?</strong>
                    <span>Nuestros asesores te atienden en línea sin compromiso.</span>
                    <a href="https://api.whatsapp.com/send?phone=51999653412&text=Hola,%20tengo%20una%20consulta%20sobre%20sus%20departamentos%20en%20Arequipa"
                       target="_blank" rel="noopener" class="home-faq__support-link">
                        Consultar por WhatsApp <i class="ri-arrow-right-up-line"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Acordeón interactivo -->
        <div class="home-faq__list" id="homeFaqAccordion">
            <!-- Pregunta 1 (abierta por defecto) -->
            <article class="home-faq__item is-open reveal-card">
                <h3 class="home-faq__question">
                    <button type="button" class="home-faq__trigger" aria-expanded="true" aria-controls="faq-ans-1" id="faq-btn-1">
                        <span class="home-faq__num">01</span>
                        <span class="home-faq__q-text">¿En qué distritos de Arequipa tienen departamentos en venta?</span>
                        <span class="home-faq__icon" aria-hidden="true"><i class="ri-add-line"></i></span>
                    </button>
                </h3>
                <div class="home-faq__panel" id="faq-ans-1" role="region" aria-labelledby="faq-btn-1">
                    <div class="home-faq__panel-inner">
                        <p class="home-faq__answer">Actualmente contamos con proyectos de departamentos en preventa, construcción y estreno en los distritos de Yanahuara, Cayma, Cerro Colorado y Cercado de Arequipa.</p>
                    </div>
                </div>
            </article>

            <!-- Pregunta 2 -->
            <article class="home-faq__item reveal-card">
                <h3 class="home-faq__question">
                    <button type="button" class="home-faq__trigger" aria-expanded="false" aria-controls="faq-ans-2" id="faq-btn-2">
                        <span class="home-faq__num">02</span>
                        <span class="home-faq__q-text">¿Qué ventajas tiene comprar un departamento en preventa?</span>
                        <span class="home-faq__icon" aria-hidden="true"><i class="ri-add-line"></i></span>
                    </button>
                </h3>
                <div class="home-faq__panel" id="faq-ans-2" role="region" aria-labelledby="faq-btn-2">
                    <div class="home-faq__panel-inner">
                        <p class="home-faq__answer">Comprar en preventa te permite ahorrar entre un 10% y 20% respecto al precio de entrega final, elegir los mejores pisos o distribución del edificio y fraccionar el pago de la cuota inicial.</p>
                    </div>
                </div>
            </article>

            <!-- Pregunta 3 -->
            <article class="home-faq__item reveal-card">
                <h3 class="home-faq__question">
                    <button type="button" class="home-faq__trigger" aria-expanded="false" aria-controls="faq-ans-3" id="faq-btn-3">
                        <span class="home-faq__num">03</span>
                        <span class="home-faq__q-text">¿Los departamentos cuentan con financiamiento bancario y título en SUNARP?</span>
                        <span class="home-faq__icon" aria-hidden="true"><i class="ri-add-line"></i></span>
                    </button>
                </h3>
                <div class="home-faq__panel" id="faq-ans-3" role="region" aria-labelledby="faq-btn-3">
                    <div class="home-faq__panel-inner">
                        <p class="home-faq__answer">Sí, todos nuestros proyectos cumplen con la normativa técnica y legal para ser adquiridos mediante crédito hipotecario bancario o financiamiento directo, garantizando su independización en SUNARP.</p>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="pd2"></div>

    <!-- Schema.org JSON-LD: FAQPage sincronizado con el contenido visible -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿En qué distritos de Arequipa tienen departamentos en venta?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Actualmente contamos con proyectos de departamentos en preventa, construcción y estreno en los distritos de Yanahuara, Cayma, Cerro Colorado y Cercado de Arequipa."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué ventajas tiene comprar un departamento en preventa?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Comprar en preventa te permite ahorrar entre un 10% y 20% respecto al precio de entrega final, elegir los mejores pisos o distribución del edificio y fraccionar el pago de la cuota inicial."
          }
        },
        {
          "@type": "Question",
          "name": "¿Los departamentos cuentan con financiamiento bancario y título en SUNARP?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí, todos nuestros proyectos cumplen con la normativa técnica y legal para ser adquiridos mediante crédito hipotecario bancario o financiamiento directo, garantizando su independización en SUNARP."
          }
        }
      ]
    }
    </script>
</section>


<!-- ═══════════════════════════════════════════════
     NOVEDADES — Blog preview
════════════════════════════════════════════════ -->
<section class="novedades-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="section-header-row">
            <div>
                <p class="section-eyebrow">Blog y Guía Inmobiliaria</p>
                <h2 class="main_title main-color">Guías y Novedades sobre Departamentos en Arequipa</h2>
            </div>
            <a href="/novedades" class="button secondary">Ver todos los artículos <i class="ri-arrow-right-line"></i></a>
        </div>
    </div>
    <div class="pd1"></div>
    <div class="columns-blog l-container">
        <?php foreach (array_slice($articulos, 0, 4) as $art): ?>
        <div class="four_column-blog reveal-card">
            <a href="/novedades/<?= htmlspecialchars($art['slug']) ?>">
                <div class="blog-box">
                    <div class="blog-img">
                        <div class="blog-img__bg" data-bg="/<?= ltrim(htmlspecialchars($art['imagen'], ENT_QUOTES), '/') ?>"></div>
                    </div>
                    <div class="blog-box__details">
                        <h5 class="blog-box__category"><?= htmlspecialchars($art['categoria']) ?></h5>
                        <h3 class="blog-box__title"><?= htmlspecialchars($art['titulo']) ?></h3>
                        <p class="blog-box__date"><?= htmlspecialchars($art['fecha']) ?> · <?= htmlspecialchars($art['tiempo_lectura']) ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="pd2"></div>
</section>

<?php include_once 'footer.php'; ?>

<!-- Scripts de animación hero -->
<script>
// ── Texto rotativo hero ───────────────────────
const words  = ['Departamento', 'Depa de estreno', 'Hogar ideal'];
let   wIndex = 0;
const el     = document.getElementById('heroRotating');

function rotateWord() {
    if (typeof gsap === 'undefined' || !el) return;
    gsap.to(el, {
        opacity: 0, y: -20, duration: 0.35,
        onComplete: () => {
            wIndex = (wIndex + 1) % words.length;
            el.textContent = words[wIndex];
            gsap.fromTo(el,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.45, ease: 'power2.out' }
            );
        }
    });
}
setInterval(rotateWord, 2500);

// ── Parallax hero al hacer scroll ────────────
const heroBg = document.getElementById('heroBg');
window.addEventListener('scroll', () => {
    const offset = window.scrollY;
    if (heroBg) heroBg.style.transform = `translateY(${offset * 0.35}px)`;
}, { passive: true });

// ── Reveal on scroll (Intersection Observer) ─
const revealEls = document.querySelectorAll('.reveal-up, .reveal-right, .reveal-card');
const observer  = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('is-visible');
            observer.unobserve(e.target);
        }
    });
}, { threshold: 0.12 });
revealEls.forEach(elNode => observer.observe(elNode));

// ── Carga diferida de fondos en Slider y Blog (evita competir con LCP) ──
(function () {
    const lazySlideContainer = document.querySelector('.offer-slider');
    const loadSlides = () => {
        document.querySelectorAll('.swiper-slide[data-slide-bg]').forEach(slide => {
            const src = slide.getAttribute('data-slide-bg');
            if (src) {
                slide.style.background = `linear-gradient(to top, #0f2027 18%, transparent), url('${src}') no-repeat 50% 50% / cover`;
                slide.removeAttribute('data-slide-bg');
            }
        });
    };
    const blogContainer = document.querySelector('.novedades-section');
    const loadBlogs = () => {
        document.querySelectorAll('.blog-img__bg[data-bg]').forEach(box => {
            const src = box.getAttribute('data-bg');
            if (src) {
                box.style.backgroundImage = `url('${src}')`;
                box.removeAttribute('data-bg');
            }
        });
    };

    if ('IntersectionObserver' in window) {
        if (lazySlideContainer) {
            const sObs = new IntersectionObserver((entries, obs) => {
                if (entries.some(e => e.isIntersecting)) { loadSlides(); obs.disconnect(); }
            }, { rootMargin: '350px 0px' });
            sObs.observe(lazySlideContainer);
        }
        if (blogContainer) {
            const bObs = new IntersectionObserver((entries, obs) => {
                if (entries.some(e => e.isIntersecting)) { loadBlogs(); obs.disconnect(); }
            }, { rootMargin: '350px 0px' });
            bObs.observe(blogContainer);
        }
    } else {
        loadSlides();
        loadBlogs();
    }
})();

// ── Contadores animados ───────────────────────
const countEls = document.querySelectorAll('.count-up');
if ('IntersectionObserver' in window) {
    const countObs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (!e.isIntersecting) return;
            const node = e.target;
            const target = +node.dataset.target;
            const suffix = node.dataset.suffix || '';
            const duration = 1600;
            const start = performance.now();
            function step(now) {
                const p = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - p, 3);
                node.textContent = Math.round(target * eased).toLocaleString() + suffix;
                if (p < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
            countObs.unobserve(node);
        });
    }, { threshold: 0.5 });
    countEls.forEach(node => countObs.observe(node));
}

// ── Acordeón Arquitectónico: Departamentos en estreno ──
(function () {
    const accordion = document.getElementById('estrenoAccordion');
    const panels = document.querySelectorAll('#estrenoAccordion .estreno-panel');
    if (!accordion || !panels.length) return;

    // Carga diferida de fondos (evita competir con la imagen LCP del Hero)
    function loadEstrenoBackgrounds() {
        panels.forEach(panel => {
            const bg = panel.getAttribute('data-bg');
            if (bg) {
                panel.style.backgroundImage = `url('${bg}')`;
                panel.removeAttribute('data-bg');
            }
        });
    }

    if ('IntersectionObserver' in window) {
        const bgObs = new IntersectionObserver((entries, obs) => {
            if (entries.some(e => e.isIntersecting)) {
                loadEstrenoBackgrounds();
                obs.disconnect();
            }
        }, { rootMargin: '350px 0px' });
        bgObs.observe(accordion);
    } else {
        loadEstrenoBackgrounds();
    }

    function activatePanel(targetPanel) {
        panels.forEach(panel => {
            const isTarget = panel === targetPanel;
            panel.classList.toggle('is-active', isTarget);
            panel.setAttribute('aria-expanded', isTarget ? 'true' : 'false');
        });
    }

    function isDesktopHover() {
        return window.innerWidth > 992 && window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    }

    panels.forEach(panel => {
        panel.addEventListener('mouseenter', () => {
            if (isDesktopHover()) {
                activatePanel(panel);
            }
        });

        panel.addEventListener('keyup', (e) => {
            if (e.key === 'Tab') {
                activatePanel(panel);
            }
        });

        panel.addEventListener('click', (e) => {
            // Si la tarjeta está oculta/contraída (en celular/tablet o sin hover previo),
            // el primer toque/clic solo la agranda para revisar la información;
            // el segundo toque/clic sobre la tarjeta ya desplegada redirige a la propiedad.
            if (!panel.classList.contains('is-active')) {
                e.preventDefault();
                activatePanel(panel);
            }
        });
    });
})();

// ── Acordeón FAQ Home ─────────────────────────
(function () {
    const faqContainer = document.getElementById('homeFaqAccordion');
    if (!faqContainer) return;

    const items = faqContainer.querySelectorAll('.home-faq__item');
    items.forEach(item => {
        const btn = item.querySelector('.home-faq__trigger');
        if (!btn) return;

        btn.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            // Cerrar los demás ítems para mantener lectura limpia
            items.forEach(other => {
                other.classList.remove('is-open');
                const otherBtn = other.querySelector('.home-faq__trigger');
                if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
            });

            // Alternar el ítem actual
            if (!isOpen) {
                item.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();

</script>

</body>
</html>