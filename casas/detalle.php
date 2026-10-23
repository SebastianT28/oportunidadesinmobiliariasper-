<?php
require_once '../data/propiedades.php';

$slug = $_GET['slug'] ?? '';
$prop = findProperty($slug);
$current_prop = $prop;

if (!$prop || $prop['categoria'] !== 'casas') {
    header('Location: /casas');
    exit;
}

$related = relatedProperties('casas', $slug);

$page        = $prop['nombre'] . ' — Casa en ' . $prop['ubicacion'];
$description = $prop['descripcion'];
$canonical   = 'https://oportunidadesinmobiliariasperu.com/casas/' . $prop['slug'];
$og_image    = 'https://oportunidadesinmobiliariasperu.com/' . $prop['imagen_og'];
$base = '../';
include_once '../header.php';
?>

<div class="detail-breadcrumb">
    <div class="l-container">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <a href="/casas">Casas</a> <i class="ri-arrow-right-s-line"></i>
            <span><?= htmlspecialchars($prop['nombre']) ?></span>
        </nav>
    </div>
</div>

<?php 
$has_360  = !empty($prop['has_panorama']) && $prop['has_panorama']; 
$has_tour = !empty($prop['tour_virtual']['activo']) && !empty($prop['tour_virtual']['escenas']);
?>

<!-- Galería hero con Visor 360° y Tour Virtual 3D integrados -->
<section class="detail-gallery">
    <div class="gallery-main <?= $has_360 ? 'is-360-mode' : ($has_tour ? 'is-tour-mode' : 'is-photo-mode') ?>" id="galleryMainWrap">
        <?php if ($has_360): ?>
        <!-- Visor Panorámico 360° interactivo (Pannellum) -->
        <div class="panorama-viewer" id="panoramaViewer360" style="background: #060b14 url('/<?= htmlspecialchars($current_prop['imagenes'][0], ENT_QUOTES) ?>') center/cover no-repeat;"></div>
        <?php endif; ?>

        <?php if ($has_tour): ?>
        <!-- Visor Tour Virtual 3D punto a punto estilo Kuula (Pannellum) -->
        <div class="panorama-viewer panorama-viewer--tour" id="tourViewer3D" style="background: #060b14 url('/<?= htmlspecialchars($current_prop['imagenes'][0], ENT_QUOTES) ?>') center/cover no-repeat; <?= $has_360 ? 'display: none;' : '' ?>"></div>
        <!-- Barra de escenas del tour -->
        <div class="tour-scene-bar" id="tourSceneBar" style="<?= $has_360 ? 'display: none;' : '' ?>">
            <!-- Versión Desktop: Chips horizontales -->
            <div class="tour-scenes-desktop">
                <?php foreach ($prop['tour_virtual']['escenas'] as $idx => $escena): ?>
                <button type="button" 
                        class="tour-scene-chip <?= $idx === 0 ? 'active' : '' ?>" 
                        data-scene="<?= htmlspecialchars($escena['id']) ?>"
                        onclick="event.stopPropagation(); tourGoToScene('<?= htmlspecialchars($escena['id']) ?>')">
                    <span class="tour-chip-num"><?= $idx + 1 ?></span>
                    <span class="tour-chip-title"><?= htmlspecialchars($escena['titulo']) ?></span>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Versión Móvil/Tablet: Barra desplegable de Ambientes -->
            <div class="tour-scenes-dropdown" id="tourScenesDropdown">
                <button type="button" 
                        class="tour-dropdown-trigger" 
                        id="tourDropdownTrigger"
                        aria-expanded="false"
                        onclick="event.stopPropagation(); toggleTourDropdown()">
                    <span class="tour-dropdown-label">Ambientes</span>
                    <span class="tour-dropdown-current" id="tourDropdownCurrent">
                        <span class="tour-chip-num">1</span>
                        <span class="tour-chip-title"><?= htmlspecialchars($prop['tour_virtual']['escenas'][0]['titulo']) ?></span>
                    </span>
                    <i class="ri-arrow-down-s-line tour-dropdown-arrow" id="tourDropdownArrow"></i>
                </button>
                <div class="tour-dropdown-menu" id="tourDropdownMenu">
                    <?php foreach ($prop['tour_virtual']['escenas'] as $idx => $escena): ?>
                    <button type="button" 
                            class="tour-dropdown-item <?= $idx === 0 ? 'active' : '' ?>" 
                            data-scene="<?= htmlspecialchars($escena['id']) ?>"
                            data-num="<?= $idx + 1 ?>"
                            data-title="<?= htmlspecialchars($escena['titulo']) ?>"
                            onclick="event.stopPropagation(); selectTourScene('<?= htmlspecialchars($escena['id']) ?>')">
                        <span class="tour-chip-num"><?= $idx + 1 ?></span>
                        <span class="tour-item-title"><?= htmlspecialchars($escena['titulo']) ?></span>
                        <i class="ri-check-line tour-item-check"></i>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <img src="/<?= $prop['imagenes'][0] ?>" 
             alt="<?= htmlspecialchars($prop['nombre']) ?>" 
             id="galleryMain" 
             loading="eager"
             onclick="openLightbox(galleryState.currentPhoto)"
             style="<?= ($has_360 || $has_tour) ? 'display: none;' : '' ?>">

        <span class="gallery-counter" id="galleryCounter">
            <?php if ($has_360): ?>
                <i class="ri-compass-3-line"></i> Vista 360°
            <?php elseif ($has_tour): ?>
                <i class="ri-walk-line"></i> Tour 360: <?= htmlspecialchars($prop['tour_virtual']['escenas'][0]['titulo']) ?>
            <?php else: ?>
                1 / <?= count($prop['imagenes']) ?>
            <?php endif; ?>
        </span>

        <button type="button" id="galleryExpand" class="gallery-expand" onclick="event.stopPropagation(); openLightbox(galleryState.currentPhoto)" style="<?= ($has_360 || $has_tour) ? 'display:none;' : '' ?>">
            <i class="ri-fullscreen-line"></i> Ver galería completa
        </button>

        <button type="button" class="gallery-arrow gallery-arrow--prev" onclick="event.stopPropagation(); galleryNav(-1)" aria-label="Anterior">
            <i class="ri-arrow-left-s-line"></i>
        </button>
        <button type="button" class="gallery-arrow gallery-arrow--next" onclick="event.stopPropagation(); galleryNav(1)" aria-label="Siguiente">
            <i class="ri-arrow-right-s-line"></i>
        </button>
    </div>

    <div class="gallery-thumbs" id="galleryThumbs">
        <?php if ($has_360): ?>
        <div class="gallery-thumb gallery-thumb--360 active" 
             data-type="360"
             onclick="galleryGoTo(0)">
            <img src="/<?= $prop['imagenes'][0] ?>" alt="Vista 360°" loading="lazy">
            <span class="thumb-360-badge">
                <i class="ri-compass-3-line"></i>
                <span>360°</span>
            </span>
        </div>
        <?php endif; ?>

        <?php if ($has_tour): ?>
        <div class="gallery-thumb gallery-thumb--tour <?= (!$has_360 ? 'active' : '') ?>" 
             data-type="tour"
             onclick="galleryGoTo(<?= $has_360 ? 1 : 0 ?>)">
            <img src="/<?= $prop['imagenes'][0] ?>" alt="Tour 360" loading="lazy">
            <span class="thumb-360-badge thumb-tour-badge">
                <i class="ri-walk-line"></i>
                <span>Tour 360</span>
            </span>
        </div>
        <?php endif; ?>

        <?php 
        $thumbOffset = ($has_360 ? 1 : 0) + ($has_tour ? 1 : 0);
        foreach ($prop['imagenes'] as $i => $img): 
        ?>
        <div class="gallery-thumb <?= ($thumbOffset === 0 && $i === 0) ? 'active' : '' ?>" 
             data-src="/<?= htmlspecialchars($img) ?>"
             onclick="galleryGoTo(<?= $i + $thumbOffset ?>)">
            <img src="/<?= $img ?>" alt="Foto <?= $i+1 ?> de <?= htmlspecialchars($prop['nombre']) ?>" loading="lazy">
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox-overlay" id="lightboxOverlay" role="dialog" aria-modal="true" aria-label="Galería de imágenes">
    <button class="lightbox-close" id="lightboxClose" aria-label="Cerrar"><i class="ri-close-line"></i></button>
    <button class="lightbox-arrow lightbox-arrow--prev" id="lbPrev" aria-label="Anterior"><i class="ri-arrow-left-s-line"></i></button>
    <div class="lightbox-img-wrap">
        <img src="" alt="" class="lightbox-img" id="lightboxImg">
    </div>
    <button class="lightbox-arrow lightbox-arrow--next" id="lbNext" aria-label="Siguiente"><i class="ri-arrow-right-s-line"></i></button>
    <div class="lightbox-footer">
        <div class="lightbox-counter" id="lightboxCounter">1 / <?= count($prop['imagenes']) ?></div>
        <div class="lightbox-thumbs" id="lightboxThumbs">
            <?php foreach ($prop['imagenes'] as $i => $img): ?>
            <div class="lightbox-thumb <?= $i === 0 ? 'active' : '' ?>" onclick="lbGoTo(<?= $i ?>)">
                <img src="/<?= $img ?>" alt="Foto <?= $i+1 ?>" loading="lazy">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="detail-header l-container">
    <div class="detail-header__left">
        <h1 class="detail-nombre"><?= htmlspecialchars($prop['nombre']) ?></h1>
        <p class="detail-ubicacion"><i class="flaticon-location-pin"></i> <?= htmlspecialchars($prop['ubicacion']) ?></p>
    </div>
    <span class="badge-estado badge--<?= $prop['estado'] ?>">En venta</span>
</div>

<section class="detail-layout l-container">
    <div class="detail-main">
        <div class="detail-stats">
            <div class="stat-box">
                <i class="ri-hotel-bed-line"></i>
                <strong><?= $prop['dormitorios'] ?></strong>
                <span>Dormitorios</span>
            </div>
            <div class="stat-box">
                <i class="flaticon-bathtub"></i>
                <strong><?= $prop['banos'] ?></strong>
                <span>Baños</span>
            </div>
            <div class="stat-box">
                <i class="ri-layout-2-line"></i>
                <strong><?= $prop['area_min'] ?>–<?= $prop['area_max'] ?> m²</strong>
                <span>Área construida</span>
            </div>
            <div class="stat-box">
                <i class="flaticon-save-money"></i>
                <strong>S/ <?= number_format($prop['precio'], 0, '.', ',') ?></strong>
                <span>Precio desde</span>
            </div>
        </div>

        <div class="detail-section">
            <h2>Descripción</h2>
            <p><?= nl2br(htmlspecialchars($prop['descripcion_larga'])) ?></p>
        </div>

        <div class="detail-section">
            <h2>Características</h2>
            <div class="features-grid">
                <?php foreach ($prop['caracteristicas'] as $feat): ?>
                <div class="feature-item">
                    <i class="ri-check-line"></i>
                    <span><?= htmlspecialchars($feat) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="detail-section">
            <h2>Ubicación</h2>
            <div class="map-embed">
                <iframe src="https://maps.google.com/maps?q=<?= $prop['lat'] ?>,<?= $prop['lng'] ?>&z=15&output=embed"
                        width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <aside class="detail-sidebar">
        <div class="detail-contact-card">
            <div class="advisor-info">
                <img src="/img/team_carlos.webp" alt="Carlos Mamani - Asesor OIP" class="advisor-img">
                <div>
                    <strong>Tu asesor</strong>
                    <p>Carlos Mamani &mdash; OIP</p>
                    <a href="tel:+51999653412">999 653 412</a>
                </div>
            </div>
            <?php
            $form_titulo   = 'Solicitar información';
            $form_proyecto = $prop['nombre'];
            include '../includes/form-contacto.php';
            ?>
        </div>
    </aside>
</section>

<?php if (!empty($related)): ?>
<section class="related-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <h2 class="main_title main-color">También te puede interesar</h2>
    </div>
    <div class="pd1"></div>
    <div class="props-grid l-container">
        <?php foreach ($related as $rel_prop): ?>
        <?php $prop = $rel_prop; include '../includes/card-propiedad.php'; ?>
        <?php endforeach; ?>
        <?php $prop = $current_prop; ?>
    </div>
    <div class="pd2"></div>
</section>
<?php endif; ?>

<?php include_once '../footer.php'; ?>

<?php if ($has_360 || $has_tour): ?>
<!-- Pannellum JS (diferido para no bloquear render de la página) -->
<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js" defer></script>
<?php endif; ?>

<script>
var pnlmViewerInstance = null;
var tourViewerInstance = null;
var tourScenesData     = null;

// Pausar auto-rotación cuando el visor sale del viewport (ahorra CPU y batería)
function setupPanoVisibilityObserver() {
    if (!('IntersectionObserver' in window)) return;
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            try {
                if (pnlmViewerInstance && typeof pnlmViewerInstance.isLoaded === 'function' && pnlmViewerInstance.isLoaded()) {
                    if (!entry.isIntersecting) {
                        pnlmViewerInstance.stopAutoRotate();
                    } else {
                        pnlmViewerInstance.startAutoRotate(-2);
                    }
                }
                if (tourViewerInstance && typeof tourViewerInstance.isLoaded === 'function' && tourViewerInstance.isLoaded()) {
                    if (!entry.isIntersecting) {
                        tourViewerInstance.stopAutoRotate();
                    } else {
                        tourViewerInstance.startAutoRotate(-1.5);
                    }
                }
            } catch(e) {}
        });
    }, { threshold: 0.15 });

    var wrap = document.getElementById('galleryMainWrap');
    if (wrap) obs.observe(wrap);
}

<?php if ($has_360): ?>
// Inicializar Visor 360° individual (carga diferida inteligente para PageSpeed)
function initPanorama360() {
    if (pnlmViewerInstance || !document.getElementById('panoramaViewer360')) return;
    if (typeof pannellum === 'undefined') {
        setTimeout(initPanorama360, 60);
        return;
    }
    var imageSrc = '<?= htmlspecialchars($current_prop['panorama_360'], ENT_QUOTES) ?>';

    try {
        pnlmViewerInstance = pannellum.viewer('panoramaViewer360', {
            type:          'equirectangular',
            panorama:      imageSrc,
            autoLoad:      true,
            autoRotate:    -2,
            autoRotateInactivityDelay: 3000,
            showControls:  true,
            showFullscreenCtrl: true,
            showZoomCtrl:  true,
            hfov:          100,
            minHfov:       50,
            maxHfov:       120,
            pitch:         0,
            yaw:           0,
            hotSpotDebug:  false,
            strings: {
                loadButtonLabel:   'Cargar panorama 360°',
                loadingLabel:      'Cargando...',
                bylineLabel:       '',
                noPanoramaError:   'No se encontró la imagen panorámica.',
                fileAccessError:   'No se pudo acceder al archivo: %s',
                malformedURLError: 'URL de imagen incorrecta.',
                iOS8WebGLError:    'Panorama no compatible con este dispositivo.',
                genericWebGLError: 'WebGL no disponible en este navegador.',
                textureSizeError:  'Imagen demasiado grande para este dispositivo (%spx).',
                unknownError:      'Error al iniciar el visor 360°.'
            }
        });
        setupPanoVisibilityObserver();
    } catch(e) {
        console.error('Error al iniciar Visor 360°:', e);
    }
}

// Carga en segundo plano tras pintar la página crítica
if ('requestIdleCallback' in window) {
    requestIdleCallback(function() { initPanorama360(); }, { timeout: 1000 });
} else {
    window.addEventListener('load', function() {
        setTimeout(initPanorama360, 80);
    });
}
<?php endif; ?>

<?php if ($has_tour): ?>
// Configuración multi-escena del Tour Virtual 3D (estilo Kuula)
tourScenesData = {
    default: {
        firstScene:        '<?= $prop['tour_virtual']['escenas'][0]['id'] ?>',
        sceneFadeDuration: 900,
        autoLoad:          true,
        autoRotate:        -1.5,
        autoRotateInactivityDelay: 3500,
        showControls:      true,
        showFullscreenCtrl: true,
        showZoomCtrl:      true,
        hfov:              100,
        minHfov:           50,
        maxHfov:           120,
        strings: {
            loadButtonLabel:   'Iniciar Tour Virtual 3D',
            loadingLabel:      'Cargando escena 3D...',
            bylineLabel:       '',
            noPanoramaError:   'No se encontró la escena.',
            fileAccessError:   'No se pudo acceder al archivo: %s',
            malformedURLError: 'URL de escena incorrecta.',
            iOS8WebGLError:    'Tour 3D no compatible con este dispositivo.',
            genericWebGLError: 'WebGL no disponible en este navegador.',
            textureSizeError:  'Imagen demasiado grande (%spx).',
            unknownError:      'Error al iniciar el Tour Virtual.'
        }
    },
    scenes: {
        <?php foreach ($prop['tour_virtual']['escenas'] as $escena): ?>
        '<?= $escena['id'] ?>': {
            type:     'equirectangular',
            title:    '<?= htmlspecialchars($escena['titulo'], ENT_QUOTES) ?>',
            panorama: '<?= htmlspecialchars($escena['imagen'], ENT_QUOTES) ?>',
            pitch:    <?= (float)($escena['pitch'] ?? 0) ?>,
            yaw:      <?= (float)($escena['yaw'] ?? 0) ?>,
            hfov:     <?= (int)($escena['hfov'] ?? 100) ?>,
            hotSpots: <?= json_encode(array_map(function($hs) {
                return [
                    'pitch'       => (float)($hs['pitch'] ?? 0),
                    'yaw'         => (float)($hs['yaw'] ?? 0),
                    'type'        => $hs['type'] ?? 'scene',
                    'sceneId'     => $hs['sceneId'] ?? '',
                    'text'        => $hs['text'] ?? '',
                    'targetYaw'   => (float)($hs['targetYaw'] ?? 0),
                    'targetPitch' => (float)($hs['targetPitch'] ?? 0),
                ];
            }, $escena['hotspots'] ?? [])) ?>
        },
        <?php endforeach; ?>
    }
};

function initTourViewer() {
    if (tourViewerInstance || !document.getElementById('tourViewer3D')) return;
    if (typeof pannellum === 'undefined') {
        setTimeout(initTourViewer, 60);
        return;
    }
    try {
        tourViewerInstance = pannellum.viewer('tourViewer3D', tourScenesData);
        setupPanoVisibilityObserver();

        tourViewerInstance.on('scenechange', function(sceneId) {
            // Sincronizar barra flotante de chips desktop
            document.querySelectorAll('#tourSceneBar .tour-scene-chip').forEach(function(chip) {
                chip.classList.toggle('active', chip.getAttribute('data-scene') === sceneId);
            });
            // Sincronizar elementos del dropdown móvil y etiqueta activa
            document.querySelectorAll('#tourDropdownMenu .tour-dropdown-item').forEach(function(item) {
                var isActive = item.getAttribute('data-scene') === sceneId;
                item.classList.toggle('active', isActive);
                if (isActive) {
                    var currentContainer = document.getElementById('tourDropdownCurrent');
                    if (currentContainer) {
                        currentContainer.innerHTML = '<span class="tour-chip-num">' + item.getAttribute('data-num') + '</span>' +
                                                     '<span class="tour-chip-title">' + item.getAttribute('data-title') + '</span>';
                    }
                }
            });
            // Sincronizar etiqueta del contador
            var sceneInfo = tourScenesData.scenes[sceneId];
            var title = sceneInfo ? sceneInfo.title : 'Tour 360';
            var counter = document.getElementById('galleryCounter');
            if (counter && galleryItems[galleryState.currentIndex] && galleryItems[galleryState.currentIndex].type === 'tour') {
                counter.innerHTML = '<i class="ri-walk-line"></i> Tour 360: ' + title;
            }
        });
    } catch (e) {
        console.error('Error al iniciar Tour Virtual 3D:', e);
    }
}

window.tourGoToScene = function(sceneId) {
    if (tourViewerInstance && typeof tourViewerInstance.loadScene === 'function') {
        tourViewerInstance.loadScene(sceneId);
    }
};

window.toggleTourDropdown = function() {
    var menu = document.getElementById('tourDropdownMenu');
    var trigger = document.getElementById('tourDropdownTrigger');
    if (menu && trigger) {
        var isOpen = menu.classList.toggle('is-open');
        trigger.classList.toggle('is-open', isOpen);
        trigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }
};

window.closeTourDropdown = function() {
    var menu = document.getElementById('tourDropdownMenu');
    var trigger = document.getElementById('tourDropdownTrigger');
    if (menu && trigger) {
        menu.classList.remove('is-open');
        trigger.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
    }
};

window.selectTourScene = function(sceneId) {
    window.tourGoToScene(sceneId);
    window.closeTourDropdown();
};

document.addEventListener('click', function(e) {
    var dd = document.getElementById('tourScenesDropdown');
    if (dd && !dd.contains(e.target)) {
        window.closeTourDropdown();
    }
});

<?php if (!$has_360 && $has_tour): ?>
if ('requestIdleCallback' in window) {
    requestIdleCallback(function() { initTourViewer(); }, { timeout: 1000 });
} else {
    window.addEventListener('load', function() {
        setTimeout(initTourViewer, 80);
    });
}
<?php endif; ?>
<?php endif; ?>

// ===== Galería de detalle y navegación unificada =====
const has360        = <?= $has_360 ? 'true' : 'false' ?>;
const hasTour       = <?= $has_tour ? 'true' : 'false' ?>;
const galleryImages = <?= json_encode(array_map(fn($img) => '/' . $img, $current_prop['imagenes'])) ?>;
const photoTotal    = galleryImages.length;

// Armar lista de elementos
const galleryItems = [];
if (has360)  galleryItems.push({ type: '360' });
if (hasTour) galleryItems.push({ type: 'tour' });
galleryImages.forEach(function(img, i) {
    galleryItems.push({ type: 'image', src: img, photoIndex: i });
});
const galleryTotal = galleryItems.length;

const galleryState = {
    currentIndex: 0,
    currentPhoto: 0
};

function galleryGoTo(idx) {
    const wrap       = document.getElementById('galleryMainWrap');
    const mainImg    = document.getElementById('galleryMain');
    const viewer360  = document.getElementById('panoramaViewer360');
    const viewerTour = document.getElementById('tourViewer3D');
    const tourBar    = document.getElementById('tourSceneBar');
    const counter    = document.getElementById('galleryCounter');
    const thumbs     = document.querySelectorAll('#galleryThumbs .gallery-thumb');

    galleryState.currentIndex = (idx + galleryTotal) % galleryTotal;
    const current = galleryState.currentIndex;
    const item    = galleryItems[current];

    thumbs.forEach((t, i) => t.classList.toggle('active', i === current));
    const activeThumb = thumbs[current];
    if (activeThumb && activeThumb.scrollIntoView) {
        activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
    }

    const expandBtn = document.getElementById('galleryExpand');

    if (item.type === '360') {
        // Modo Vista 360° individual
        if (wrap) {
            wrap.classList.add('is-360-mode');
            wrap.classList.remove('is-tour-mode', 'is-photo-mode');
        }
        if (mainImg) mainImg.style.display = 'none';
        if (viewerTour) viewerTour.style.display = 'none';
        if (tourBar) tourBar.style.display = 'none';
        if (expandBtn) expandBtn.style.display = 'none';
        if (typeof window.closeTourDropdown === 'function') window.closeTourDropdown();

        if (viewer360) {
            viewer360.style.display = 'block';
            if (typeof initPanorama360 === 'function' && !pnlmViewerInstance) {
                initPanorama360();
            } else if (pnlmViewerInstance && typeof pnlmViewerInstance.resize === 'function') {
                pnlmViewerInstance.resize();
            }
        }
        if (counter) counter.innerHTML = '<i class="ri-compass-3-line"></i> Vista 360°';

    } else if (item.type === 'tour') {
        // Modo Tour Virtual 3D (estilo Kuula)
        if (wrap) {
            wrap.classList.add('is-tour-mode');
            wrap.classList.remove('is-360-mode', 'is-photo-mode');
        }
        if (mainImg) mainImg.style.display = 'none';
        if (viewer360) viewer360.style.display = 'none';
        if (expandBtn) expandBtn.style.display = 'none';

        if (viewerTour) {
            viewerTour.style.display = 'block';
            if (typeof initTourViewer === 'function' && !tourViewerInstance) {
                initTourViewer();
            }
            if (tourViewerInstance && typeof tourViewerInstance.resize === 'function') {
                setTimeout(function() {
                    tourViewerInstance.resize();
                }, 50);
            }
        }
        if (tourBar) tourBar.style.display = 'flex';

        var activeSceneId = tourViewerInstance ? tourViewerInstance.getScene() : (tourScenesData ? tourScenesData.default.firstScene : '');
        var sceneTitle = (tourScenesData && tourScenesData.scenes[activeSceneId]) ? tourScenesData.scenes[activeSceneId].title : 'Acceso Principal';
        if (counter) counter.innerHTML = '<i class="ri-walk-line"></i> Tour 360: ' + sceneTitle;

    } else if (item.type === 'image') {
        // Modo Fotografía tradicional
        const photoIdx = item.photoIndex;
        galleryState.currentPhoto = photoIdx;
        const targetSrc = galleryImages[photoIdx];

        if (wrap) {
            wrap.classList.add('is-photo-mode');
            wrap.classList.remove('is-360-mode', 'is-tour-mode');
        }
        if (viewer360) viewer360.style.display = 'none';
        if (viewerTour) viewerTour.style.display = 'none';
        if (tourBar) tourBar.style.display = 'none';
        if (expandBtn) expandBtn.style.display = 'flex';
        if (typeof window.closeTourDropdown === 'function') window.closeTourDropdown();

        if (counter) counter.textContent = (photoIdx + 1) + ' / ' + photoTotal;

        if (mainImg) {
            mainImg.style.display = 'block';
            mainImg.classList.add('gallery-fade');
            const preloader = new Image();
            preloader.src = targetSrc;

            setTimeout(() => {
                if (galleryImages[galleryState.currentPhoto] === targetSrc) {
                    mainImg.src = targetSrc;
                    const fadeIn = () => {
                        requestAnimationFrame(() => {
                            setTimeout(() => {
                                mainImg.classList.remove('gallery-fade');
                            }, 20);
                        });
                    };
                    if (preloader.complete) {
                        fadeIn();
                    } else {
                        preloader.onload = fadeIn;
                        preloader.onerror = fadeIn;
                    }
                }
            }, 180);
        }
    }
}

function galleryNav(dir) {
    galleryGoTo(galleryState.currentIndex + dir);
}

// ===== Lightbox =====
function openLightbox(idx) {
    idx = (idx !== undefined && idx !== null) ? idx : galleryState.currentPhoto;
    const overlay = document.getElementById('lightboxOverlay');
    overlay.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    lbGoTo(idx);
}

function closeLightbox() {
    document.getElementById('lightboxOverlay').classList.remove('is-open');
    document.body.style.overflow = '';
}

function lbGoTo(idx) {
    const lbImg    = document.getElementById('lightboxImg');
    const lbCtr    = document.getElementById('lightboxCounter');
    const lbThumbs = document.querySelectorAll('#lightboxThumbs .lightbox-thumb');
    if (!lbImg) return;

    galleryState.currentPhoto = (idx + photoTotal) % photoTotal;
    const targetSrc = galleryImages[galleryState.currentPhoto];

    if (lbCtr) lbCtr.textContent = (galleryState.currentPhoto + 1) + ' / ' + photoTotal;
    lbThumbs.forEach((t, i) => t.classList.toggle('active', i === galleryState.currentPhoto));

    const activeLbThumb = lbThumbs[galleryState.currentPhoto];
    if (activeLbThumb && activeLbThumb.scrollIntoView) {
        activeLbThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
    }

    lbImg.classList.add('lb-fade');
    const preloader = new Image();
    preloader.src = targetSrc;

    setTimeout(() => {
        if (galleryImages[galleryState.currentPhoto] === targetSrc) {
            lbImg.src = targetSrc;
            lbImg.alt = 'Imagen ' + (galleryState.currentPhoto + 1);
            const fadeIn = () => {
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        lbImg.classList.remove('lb-fade');
                    }, 20);
                });
            };
            if (preloader.complete) {
                fadeIn();
            } else {
                preloader.onload = fadeIn;
                preloader.onerror = fadeIn;
            }
        }
    }, 180);
}

// Eventos lightbox
document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
document.getElementById('lbPrev').addEventListener('click', () => lbGoTo(galleryState.currentPhoto - 1));
document.getElementById('lbNext').addEventListener('click', () => lbGoTo(galleryState.currentPhoto + 1));

// Click en overlay para cerrar
document.getElementById('lightboxOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
});

// Teclado
document.addEventListener('keydown', function(e) {
    const overlay = document.getElementById('lightboxOverlay');
    if (!overlay.classList.contains('is-open')) return;
    if (e.key === 'Escape')     closeLightbox();
    if (e.key === 'ArrowLeft')  lbGoTo(galleryState.currentPhoto - 1);
    if (e.key === 'ArrowRight') lbGoTo(galleryState.currentPhoto + 1);
});

// Touch / swipe en lightbox
(function() {
    let startX = 0;
    const overlay = document.getElementById('lightboxOverlay');
    overlay.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
    overlay.addEventListener('touchend', e => {
        const dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 50) lbGoTo(galleryState.currentPhoto + (dx < 0 ? 1 : -1));
    });
})();

// Touch / swipe en galería principal (no interceptar cuando se arrastra la vista 360° o Tour 3D)
(function() {
    let startX = 0;
    const main = document.querySelector('.gallery-main');
    if (!main) return;
    main.addEventListener('touchstart', e => {
        if (e.target.closest('#panoramaViewer360') || 
            e.target.closest('#tourViewer3D') || 
            (galleryItems[galleryState.currentIndex] && (galleryItems[galleryState.currentIndex].type === '360' || galleryItems[galleryState.currentIndex].type === 'tour'))) {
            return;
        }
        startX = e.touches[0].clientX;
    }, { passive: true });
    main.addEventListener('touchend', e => {
        if (e.target.closest('#panoramaViewer360') || 
            e.target.closest('#tourViewer3D') || 
            (galleryItems[galleryState.currentIndex] && (galleryItems[galleryState.currentIndex].type === '360' || galleryItems[galleryState.currentIndex].type === 'tour'))) {
            return;
        }
        const dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 50) galleryNav(dx < 0 ? 1 : -1);
    });
})();

// Reveal cards
document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => {
        if (e.isIntersecting) el.classList.add('is-visible');
    }, { threshold: 0.1 }).observe(el);
});
</script>
</body>
</html>

