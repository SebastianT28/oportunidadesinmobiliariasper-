<?php
$page        = 'Inicio';
$description = 'Oportunidades Inmobiliarias Perú — Encuentra terrenos, casas y departamentos en Arequipa. Proyectos desde S/ 8,900. Asesores disponibles para ayudarte a encontrar tu hogar ideal.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/';
include_once 'header.php';

require_once 'data/propiedades.php';
require_once 'data/articulos.php';

// Selección de propiedades destacadas para el home (máx 3 de cada tipo)
$destacados_home = array_slice(
    array_filter(array_merge($terrenos, $casas, $departamentos), fn($p) => $p['destacado']),
    0, 6
);
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
                Arequipa, Perú — 2026
            </div>

            <!-- Titular principal -->
            <h1 class="hero-headline reveal-up">
                Encuentra tu<br>
                <span class="hero-rotating-wrap">
                    <span class="hero-rotating" id="heroRotating">Terreno</span>
                </span><br>
                <span class="hero-headline--light">ideal.</span>
            </h1>

            <!-- Subtítulo -->
            <p class="hero-sub reveal-up">
                Construye el futuro de tu familia en los mejores proyectos de Arequipa.<br>
                Desde S/ 8,900 · Cuotas desde S/ 120/mes.
            </p>
        </div>

        <!-- Panel de proyecto destacado (lado derecho) -->
        <div class="hero-right reveal-right">
            <div class="hero-featured-card">
                <div class="hero-featured-img">
                    <img src="img/proyectos/villa.webp" alt="Villa Victoria — Proyecto destacado" width="420" height="280" loading="eager" fetchpriority="high" decoding="sync">
                </div>
                <div class="hero-featured-info">
                    <span class="hero-featured-tag">⭐ Proyecto estrella</span>
                    <h3>Villa Victoria</h3>
                    <p><i class="flaticon-location-pin"></i> Chiguata, Arequipa</p>
                    <p class="hero-featured-price">desde <strong>S/ 20,500</strong></p>
                    <a href="/terrenos/villa-victoria" class="hero-featured-link">
                        Ver proyecto <i class="ri-arrow-right-line"></i>
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
        <p class="section-eyebrow">Lo que ofrecemos</p>
        <h2 class="main_title main-color">Encuentra el espacio perfecto</h2>
    </div>
    <div class="pd1"></div>
    <div class="tipos-grid l-container">
        <a href="/terrenos" class="tipo-card reveal-card">
            <div class="tipo-card__icon"><i class="flaticon-land-1"></i></div>
            <h3>Terrenos</h3>
            <span class="tipo-card__link">Ver terrenos <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/casas" class="tipo-card reveal-card">
            <div class="tipo-card__icon"><i class="flaticon-house"></i></div>
            <h3>Casas</h3>
            <span class="tipo-card__link">Ver casas <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/departamentos" class="tipo-card reveal-card">
            <div class="tipo-card__icon"><i class="flaticon-building"></i></div>
            <h3>Departamentos</h3>
            <span class="tipo-card__link">Ver departamentos <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/alquiler" class="tipo-card reveal-card">
            <div class="tipo-card__icon"><i class="flaticon-land-2"></i></div>
            <h3>Alquiler</h3>
            <span class="tipo-card__link">Ver alquileres <i class="ri-arrow-right-line"></i></span>
        </a>
        <a href="/airbnb" class="tipo-card reveal-card">
            <div class="tipo-card__icon"><i class="ri-hotel-bed-line"></i></div>
            <h3>Airbnb</h3>
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
            <p class="section-eyebrow">Nuestros proyectos</p>
            <h2>Cerca de ti,<br>cerca de todo.</h2>
            <p>Nos preocupamos por la ubicación de tu próximo hogar. Por ello tenemos proyectos en las zonas de mayor crecimiento de Arequipa.</p>
            <ul class="counter">
                <li>
                    <h3><i class="flaticon-family"></i><span class="count-up" data-target="1500">0</span></h3>
                    <span>familias satisfechas</span>
                </li>
                <li>
                    <h3><i class="flaticon-land-1"></i><span class="count-up" data-target="950">0</span></h3>
                    <span>terrenos vendidos</span>
                </li>
                <li>
                    <h3><i class="ri-building-2-line"></i><span class="count-up" data-target="12">0</span></h3>
                    <span>proyectos activos</span>
                </li>
            </ul>
            <a href="/terrenos" class="button primary">
                Ver todos los proyectos <i class="ri-arrow-right-line"></i>
            </a>
        </div>
        <div class="projects-home__img">
            <div class="swiper offer-slider offer-slider-s">
                <div class="swiper-wrapper">
                    <?php
                    $slider_props = array_slice(array_merge($terrenos, $casas), 0, 4);
                    foreach ($slider_props as $sp): ?>
                    <div class="swiper-slide" style="background: linear-gradient(to top, #0f2027 18%, transparent), url(<?= $sp['imagenes'][0] ?>) no-repeat 50% 50% / cover;">
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
     PROPIEDADES DESTACADAS — Grid de cards
════════════════════════════════════════════════ -->
<section class="featured-grid-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <p class="section-eyebrow">Selección especial</p>
        <h2 class="main_title main-color">Propiedades destacadas</h2>
        <p class="section-intro">Elegidas por nuestros asesores por su ubicación, precio y potencial de valorización.</p>
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
            <h3 class="main_subtitle white">Conocemos el valor que tiene tu familia</h3>
            <h2 class="main_title white">Obtén ahora el espacio ideal para construir el futuro de tus hijos</h2>
        </div>
        <div class="column-40__content">
            <div class="contact-box">
                <h2>Habla con un asesor ahora</h2>
                <p>Llena el formulario y un asesor te contactará en menos de 24 horas</p>
                <?php include 'includes/form-contacto.php'; ?>
            </div>
        </div>
    </div>
    <div class="pd2"></div>
</section>


<!-- ═══════════════════════════════════════════════
     NOVEDADES — Blog preview
════════════════════════════════════════════════ -->
<section class="novedades-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="section-header-row">
            <div>
                <p class="section-eyebrow">Mantente informado</p>
                <h2 class="main_title main-color">Novedades</h2>
            </div>
            <a href="/novedades" class="button secondary">Ver todas <i class="ri-arrow-right-line"></i></a>
        </div>
    </div>
    <div class="pd1"></div>
    <div class="columns-blog l-container">
        <?php foreach (array_slice($articulos, 0, 4) as $art): ?>
        <div class="four_column-blog reveal-card">
            <a href="/novedades/<?= htmlspecialchars($art['slug']) ?>">
                <div class="blog-box">
                    <div class="blog-img">
                        <div class="blog-img__bg" style="background-image:url(/<?= ltrim(htmlspecialchars($art['imagen']), '/') ?>);"></div>
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
const words  = ['Terreno', 'Casa', 'Departamento'];
let   wIndex = 0;
const el     = document.getElementById('heroRotating');

function rotateWord() {
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
    heroBg.style.transform = `translateY(${offset * 0.35}px)`;
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
revealEls.forEach(el => observer.observe(el));

// ── Contadores animados ───────────────────────
const countEls = document.querySelectorAll('.count-up');
const countObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (!e.isIntersecting) return;
        const target = +e.target.dataset.target;
        gsap.to(e.target, {
            innerText: target,
            duration: 1.8,
            ease: 'power2.out',
            snap: { innerText: 1 },
            onUpdate() { e.target.innerText = Math.round(+e.target.innerText).toLocaleString(); }
        });
        countObs.unobserve(e.target);
    });
}, { threshold: 0.5 });
countEls.forEach(el => countObs.observe(el));


</script>

</body>
</html>