<?php
require_once '../data/propiedades.php';

$slug = $_GET['slug'] ?? '';
$prop = findProperty($slug);
$current_prop = $prop;

if (!$prop || $prop['categoria'] !== 'departamentos') {
    header('Location: /departamentos');
    exit;
}

$related = relatedProperties('departamentos', $slug);

$page        = $prop['nombre'] . ' — Departamento en ' . $prop['ubicacion'];
$description = $prop['descripcion'];
$canonical   = 'https://oportunidadesinmobiliariasperu.com/departamentos/' . $prop['slug'];
$og_image    = 'https://oportunidadesinmobiliariasperu.com/' . $prop['imagen_og'];
$base = '../';
include_once '../header.php';
?>

<div class="detail-breadcrumb bg-accent">
    <div class="l-container">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <a href="/departamentos">Departamentos</a> <i class="ri-arrow-right-s-line"></i>
            <span><?= htmlspecialchars($prop['nombre']) ?></span>
        </nav>
    </div>
</div>

<section class="detail-gallery">
    <div class="gallery-main" onclick="openLightbox(galleryState.current)">
        <img src="/<?= $prop['imagenes'][0] ?>" alt="<?= htmlspecialchars($prop['nombre']) ?>" id="galleryMain" loading="eager">
        <span class="gallery-counter" id="galleryCounter">1 / <?= count($prop['imagenes']) ?></span>
        <button class="gallery-expand" onclick="event.stopPropagation(); openLightbox(galleryState.current)">
            <i class="ri-fullscreen-line"></i> Ver galería completa
        </button>
        <button class="gallery-arrow gallery-arrow--prev" onclick="event.stopPropagation(); galleryNav(-1)" aria-label="Anterior">
            <i class="ri-arrow-left-s-line"></i>
        </button>
        <button class="gallery-arrow gallery-arrow--next" onclick="event.stopPropagation(); galleryNav(1)" aria-label="Siguiente">
            <i class="ri-arrow-right-s-line"></i>
        </button>
    </div>
    <div class="gallery-thumbs" id="galleryThumbs">
        <?php foreach ($prop['imagenes'] as $i => $img): ?>
        <div class="gallery-thumb <?= $i === 0 ? 'active' : '' ?>"
             data-src="/<?= htmlspecialchars($img) ?>"
             onclick="galleryGoTo(<?= $i ?>)">
            <img src="/<?= $img ?>" alt="Foto <?= $i+1 ?>" loading="lazy">
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
    <div class="detail-header__right">
        <span class="badge-estado badge--<?= $prop['estado'] ?>">
            <?php
            echo match($prop['estado']) {
                'en-construccion' => '🔧 En construcción',
                'entregado'       => '✅ Entregado',
                default           => 'En venta',
            };
            ?>
        </span>
        <?php if (!empty($prop['entrega'])): ?>
        <p class="entrega-label"><i class="ri-calendar-check-line"></i> Entrega: <strong><?= htmlspecialchars($prop['entrega']) ?></strong></p>
        <?php endif; ?>
    </div>
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
                <span>Área</span>
            </div>
            <div class="stat-box">
                <i class="flaticon-save-money"></i>
                <strong>S/ <?= number_format($prop['precio'], 0, '.', ',') ?></strong>
                <span>Precio desde</span>
            </div>
        </div>

        <div class="detail-section">
            <h2>Descripción del proyecto</h2>
            <p><?= nl2br(htmlspecialchars($prop['descripcion_larga'])) ?></p>
        </div>

        <div class="detail-section">
            <h2>Amenidades y características</h2>
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
                <img src="/img/team_ana.webp" alt="Ana Quispe - Asesora OIP" class="advisor-img">
                <div>
                    <strong>Tu asesora</strong>
                    <p>Ana Quispe &mdash; OIP</p>
                    <a href="tel:+51999653412">999 653 412</a>
                </div>
            </div>
            <?php if (!empty($prop['cuota'])): ?>
            <div class="cuota-highlight">
                <p>Cuota desde</p>
                <strong>S/ <?= number_format($prop['cuota'], 0) ?>/mes</strong>
                <?php if (!empty($prop['separacion'])): ?>
                <small>Separación: S/ <?= number_format($prop['separacion'], 0) ?></small>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php
            $form_titulo   = 'Reservar / Solicitar info';
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
<script>
const galleryImages = <?= json_encode(array_map(fn($img) => '/' . $img, $current_prop['imagenes'])) ?>;
const galleryTotal  = galleryImages.length;
const galleryState  = { current: 0 };

function galleryGoTo(idx) {
    const mainImg = document.getElementById('galleryMain');
    const counter = document.getElementById('galleryCounter');
    const thumbs  = document.querySelectorAll('#galleryThumbs .gallery-thumb');
    if (!mainImg) return;

    galleryState.current = (idx + galleryTotal) % galleryTotal;
    const targetSrc = galleryImages[galleryState.current];

    if (counter) counter.textContent = (galleryState.current + 1) + ' / ' + galleryTotal;
    thumbs.forEach((t, i) => t.classList.toggle('active', i === galleryState.current));

    const activeThumb = thumbs[galleryState.current];
    if (activeThumb && activeThumb.scrollIntoView) {
        activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
    }

    mainImg.classList.add('gallery-fade');
    const preloader = new Image();
    preloader.src = targetSrc;

    setTimeout(() => {
        if (galleryImages[galleryState.current] === targetSrc) {
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

function galleryNav(dir) { galleryGoTo(galleryState.current + dir); }

function openLightbox(idx) {
    idx = (idx !== undefined && idx !== null) ? idx : galleryState.current;
    document.getElementById('lightboxOverlay').classList.add('is-open');
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

    galleryState.current = (idx + galleryTotal) % galleryTotal;
    const targetSrc = galleryImages[galleryState.current];

    if (lbCtr) lbCtr.textContent = (galleryState.current + 1) + ' / ' + galleryTotal;
    lbThumbs.forEach((t, i) => t.classList.toggle('active', i === galleryState.current));

    const activeLbThumb = lbThumbs[galleryState.current];
    if (activeLbThumb && activeLbThumb.scrollIntoView) {
        activeLbThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
    }

    const mainImg  = document.getElementById('galleryMain');
    const gCounter = document.getElementById('galleryCounter');
    const gThumbs  = document.querySelectorAll('#galleryThumbs .gallery-thumb');
    if (gCounter) gCounter.textContent = (galleryState.current + 1) + ' / ' + galleryTotal;
    gThumbs.forEach((t, i) => t.classList.toggle('active', i === galleryState.current));
    if (mainImg) mainImg.src = targetSrc;

    lbImg.classList.add('lb-fade');
    const preloader = new Image();
    preloader.src = targetSrc;

    setTimeout(() => {
        if (galleryImages[galleryState.current] === targetSrc) {
            lbImg.src = targetSrc;
            lbImg.alt = 'Imagen ' + (galleryState.current + 1);
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

document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
document.getElementById('lbPrev').addEventListener('click', () => lbGoTo(galleryState.current - 1));
document.getElementById('lbNext').addEventListener('click', () => lbGoTo(galleryState.current + 1));
document.getElementById('lightboxOverlay').addEventListener('click', function(e) { if (e.target === this) closeLightbox(); });

document.addEventListener('keydown', function(e) {
    const overlay = document.getElementById('lightboxOverlay');
    if (!overlay.classList.contains('is-open')) return;
    if (e.key === 'Escape')     closeLightbox();
    if (e.key === 'ArrowLeft')  lbGoTo(galleryState.current - 1);
    if (e.key === 'ArrowRight') lbGoTo(galleryState.current + 1);
});

(function() {
    let startX = 0;
    const overlay = document.getElementById('lightboxOverlay');
    overlay.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
    overlay.addEventListener('touchend', e => { const dx = e.changedTouches[0].clientX - startX; if (Math.abs(dx) > 50) lbGoTo(galleryState.current + (dx < 0 ? 1 : -1)); });
    const main = document.querySelector('.gallery-main');
    main.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
    main.addEventListener('touchend', e => { const dx = e.changedTouches[0].clientX - startX; if (Math.abs(dx) > 50) galleryNav(dx < 0 ? 1 : -1); });
})();

document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => {
        if (e.isIntersecting) el.classList.add('is-visible');
    }, { threshold: 0.1 }).observe(el);
});
</script>
</body>
</html>
