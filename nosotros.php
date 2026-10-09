<?php
$page        = 'Nosotros — Quiénes somos | Oportunidades Inmobiliarias Perú';
$description = 'Somos Oportunidades Inmobiliarias Perú, empresa arequipeña con más de 5 años conectando familias con sus proyectos de vida. Conoce nuestra misión, visión y equipo.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/nosotros';
include_once 'header.php';
?>

<div class="catalog-hero" style="background-image: url('/img/sections/bg_about.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Nosotros</span>
        </nav>
        <h1 class="catalog-hero__title">Sobre Oportunidades Inmobiliarias</h1>
        <p class="catalog-hero__sub">Conectamos familias arequipeñas con sus proyectos de vida desde hace más de 5 años.</p>
    </div>
</div>

<!-- Misión, Visión, Valores -->
<section>
    <div class="pd2"></div>
    <div class="about-grid l-container">
        <div class="about-text reveal-up">
            <p class="section-eyebrow">Quiénes somos</p>
            <h2>Más que una inmobiliaria, somos tu aliado.</h2>
            <p>Somos una empresa arequipeña especializada en el desarrollo y comercialización de proyectos residenciales. Nuestra misión es hacer accesible el sueño de tener un hogar propio para cada familia peruana.</p>
            <p>Desde lotes económicos hasta departamentos de lujo, trabajamos con integridad, transparencia y compromiso real con nuestros clientes.</p>
            <ul class="about-values">
                <li><i class="ri-check-double-line"></i> Transparencia en cada operación</li>
                <li><i class="ri-check-double-line"></i> Asesoría personalizada sin costo</li>
                <li><i class="ri-check-double-line"></i> Proyectos con habilitación urbana</li>
                <li><i class="ri-check-double-line"></i> Financiamiento accesible y flexible</li>
            </ul>
        </div>
        <div class="about-img reveal-right">
            <img src="img/sections/bg_about_new.webp" alt="Equipo Oportunidades Inmobiliarias Perú" loading="lazy">
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- Estadísticas -->
<section class="stats-section bg-accent">
    <div class="pd2"></div>
    <div class="stats-grid l-container">
        <div class="stat-big reveal-card">
            <span class="stat-big__num"><span class="count-up" data-target="5">0</span>+</span>
            <span class="stat-big__label">Años de experiencia</span>
        </div>
        <div class="stat-big reveal-card">
            <span class="stat-big__num"><span class="count-up" data-target="1500">0</span>+</span>
            <span class="stat-big__label">Familias satisfechas</span>
        </div>
        <div class="stat-big reveal-card">
            <span class="stat-big__num"><span class="count-up" data-target="950">0</span>+</span>
            <span class="stat-big__label">Propiedades vendidas</span>
        </div>
        <div class="stat-big reveal-card">
            <span class="stat-big__num"><span class="count-up" data-target="12">0</span></span>
            <span class="stat-big__label">Proyectos activos</span>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- Equipo -->
<section>
    <div class="pd2"></div>
    <div class="l-container">
        <p class="section-eyebrow">Nuestro equipo</p>
        <h2 class="main_title main-color">Asesores especializados</h2>
        <p class="section-intro">Cada miembro de nuestro equipo conoce Arequipa y sus mejores oportunidades a fondo.</p>
    </div>
    <div class="pd1"></div>
    <div class="team-grid l-container">
        <div class="team-card reveal-card">
            <img src="/img/team_carlos.webp" alt="Carlos Mamani - Asesor comercial" loading="lazy">
            <h3>Carlos Mamani</h3>
            <p>Asesor Comercial Senior</p>
        </div>
        <div class="team-card reveal-card">
            <img src="/img/team_ana.webp" alt="Ana Quispe - Asesora comercial" loading="lazy">
            <h3>Ana Quispe</h3>
            <p>Asesora de Inversiones</p>
        </div>
        <div class="team-card reveal-card">
            <img src="/img/team_juan.webp" alt="Juan Paredes - Asesor financiero" loading="lazy">
            <h3>Juan Paredes</h3>
            <p>Asesor Financiero</p>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- CTA Contacto -->
<section class="bg-action">
    <div class="pd2"></div>
    <div class="m-container center content-action">
        <h3 class="main_subtitle-center white">¿Listo para encontrar tu hogar ideal?</h3>
        <h2 class="main_title white">Habla hoy con uno de nuestros asesores</h2>
        <div class="pd1"></div>
        <a href="https://api.whatsapp.com/send?phone=51999653412&text=Hola,%20quiero%20asesoría%20gratuita"
           target="_blank" rel="noopener" class="button primary">
            Asesoría gratuita <i class="flaticon-whatsapp"></i>
        </a>
    </div>
    <div class="pd2"></div>
</section>

<?php include_once 'footer.php'; ?>
<script>
const revealEls = document.querySelectorAll('.reveal-up, .reveal-right, .reveal-card');
const observer  = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('is-visible'); observer.unobserve(e.target); }
    });
}, { threshold: 0.12 });
revealEls.forEach(el => observer.observe(el));

const countEls = document.querySelectorAll('.count-up');
const countObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (!e.isIntersecting) return;
        const target = +e.target.dataset.target;
        gsap.to(e.target, {
            innerText: target, duration: 1.8, ease: 'power2.out',
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
