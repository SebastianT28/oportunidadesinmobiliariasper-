<?php
require_once 'data/propiedades.php';

$categoria   = 'departamentos';
$page        = 'Departamentos en Arequipa — En construcción y entregados';
$description = 'Departamentos en venta en Arequipa. Proyectos en construcción y entregados. Desde S/ 175,000 en Cayma, Yanahuara, Paucarpata. 2 y 3 dormitorios.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/departamentos';
include_once 'header.php';

$en_construccion = array_filter($departamentos, fn($p) => $p['estado'] === 'en-construccion');
$entregados      = array_filter($departamentos, fn($p) => $p['estado'] === 'entregado');
?>

<div class="catalog-hero" style="background-image: url('/img/proyectos/eldorado.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Departamentos</span>
        </nav>
        <h1 class="catalog-hero__title">Departamentos en Arequipa</h1>
        <p class="catalog-hero__sub">Proyectos en construcción y ya entregados en los mejores distritos de Arequipa.</p>
    </div>
</div>

<!-- Tabs de estado -->
<section class="depa-tabs-section">
    <div class="l-container">
        <div class="depa-tabs" id="depaTabs">
            <button class="depa-tab active" data-target="en-construccion">
                <i class="ri-building-4-line"></i> En construcción
                <span class="depa-tab__count"><?= count($en_construccion) ?></span>
            </button>
            <button class="depa-tab" data-target="entregados">
                <i class="ri-check-double-line"></i> Entregados
                <span class="depa-tab__count"><?= count($entregados) ?></span>
            </button>
        </div>
    </div>
</section>

<section class="catalog-section">
    <div class="pd1"></div>
    <div class="catalog-layout l-container">
        <aside class="catalog-sidebar">
            <h4 class="sidebar-title"><i class="ri-filter-3-line"></i> Filtrar</h4>
            <div class="filter-group">
                <h5>Dormitorios</h5>
                <label class="filter-check"><input type="radio" name="dorm" value="" checked> Todos</label>
                <label class="filter-check"><input type="radio" name="dorm" value="2"> 2 dormitorios</label>
                <label class="filter-check"><input type="radio" name="dorm" value="3"> 3 dormitorios</label>
            </div>
            <div class="filter-group">
                <h5>Precio máximo</h5>
                <select id="precio-max" class="filter-select">
                    <option value="">Cualquiera</option>
                    <option value="200000">Hasta S/ 200,000</option>
                    <option value="250000">Hasta S/ 250,000</option>
                    <option value="320000">Hasta S/ 320,000</option>
                </select>
            <button class="button primary w-full mt-1" onclick="applyFilters()">Aplicar filtros</button>
            <button class="btn-text mt-1" onclick="clearFilters()">Limpiar filtros</button>
        </aside>

        <main class="catalog-main">
            <!-- En construcción -->
            <div id="panel-en-construccion" class="depa-panel">
                <h3 class="depa-panel__title">
                    <i class="ri-building-4-line"></i> Proyectos en construcción
                </h3>
                <p class="depa-panel__sub">Separa tu departamento hoy y entramos en proceso constructivo juntos.</p>
                <div class="props-grid">
                    <?php foreach ($en_construccion as $prop): ?>
                    <?php include 'includes/card-propiedad.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Entregados -->
            <div id="panel-entregados" class="depa-panel" style="display:none;">
                <h3 class="depa-panel__title">
                    <i class="ri-check-double-line"></i> Proyectos entregados
                </h3>
                <p class="depa-panel__sub">Unidades disponibles de propietarios directos.</p>
                <div class="props-grid">
                    <?php foreach ($entregados as $prop): ?>
                    <?php include 'includes/card-propiedad.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
    <div class="pd2"></div>
</section>

<?php include_once 'footer.php'; ?>
<script>
document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => {
        if (e.isIntersecting) el.classList.add('is-visible');
    }, { threshold: 0.1 }).observe(el);
});

document.querySelectorAll('.depa-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.depa-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        document.querySelectorAll('.depa-panel').forEach(p => p.style.display = 'none');
        document.getElementById('panel-' + tab.dataset.target).style.display = '';
        applyFilters();
    });
});

function applyFilters() {
    const dorm      = document.querySelector('input[name="dorm"]:checked')?.value || '';
    const precioMax = +document.getElementById('precio-max').value || Infinity;
    const cards     = document.querySelectorAll('.prop-card');

    cards.forEach(card => {
        const p = +card.dataset.precio || 0;
        const d = +card.dataset.dorm || 0;

        let visible = true;
        if (dorm && d !== +dorm) visible = false;
        if (p > precioMax) visible = false;

        card.style.display = visible ? '' : 'none';
    });
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
