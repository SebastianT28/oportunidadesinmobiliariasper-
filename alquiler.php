<?php
require_once 'data/propiedades.php';
$categoria = 'alquiler';
$page        = 'Alquiler de locales comerciales y propiedades — Arequipa';
$description = 'Locales comerciales, departamentos y casas en alquiler en Arequipa. Encuentra tu espacio ideal con las mejores condiciones y en zonas estratégicas.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/alquiler';
include_once 'header.php';
?>
<div class="catalog-hero" style="background-image: url('/img/sections/bg_contact.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Alquileres</span>
        </nav>
        <h1 class="catalog-hero__title">Propiedades en Alquiler</h1>
        <p class="catalog-hero__sub">Encuentra locales comerciales, departamentos y casas disponibles para rentar en las mejores zonas de Arequipa.</p>
    </div>
</div>
<section class="catalog-section">
    <div class="pd2"></div>
    <div class="catalog-layout l-container">
        <aside class="catalog-sidebar">
            <h4 class="sidebar-title"><i class="ri-filter-3-line"></i> Filtrar resultados</h4>
            <div class="filter-group">
                <h5>Tipo de propiedad</h5>
                <label class="filter-check"><input type="radio" name="tipo" value="" checked> Todos</label>
                <label class="filter-check"><input type="radio" name="tipo" value="local"> Local Comercial</label>
                <label class="filter-check"><input type="radio" name="tipo" value="departamento"> Departamento</label>
                <label class="filter-check"><input type="radio" name="tipo" value="casa"> Casa</label>
            </div>
            <div class="filter-group">
                <h5>Precio máximo mensual</h5>
                <select id="precio-max" class="filter-select">
                    <option value="">Cualquiera</option>
                    <option value="1500">Hasta S/ 1,500</option>
                    <option value="2500">Hasta S/ 2,500</option>
                    <option value="4000">Hasta S/ 4,000</option>
                </select>
            </div>
            <button class="button primary w-full mt-1">Aplicar filtros</button>
        </aside>
        <main class="catalog-main">
            <div class="catalog-results-header">
                <p class="results-count"><strong><?= count($alquileres) ?></strong> propiedades encontradas</p>
            </div>
            <div class="props-grid" id="props-grid">
                <?php foreach ($alquileres as $prop): ?>
                <?php include 'includes/card-propiedad.php'; ?>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <div class="pd2"></div>
</section>
<?php include_once 'footer.php'; ?>
<script>
document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => { if (e.isIntersecting) el.classList.add('is-visible'); }, { threshold: 0.1 }).observe(el);
});
</script>
</body>
</html>