<?php
require_once 'data/propiedades.php';

$categoria         = 'departamentos';
$page              = 'Departamentos en Arequipa — En estreno y en construcción';
$description       = 'Departamentos en venta en Arequipa. Proyectos en estreno, en construcción y preventa en Cayma, Yanahuara, Cercado, Bustamante y Cerro Colorado.';
$canonical         = 'https://oportunidadesinmobiliariasperu.com/departamentos';
$preload_lcp_image = '/img/proyectos/eldorado.webp';
include_once 'header.php';

$en_construccion = array_filter($departamentos, fn($p) => $p['estado'] === 'en-construccion');
$en_estreno      = array_filter($departamentos, fn($p) => $p['estado'] === 'entregado');
$en_preventa     = array_filter($departamentos, fn($p) => $p['estado'] === 'preventa');

$requested_tab = $_GET['tab'] ?? 'preventa';
if ($requested_tab === 'entregados') {
    $requested_tab = 'estreno';
}
$active_tab    = in_array($requested_tab, ['preventa', 'en-construccion', 'estreno'], true)
    ? $requested_tab
    : 'preventa';
?>

<div class="catalog-hero" style="background-image: url('/img/proyectos/eldorado.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Departamentos</span>
        </nav>
        <h1 class="catalog-hero__title">Departamentos en Arequipa</h1>
        <p class="catalog-hero__sub">Proyectos en preventa, en construcción y de estreno en Arequipa.</p>
    </div>
</div>

<!-- Tabs de estado -->
<section class="depa-tabs-section">
    <div class="l-container">
        <div class="depa-tabs" id="depaTabs">
            <button class="depa-tab <?= $active_tab === 'preventa' ? 'active' : '' ?>" data-target="preventa">
                <i class="ri-draft-line"></i> Departamentos en preventa
                <span class="depa-tab__count"><?= count($en_preventa) ?></span>
            </button>
            <button class="depa-tab <?= $active_tab === 'en-construccion' ? 'active' : '' ?>" data-target="en-construccion">
                <i class="ri-building-4-line"></i> En construcción
                <span class="depa-tab__count"><?= count($en_construccion) ?></span>
            </button>
            <button class="depa-tab <?= $active_tab === 'estreno' ? 'active' : '' ?>" data-target="estreno">
                <i class="ri-key-2-line"></i> Departamentos en estreno
                <span class="depa-tab__count"><?= count($en_estreno) ?></span>
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
                <h5>Distrito</h5>
                <select id="filter-distrito" class="filter-select" onchange="applyFilters()">
                    <option value="">Todos los distritos</option>
                    <option value="yanahuara">Yanahuara</option>
                    <option value="cayma">Cayma</option>
                    <option value="cerro colorado">Cerro Colorado</option>
                    <option value="cercado">Cercado</option>
                    <option value="bustamante">José L. Bustamante y Rivero</option>
                </select>
            </div>
            <div class="filter-group">
                <h5>Etapa del proyecto</h5>
                <select id="filter-etapa" class="filter-select" onchange="applyFilters()">
                    <option value="todas">Todas las etapas</option>
                    <option value="preventa" <?= $active_tab === 'preventa' ? 'selected' : '' ?>>En Preventa (Planos)</option>
                    <option value="en-construccion" <?= $active_tab === 'en-construccion' ? 'selected' : '' ?>>En Construcción</option>
                    <option value="estreno" <?= $active_tab === 'estreno' ? 'selected' : '' ?>>Entrega Inmediata (Estreno)</option>
                </select>
            </div>
            <div class="filter-group">
                <h5>Dormitorios</h5>
                <select id="filter-dorm" class="filter-select" onchange="applyFilters()">
                    <option value="">Todos</option>
                    <option value="1">1 Dormitorio</option>
                    <option value="2">2 Dormitorios</option>
                    <option value="3">3 Dormitorios</option>
                    <option value="duplex">Dúplex / Penthouse</option>
                </select>
            </div>
            <button class="button primary w-full mt-1" onclick="applyFilters()">Aplicar filtros</button>
            <button class="btn-text mt-1" onclick="clearFilters()">Limpiar filtros</button>
        </aside>

        <main class="catalog-main">
            <!-- Departamentos en preventa -->
            <div id="panel-preventa" class="depa-panel" style="<?= $active_tab === 'preventa' ? '' : 'display:none;' ?>">
                <h3 class="depa-panel__title">
                    <i class="ri-draft-line"></i> Departamentos en preventa
                </h3>
                <p class="depa-panel__sub">Proyectos en planos con precios exclusivos de lanzamiento.</p>
                <div class="props-grid">
                    <?php $idx_card = 0; foreach ($en_preventa as $prop): $card_eager = ($active_tab === 'preventa' && $idx_card === 0); $idx_card++; ?>
                    <?php include 'includes/card-propiedad.php'; ?>
                    <?php endforeach; $card_eager = false; ?>
                </div>
            </div>

            <!-- En construcción -->
            <div id="panel-en-construccion" class="depa-panel" style="<?= $active_tab === 'en-construccion' ? '' : 'display:none;' ?>">
                <h3 class="depa-panel__title">
                    <i class="ri-building-4-line"></i> Proyectos en construcción
                </h3>
                <p class="depa-panel__sub">Separa tu departamento hoy y entramos en proceso constructivo juntos.</p>
                <div class="props-grid">
                    <?php $idx_card = 0; foreach ($en_construccion as $prop): $card_eager = ($active_tab === 'en-construccion' && $idx_card === 0); $idx_card++; ?>
                    <?php include 'includes/card-propiedad.php'; ?>
                    <?php endforeach; $card_eager = false; ?>
                </div>
            </div>

            <!-- Departamentos en estreno -->
            <div id="panel-estreno" class="depa-panel" style="<?= $active_tab === 'estreno' ? '' : 'display:none;' ?>">
                <h3 class="depa-panel__title">
                    <i class="ri-key-2-line"></i> Departamentos en estreno
                </h3>
                <p class="depa-panel__sub">Departamentos listos para entrega inmediata.</p>
                <div class="props-grid">
                    <?php $idx_card = 0; foreach ($en_estreno as $prop): $card_eager = ($active_tab === 'estreno' && $idx_card === 0); $idx_card++; ?>
                    <?php include 'includes/card-propiedad.php'; ?>
                    <?php endforeach; $card_eager = false; ?>
                </div>
            </div>
        </main>
    </div>
    <div class="pd2"></div>
</section>

<!-- ═══════════════════════════════════════════════
     BLOQUE 3: SECCIÓN POR ETAPA DE PROYECTO (SEO SEMÁNTICO — VARIANTE A1)
════════════════════════════════════════════════ -->
<section class="depas-etapas-a1">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="depas-etapas-a1__head">
            <span class="depas-etapas-a1__eyebrow">Modalidades de Inversión</span>
            <h2 class="depas-etapas-a1__title">Elige la Etapa Ideal para Comprar tu Departamento en Arequipa</h2>
            <p class="depas-etapas-a1__sub">Adaptamos nuestras opciones inmobiliarias a tu planificación financiera y tiempos de mudanza.</p>
        </div>

        <div class="depas-etapas-a1__grid">
            <!-- Columna 1 -->
            <article class="depas-etapas-a1__card reveal-card">
                <div class="depas-etapas-a1__top">
                    <span class="depas-etapas-a1__num">01</span>
                    <span class="depas-etapas-a1__line"></span>
                </div>
                <h3 class="depas-etapas-a1__card-title">1. Departamentos en Preventa (En Planos)</h3>
                <p class="depas-etapas-a1__card-text">
                    La opción favorita de los inversionistas. Accede al precio por metro cuadrado más bajo del mercado, elige las mejores ubicaciones y pisos del edificio, y paga la cuota inicial en cómodas armadas mensuales mientras avanza la obra. Obtén hasta un 20% de ganancia por plusvalía al finalizar la construcción.
                </p>
            </article>

            <!-- Columna 2 -->
            <article class="depas-etapas-a1__card reveal-card">
                <div class="depas-etapas-a1__top">
                    <span class="depas-etapas-a1__num">02</span>
                    <span class="depas-etapas-a1__line"></span>
                </div>
                <h3 class="depas-etapas-a1__card-title">2. Departamentos en Construcción</h3>
                <p class="depas-etapas-a1__card-text">
                    Ideal si buscas mudarte a mediano plazo con precios aún por debajo del valor de estreno. Puedes verificar el avance físico de la estructura, conocer la distribución real de los ambientes y asegurar tu financiamiento hipotecario con el banco de tu preferencia.
                </p>
            </article>

            <!-- Columna 3 -->
            <article class="depas-etapas-a1__card reveal-card">
                <div class="depas-etapas-a1__top">
                    <span class="depas-etapas-a1__num">03</span>
                    <span class="depas-etapas-a1__line"></span>
                </div>
                <h3 class="depas-etapas-a1__card-title">3. Departamentos de Entrega Inmediata (Estreno)</h3>
                <p class="depas-etapas-a1__card-text">
                    Proyectos 100% culminados y con independización lista. Visita el departamento real, verifica la calidad de los acabados (pisos, cocina equipada, closets), firma la escritura pública y múdate o ponlo en alquiler de forma inmediata. No pagas alcabala por ser primera venta.
                </p>
            </article>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- ═══════════════════════════════════════════════
     BLOQUE 4: GUÍA SEO DE DISTRITOS EN AREQUIPA (MAPA REAL GOOGLE MAPS + POLÍGONOS)
════════════════════════════════════════════════ -->
<section class="depas-distritos-map-section">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="depas-distritos-header">
            <div class="depas-distritos-header__text">
                <span class="depas-etapas-a1__eyebrow">Autoridad Local · Arequipa</span>
                <h2 class="depas-etapas-a1__title">Las Mejores Zonas para Vivir o Invertir en un Departamento en Arequipa</h2>
                <p class="depas-etapas-a1__sub">Nuestros proyectos inmobiliarios se ubican en distritos estratégicos que garantizan seguridad, conectividad y revalorización anual constante.</p>
            </div>

            <div class="depas-distritos-pills" role="tablist" aria-label="Seleccionar distrito en el mapa">
                <button type="button" class="depas-distrito-pill is-active" id="depas-dpill-yanahuara" data-map-district="yanahuara">
                    Yanahuara
                </button>
                <button type="button" class="depas-distrito-pill" id="depas-dpill-cayma" data-map-district="cayma">
                    Cayma
                </button>
                <button type="button" class="depas-distrito-pill" id="depas-dpill-cerro_colorado" data-map-district="cerro_colorado">
                    Cerro Colorado
                </button>
            </div>
        </div>

        <div class="depas-distritos-split">
            <!-- Columna Izquierda: Visor Cartográfico Google Maps + Polígonos Oficiales GeoJSON -->
            <div class="depas-gmap-col">
                <div class="depas-gmap-viewport" id="depasMapViewport">
                    <!-- Ubicación activa (Arriba Izquierda) -->
                    <div class="depas-gmap-search depas-gmap-ctrl">
                        <i class="ri-map-pin-2-fill depas-gmap-search__pin"></i>
                        <div>
                            <strong id="depasGmapTitle">Yanahuara, Arequipa</strong>
                            <span id="depasGmapSub">Límite distrital oficial · 2 proyectos activos</span>
                        </div>
                    </div>

                    <!-- Botón Vista General (Arriba Derecha) -->
                    <div class="depas-gmap-top-right depas-gmap-ctrl">
                        <button type="button" class="depas-gmap-overview-btn" id="depasMapOverviewBtn">
                            Ver los 3 distritos
                        </button>
                    </div>

                    <!-- Escena transformable 1536x1536 -->
                    <div class="depas-gmap-stage" id="depasMapStage">
                        <img id="depasImgRoad"
                             src="/img/sections/gmap-arequipa-road.webp"
                             alt="Mapa de distritos de Arequipa: Yanahuara, Cayma y Cerro Colorado"
                             width="1536" height="1536"
                             loading="lazy" decoding="async" draggable="false">
                        <img id="depasImgSat"
                             data-src="/img/sections/gmap-arequipa-hybrid.webp"
                             alt="Vista satelital de Arequipa: Yanahuara, Cayma y Cerro Colorado"
                             width="1536" height="1536"
                             decoding="async" draggable="false"
                             style="display:none;">

                        <svg viewBox="0 0 1536 1536" width="1536" height="1536" class="depas-gmap-svg">
                            <defs>
                                <filter id="depasBorderGlow" x="-15%" y="-15%" width="130%" height="130%">
                                    <feDropShadow dx="0" dy="0" stdDeviation="5" flood-color="#087ac4" flood-opacity="0.55"/>
                                </filter>
                                <filter id="depasPinDrop" x="-20%" y="-20%" width="140%" height="150%">
                                    <feDropShadow dx="0" dy="3" stdDeviation="3" flood-color="#000000" flood-opacity="0.3"/>
                                </filter>
                            </defs>

                            <path id="depasSpotlightMask" fill="rgba(10, 27, 61, 0.10)" fill-rule="evenodd" pointer-events="none" d="" />
                            <g id="depasInactivePolys"></g>
                            <g pointer-events="none">
                                <path id="depasActiveHalo" fill="none" stroke="#ffffff" stroke-width="7" stroke-linejoin="round" opacity="0.85" />
                                <path id="depasActiveFill" fill="rgba(8, 122, 196, 0.15)" stroke="#087ac4" stroke-width="3.8" stroke-linejoin="round" filter="url(#depasBorderGlow)" />
                            </g>
                            <g id="depasProjectPins"></g>
                        </svg>
                    </div>

                    <!-- Selector Mapa / Satélite Estilo Google Maps (Abajo Izquierda) -->
                    <button type="button" class="depas-gmap-layer-btn depas-gmap-ctrl" id="depasLayerSwitch" title="Alternar Mapa / Satélite">
                        <img id="depasLayerThumb" src="/img/sections/gmap-sat-thumb.webp" alt="Vista Satélite" width="64" height="64" loading="lazy">
                        <span id="depasLayerLabel">Satélite</span>
                    </button>

                    <!-- Controles Zoom + / - (Abajo Derecha) -->
                    <div class="depas-gmap-zoom depas-gmap-ctrl">
                        <button type="button" id="depasZoomIn" aria-label="Acercar mapa">+</button>
                        <button type="button" id="depasZoomOut" aria-label="Alejar mapa">&minus;</button>
                    </div>

                    <!-- Barra Inferior de Proyectos Activos + Filtrado Directo -->
                    <div class="depas-gmap-dock depas-gmap-ctrl">
                        <div class="depas-gmap-dock__info">
                            <span class="depas-gmap-dock__dot"></span>
                            <span id="depasBottomProjects">
                                Proyectos en Yanahuara: <strong>Mirador del Misti</strong> · <strong>Mirador de Santa Catalina</strong>
                            </span>
                        </div>
                        <div class="depas-gmap-dock__right">
                            <small class="depas-gmap-dock__copy">Datos del mapa &copy;2026 Google</small>
                            <button type="button" class="depas-gmap-dock__cta" id="depasBottomFilterBtn">
                                Filtrar Yanahuara &rarr;
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Las 3 Cajas SEO por Distrito -->
            <div class="depas-distritos-list">
                <!-- Caja 1: Yanahuara -->
                <article class="depas-distrito-box is-active reveal-card" id="depas-dcard-yanahuara" data-map-district="yanahuara">
                    <div class="depas-distrito-box__top">
                        <span class="depas-distrito-box__code">01 &middot; YANAHUARA</span>
                        <span class="depas-distrito-box__line"></span>
                    </div>
                    <h3 class="depas-distrito-box__title">Departamentos en Yanahuara</h3>
                    <p class="depas-distrito-box__desc">
                        Distrito tradicional, turístico y altamente residencial. Comprar un departamento en Yanahuara te asegura cercanía al centro financiero, colegios de prestigio, parques tranquilos y una altísima demanda para alquiler tradicional o Airbnb.
                    </p>
                </article>

                <!-- Caja 2: Cayma -->
                <article class="depas-distrito-box reveal-card" id="depas-dcard-cayma" data-map-district="cayma">
                    <div class="depas-distrito-box__top">
                        <span class="depas-distrito-box__code">02 &middot; CAYMA</span>
                        <span class="depas-distrito-box__line"></span>
                    </div>
                    <h3 class="depas-distrito-box__title">Departamentos en Cayma</h3>
                    <p class="depas-distrito-box__desc">
                        El corazón comercial y moderno de Arequipa. Nuestros edificios en Cayma ofrecen acceso rápido a los principales centros comerciales (Mall Plaza, Real Plaza), clínicas privadas y restaurantes, con excelente proyección de valorización.
                    </p>
                </article>

                <!-- Caja 3: Cerro Colorado -->
                <article class="depas-distrito-box reveal-card" id="depas-dcard-cerro_colorado" data-map-district="cerro_colorado">
                    <div class="depas-distrito-box__top">
                        <span class="depas-distrito-box__code">03 &middot; CERRO COLORADO</span>
                        <span class="depas-distrito-box__line"></span>
                    </div>
                    <h3 class="depas-distrito-box__title">Departamentos en Cerro Colorado</h3>
                    <p class="depas-distrito-box__desc">
                        El polo de mayor expansión urbana y habitacional de la Ciudad Blanca. Cuenta con condominios modernos, precios competitivos en preventa, amplias áreas comunes y conexión directa hacia la vía de Evitamiento y el aeropuerto.
                    </p>
                </article>
            </div>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<?php include_once 'footer.php'; ?>
<script src="/js/distritos-mapa.js?v=0.1.0" defer></script>
<script>
(function () {
    const cards = document.querySelectorAll('.reveal-card');
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
        cards.forEach(el => el.classList.add('is-visible'));
    } else {
        const cardObs = new IntersectionObserver((entries, obs) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('is-visible');
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.1 });
        cards.forEach(el => cardObs.observe(el));
    }
})();

document.querySelectorAll('.depa-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        const etapaSelect = document.getElementById('filter-etapa');
        if (etapaSelect) {
            etapaSelect.value = tab.dataset.target;
        }
        applyFilters();
    });
});

function applyFilters() {
    const distrito = (document.getElementById('filter-distrito')?.value || '').toLowerCase();
    const etapa    = document.getElementById('filter-etapa')?.value || 'todas';
    const dorm     = document.getElementById('filter-dorm')?.value || '';

    const panelEstreno      = document.getElementById('panel-estreno');
    const panelConstruccion = document.getElementById('panel-en-construccion');
    const panelPreventa     = document.getElementById('panel-preventa');
    const tabs              = document.querySelectorAll('.depa-tab');

    // Mostrar/ocultar paneles según la Etapa del proyecto seleccionada
    if (etapa === 'estreno') {
        if (panelEstreno) panelEstreno.style.display = '';
        if (panelConstruccion) panelConstruccion.style.display = 'none';
        if (panelPreventa) panelPreventa.style.display = 'none';
        tabs.forEach(t => t.classList.toggle('active', t.dataset.target === 'estreno'));
    } else if (etapa === 'en-construccion') {
        if (panelEstreno) panelEstreno.style.display = 'none';
        if (panelConstruccion) panelConstruccion.style.display = '';
        if (panelPreventa) panelPreventa.style.display = 'none';
        tabs.forEach(t => t.classList.toggle('active', t.dataset.target === 'en-construccion'));
    } else if (etapa === 'preventa') {
        if (panelEstreno) panelEstreno.style.display = 'none';
        if (panelConstruccion) panelConstruccion.style.display = 'none';
        if (panelPreventa) panelPreventa.style.display = '';
        tabs.forEach(t => t.classList.toggle('active', t.dataset.target === 'preventa'));
    } else {
        // Todas las etapas
        if (panelEstreno) panelEstreno.style.display = '';
        if (panelConstruccion) panelConstruccion.style.display = '';
        if (panelPreventa) panelPreventa.style.display = '';
        tabs.forEach(t => t.classList.remove('active'));
    }

    const cards = document.querySelectorAll('.prop-card');
    cards.forEach(card => {
        const cardUbicacion = (card.dataset.ubicacion || '').toLowerCase();
        const cardDorm      = +card.dataset.dorm || 0;
        const cardDormsList = (card.dataset.dorms || String(cardDorm)).split(',').map(v => v.trim());
        const cardAreaMax   = +card.dataset.areaMax || 0;

        let visible = true;

        if (distrito && !cardUbicacion.includes(distrito)) {
            visible = false;
        }

        if (dorm) {
            if (dorm === 'duplex') {
                if (cardAreaMax < 105 && cardDorm < 3) visible = false;
            } else {
                if (!cardDormsList.includes(String(dorm))) visible = false;
            }
        }

        card.style.display = visible ? '' : 'none';
        if (visible) {
            card.classList.add('is-visible');
        }
    });
}

function clearFilters() {
    const distritoSelect = document.getElementById('filter-distrito');
    const etapaSelect    = document.getElementById('filter-etapa');
    const dormSelect     = document.getElementById('filter-dorm');

    if (distritoSelect) distritoSelect.value = '';
    if (etapaSelect) etapaSelect.value = 'todas';
    if (dormSelect) dormSelect.value = '';
    applyFilters();
}
</script>
</body>
</html>
