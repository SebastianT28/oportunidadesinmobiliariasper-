<?php
require_once 'data/propiedades.php';
$categoria = 'casas';
$page        = 'Casas en Arequipa - Viviendas modernas para tu familia';
$description = 'Encuentra casas en Arequipa. Las Lomas, El Olivar, Casonas Blancas y más proyectos. 3 y 4 dormitorios, desde S/ 155,000. Urbanizaciones seguras con areas verdes.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/casas';
include_once 'header.php';
?>
<div class="catalog-hero" style="background-image: url('/img/sections/bg_about.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Casas</span>
        </nav>
        <h1 class="catalog-hero__title">Casas en Arequipa</h1>
        <p class="catalog-hero__sub">Viviendas con acabados modernos en urbanizaciones seguras. Desde S/ 155,000 con financiamiento.</p>
    </div>
</div>
<section class="catalog-section">
    <div class="pd2"></div>
    <div class="catalog-layout l-container">
        <aside class="catalog-sidebar">
            <h4 class="sidebar-title"><i class="ri-filter-3-line"></i> Filtrar resultados</h4>
            <div class="filter-group">
                <h5>Dormitorios</h5>
                <label class="filter-check"><input type="radio" name="dorm" value="" checked> Todos</label>
                <label class="filter-check"><input type="radio" name="dorm" value="3"> 3 dormitorios</label>
                <label class="filter-check"><input type="radio" name="dorm" value="4"> 4 dormitorios</label>
            </div>
            <div class="filter-group">
                <h5>Precio maximo</h5>
                <select id="precio-max" class="filter-select">
                    <option value="">Cualquiera</option>
                    <option value="160000">Hasta S/ 160,000</option>
                    <option value="200000">Hasta S/ 200,000</option>
                    <option value="250000">Hasta S/ 250,000</option>
                </select>
            </div>
            <button class="button primary w-full mt-1" onclick="applyFilters()">Aplicar filtros</button>
            <button class="btn-text mt-1" onclick="clearFilters()">Limpiar filtros</button>
        </aside>
        <main class="catalog-main">
            <div class="catalog-results-header">
                <p class="results-count"><strong><?= count($casas) ?></strong> casas encontradas</p>
            </div>
            <div class="props-grid" id="props-grid">
                <?php foreach ($casas as $prop): ?>
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

function applyFilters() {
    const dorm      = document.querySelector('input[name="dorm"]:checked')?.value || '';
    const precioMax = +document.getElementById('precio-max').value || Infinity;
    const cards     = document.querySelectorAll('.prop-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const p = +card.dataset.precio || 0;
        const d = +card.dataset.dorm || 0;

        let visible = true;
        if (dorm && d !== +dorm) visible = false;
        if (p > precioMax) visible = false;

        card.style.display = visible ? '' : 'none';
        if (visible) visibleCount++;
    });

    const countEl = document.querySelector('.results-count');
    if (countEl) countEl.innerHTML = `<strong>${visibleCount}</strong> casa${visibleCount !== 1 ? 's' : ''} encontrada${visibleCount !== 1 ? 's' : ''}`;
}

function clearFilters() {
    const firstRadio = document.querySelector('input[name="dorm"][value=""]');
    if (firstRadio) firstRadio.checked = true;
    document.getElementById('precio-max').value = '';
    applyFilters();
}
</script>
</body>
</html>
