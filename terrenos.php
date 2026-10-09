<?php
require_once 'data/propiedades.php';

$categoria = 'terrenos';
$page        = 'Terrenos en Arequipa — Lotes y proyectos residenciales';
$description = 'Encuentra los mejores terrenos en Arequipa. Villa Victoria, Valle Sol y más proyectos con lotes desde S/ 8,900. Habilitación urbana, cuotas accesibles.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/terrenos';
include_once 'header.php';
?>

<div class="catalog-hero" style="background-image: url('/img/proyectos/vallesol.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Terrenos</span>
        </nav>
        <h1 class="catalog-hero__title">Terrenos en Arequipa</h1>
        <p class="catalog-hero__sub">Lotes con habilitación urbana en las mejores zonas de Arequipa. Desde S/ 8,900 con cuotas accesibles.</p>
    </div>
</div>

<section class="catalog-section">
    <div class="pd2"></div>
    <div class="catalog-layout l-container">

        <!-- Sidebar de filtros -->
        <aside class="catalog-sidebar">
            <h4 class="sidebar-title"><i class="ri-filter-3-line"></i> Filtrar resultados</h4>

            <div class="filter-group">
                <h5>Estado</h5>
                <label class="filter-check"><input type="radio" name="estado" value="" checked> Todos</label>
                <label class="filter-check"><input type="radio" name="estado" value="en-venta"> En venta</label>
                <label class="filter-check"><input type="radio" name="estado" value="reservado"> Reservado</label>
            </div>

            <div class="filter-group">
                <h5>Área (m²)</h5>
                <div class="filter-range">
                    <input type="number" id="area-min" placeholder="Mín" min="0" class="filter-input">
                    <span>—</span>
                    <input type="number" id="area-max" placeholder="Máx" class="filter-input">
                </div>
            </div>

            <div class="filter-group">
                <h5>Precio máximo</h5>
                <select id="precio-max" class="filter-select">
                    <option value="">Cualquiera</option>
                    <option value="10000">Hasta S/ 10,000</option>
                    <option value="20000">Hasta S/ 20,000</option>
                    <option value="30000">Hasta S/ 30,000</option>
                    <option value="50000">Hasta S/ 50,000</option>
                </select>
            </div>

            <button class="button primary w-full mt-1" onclick="applyFilters()">Aplicar filtros</button>
            <button class="btn-text mt-1" onclick="clearFilters()">Limpiar filtros</button>
        </aside>

        <!-- Grid de resultados -->
        <main class="catalog-main">
            <div class="catalog-results-header">
                <p class="results-count"><strong><?= count($terrenos) ?></strong> terrenos encontrados</p>
                <select class="sort-select" id="sort-select" onchange="sortResults()">
                    <option value="default">Ordenar por: Destacados</option>
                    <option value="precio-asc">Precio: menor a mayor</option>
                    <option value="precio-desc">Precio: mayor a menor</option>
                </select>
            </div>

            <div class="props-grid" id="props-grid">
                <?php foreach ($terrenos as $prop): ?>
                <?php include 'includes/card-propiedad.php'; ?>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <div class="pd2"></div>
</section>

<?php include_once 'footer.php'; ?>

<script>
// Reveal on scroll
document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => {
        if (e.isIntersecting) { el.classList.add('is-visible'); }
    }, { threshold: 0.1 }).observe(el);
});

function applyFilters() {
    const estado    = document.querySelector('input[name="estado"]:checked')?.value || '';
    const precioMax = +document.getElementById('precio-max').value || Infinity;
    const areaMin   = +document.getElementById('area-min').value || 0;
    const areaMax   = +document.getElementById('area-max').value || Infinity;
    const cards     = document.querySelectorAll('.prop-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const p = +card.dataset.precio || 0;
        const e = card.dataset.estado || '';
        const aMin = +card.dataset.areaMin || 0;
        const aMax = +card.dataset.areaMax || aMin;

        let visible = true;
        if (estado && e !== estado) visible = false;
        if (p > precioMax) visible = false;
        if (areaMin > 0 && aMax < areaMin) visible = false;
        if (areaMax < Infinity && aMin > areaMax) visible = false;

        card.style.display = visible ? '' : 'none';
        if (visible) visibleCount++;
    });

    const countEl = document.querySelector('.results-count');
    if (countEl) countEl.innerHTML = `<strong>${visibleCount}</strong> terreno${visibleCount !== 1 ? 's' : ''} encontrado${visibleCount !== 1 ? 's' : ''}`;
}

function clearFilters() {
    const firstRadio = document.querySelector('input[name="estado"][value=""]');
    if (firstRadio) firstRadio.checked = true;
    document.getElementById('precio-max').value = '';
    document.getElementById('area-min').value = '';
    document.getElementById('area-max').value = '';
    applyFilters();
}

function sortResults() {
    const grid  = document.getElementById('props-grid');
    const cards = [...grid.querySelectorAll('.prop-card')];
    const sort  = document.getElementById('sort-select').value;
    if (sort === 'precio-asc')  cards.sort((a,b) => +a.dataset.precio - +b.dataset.precio);
    if (sort === 'precio-desc') cards.sort((a,b) => +b.dataset.precio - +a.dataset.precio);
    cards.forEach(c => grid.appendChild(c));
}
</script>
</body>
</html>
