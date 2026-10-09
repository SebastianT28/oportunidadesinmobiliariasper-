<?php
/**
 * Detalle de Alojamiento Airbnb · Arequipa
 * Oportunidades Inmobiliarias Perú
 */
require_once __DIR__ . '/../data/alojamientos.php';

$slug = $_GET['slug'] ?? '';
$item = findAlojamiento($slug);

if (!$item) {
    header('Location: /airbnb');
    exit;
}

$related = relatedAlojamientos($slug, 3);

$page        = $item['nombre'] . ' — Airbnb en Arequipa';
$description = $item['descripcion'];
$canonical   = 'https://oportunidadesinmobiliariasperu.com/airbnb/' . $item['slug'];
$og_image    = 'https://oportunidadesinmobiliariasperu.com/' . $item['imagen'];

$base = '../';
include_once __DIR__ . '/../header.php';
?>

<!-- Breadcrumb -->
<div class="detail-breadcrumb bg-accent">
    <div class="l-container">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <a href="/airbnb">Airbnb</a> <i class="ri-arrow-right-s-line"></i>
            <span><?= htmlspecialchars($item['nombre']) ?></span>
        </nav>
    </div>
</div>

<!-- ═══════════════════════════════════════════════
     GALERÍA DE FOTOS DEL ALOJAMIENTO
════════════════════════════════════════════════ -->
<section class="detail-gallery airbnb-detail-gallery">
    <div class="gallery-main">
        <img src="/<?= htmlspecialchars($item['imagenes'][0] ?? $item['imagen']) ?>" 
             alt="<?= htmlspecialchars($item['nombre']) ?>" 
             id="airbnbGalleryMain" loading="eager">
        <span class="gallery-counter" id="galleryCounter">1 / <?= count($item['imagenes']) ?></span>
        <button class="gallery-expand" type="button" onclick="openAirbnbLightbox()">
            <i class="ri-fullscreen-line"></i> Ver todas las fotos
        </button>
    </div>
    <div class="gallery-thumbs">
        <?php foreach ($item['imagenes'] as $i => $img): ?>
        <div class="gallery-thumb <?= $i === 0 ? 'active' : '' ?>" 
             onclick="changeAirbnbImg('<?= htmlspecialchars($img) ?>', this, <?= $i + 1 ?>, <?= count($item['imagenes']) ?>)">
            <img src="/<?= htmlspecialchars($img) ?>" alt="Foto <?= $i + 1 ?> de <?= htmlspecialchars($item['nombre']) ?>" loading="lazy">
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     CABECERA Y META DEL ALOJAMIENTO
════════════════════════════════════════════════ -->
<div class="detail-header l-container">
    <div class="detail-header__left">
        <div class="airbnb-detail-meta-top">
            <span class="badge-tipo-tag"><?= ucfirst(htmlspecialchars($item['tipo'])) ?></span>
            <?php if ($item['favorito']): ?>
            <span class="badge-favorito-pill">⭐ Favorito entre huéspedes</span>
            <?php endif; ?>
        </div>
        <h1 class="detail-nombre"><?= htmlspecialchars($item['nombre']) ?></h1>
        <p class="detail-ubicacion">
            <i class="flaticon-location-pin"></i> <?= htmlspecialchars($item['direccion']) ?> · <?= ucfirst(htmlspecialchars($item['distrito'])) ?>, Arequipa
        </p>
    </div>
    <div class="detail-header__right">
        <div class="airbnb-detail-rating-box">
            <div class="airbnb-detail-rating-score">
                <i class="ri-star-fill"></i> <?= number_format($item['rating'], 1) ?>
            </div>
            <div class="airbnb-detail-rating-reviews">
                <?= $item['reviews'] ?> evaluaciones
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════════
     CONTENIDO PRINCIPAL Y RESERVA STICKY
════════════════════════════════════════════════ -->
<div class="detail-body l-container">
    <main class="detail-main">
        <!-- Especificaciones del alojamiento en una sola línea horizontal -->
        <div class="airbnb-specs-bar">
            <div class="airbnb-spec-item">
                <i class="ri-user-3-line airbnb-spec-icon"></i>
                <div class="airbnb-spec-text">
                    <?= $item['capacidad'] ?> huéspedes
                    <span class="airbnb-spec-tag">Capacidad</span>
                </div>
            </div>
            <span class="airbnb-spec-dot" aria-hidden="true">·</span>
            <div class="airbnb-spec-item">
                <i class="ri-hotel-bed-line airbnb-spec-icon"></i>
                <div class="airbnb-spec-text">
                    <?= $item['dormitorios'] ?> <?= $item['dormitorios'] > 1 ? 'dormitorios' : 'dormitorio' ?>
                </div>
            </div>
            <span class="airbnb-spec-dot" aria-hidden="true">·</span>
            <div class="airbnb-spec-item">
                <i class="flaticon-bathtub airbnb-spec-icon"></i>
                <div class="airbnb-spec-text">
                    <?= $item['banos'] ?> <?= $item['banos'] > 1 ? 'baños' : 'baño' ?>
                </div>
            </div>
            <span class="airbnb-spec-dot" aria-hidden="true">·</span>
            <div class="airbnb-spec-item">
                <i class="ri-shield-user-line airbnb-spec-icon"></i>
                <div class="airbnb-spec-text">
                    Anfitrión: <?= htmlspecialchars($item['anfitrion'] ?? 'Verificado') ?>
                </div>
            </div>
        </div>

        <!-- Descripción -->
        <section class="detail-section">
            <h2 class="detail-section__title">Acerca de este espacio</h2>
            <div class="detail-desc-text">
                <p><?= nl2br(htmlspecialchars($item['descripcion_larga'] ?? $item['descripcion'])) ?></p>
            </div>
        </section>

        <!-- Lo que ofrece este lugar (Amenidades) -->
        <section class="detail-section">
            <h2 class="detail-section__title">Lo que incluye este alojamiento</h2>
            <div class="airbnb-amenities-grid">
                <?php foreach ($item['amenidades'] as $amenidad): ?>
                <div class="airbnb-amenity-item">
                    <i class="ri-checkbox-circle-fill"></i>
                    <span><?= htmlspecialchars($amenidad) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Reglas de la estadía -->
        <section class="detail-section">
            <h2 class="detail-section__title">Reglas y políticas de estadía</h2>
            <div class="airbnb-rules-grid">
                <div class="airbnb-rule-item">
                    <i class="ri-time-line"></i>
                    <div>
                        <strong>Check-in:</strong> A partir de las 14:00 hrs.
                    </div>
                </div>
                <div class="airbnb-rule-item">
                    <i class="ri-logout-box-r-line"></i>
                    <div>
                        <strong>Check-out:</strong> Hasta las 11:00 hrs.
                    </div>
                </div>
                <div class="airbnb-rule-item">
                    <i class="ri-shield-check-line"></i>
                    <div>
                        <strong>Cancelación:</strong> Flexible con 48h de anticipación.
                    </div>
                </div>
                <div class="airbnb-rule-item">
                    <i class="ri-smoke-line"></i>
                    <div>
                        <strong>No fumar</strong> en áreas cerradas de la propiedad.
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Sidebar Sticky de Reserva -->
    <aside class="detail-sidebar">
        <div class="airbnb-booking-card">
            <div class="airbnb-booking-header">
                <div class="booking-price-line">
                    <span class="booking-price-val"><?= $item['moneda'] ?> <?= number_format($item['precio_noche'], 0) ?></span>
                    <span class="booking-price-unit">/ noche</span>
                </div>
                <div class="booking-rating-line">
                    <i class="ri-star-fill"></i> <?= number_format($item['rating'], 1) ?> (<?= $item['reviews'] ?>)
                </div>
            </div>

            <form class="airbnb-booking-form" onsubmit="event.preventDefault(); irAWhatsAppReserva();">
                <div class="booking-inputs-grid">
                    <div class="booking-input-cell">
                        <label for="bookIn">LLEGADA</label>
                        <input type="date" id="bookIn" onchange="calcularResumenReserva()" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="booking-input-cell">
                        <label for="bookOut">SALIDA</label>
                        <input type="date" id="bookOut" onchange="calcularResumenReserva()" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" value="<?= date('Y-m-d', strtotime('+2 days')) ?>">
                    </div>
                </div>

                <div class="booking-input-row">
                    <label for="bookGuests">HUÉSPEDES</label>
                    <select id="bookGuests" onchange="calcularResumenReserva()">
                        <?php for ($g = 1; $g <= $item['capacidad']; $g++): ?>
                        <option value="<?= $g ?>" <?= $g === 2 ? 'selected' : '' ?>><?= $g ?> huésped<?= $g > 1 ? 'es' : '' ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="booking-breakdown" id="bookingBreakdown">
                    <div class="breakdown-row">
                        <span id="breakdownNights">S/ <?= $item['precio_noche'] ?> × 2 noches</span>
                        <span id="breakdownSubtotal">S/ <?= $item['precio_noche'] * 2 ?></span>
                    </div>
                    <div class="breakdown-row">
                        <span>Tarifa de servicio y limpieza</span>
                        <span>S/ 0 (Incluida)</span>
                    </div>
                    <hr class="breakdown-sep">
                    <div class="breakdown-total">
                        <strong>Total estimado</strong>
                        <strong id="breakdownTotal" class="total-amount">S/ <?= $item['precio_noche'] * 2 ?></strong>
                    </div>
                </div>

                <button type="button" class="btn-reservar-wa" onclick="irAWhatsAppReserva()">
                    <i class="flaticon-whatsapp"></i> Reservar vía WhatsApp
                </button>
            </form>

            <div class="booking-badge-trust">
                <i class="ri-shield-star-line"></i> Alojamiento verificado por Oportunidades Inmobiliarias
            </div>
        </div>
    </aside>
</div>

<!-- ═══════════════════════════════════════════════
     ALOJAMIENTOS RECOMENDADOS / RELACIONADOS
════════════════════════════════════════════════ -->
<section class="related-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="section-head-airbnb">
            <div>
                <p class="section-eyebrow"><i class="ri-compass-3-line"></i> Sigue explorando</p>
                <h2 class="main_title main-color">Otros alojamientos recomendados en Arequipa</h2>
            </div>
            <a href="/airbnb" class="view-all-link">Ver todo el catálogo <i class="ri-arrow-right-line"></i></a>
        </div>

        <div class="airbnb-grid">
            <?php foreach ($related as $rel): ?>
            <article class="airbnb-card reveal-card" data-distrito="<?= htmlspecialchars($rel['distrito']) ?>" data-tipo="<?= htmlspecialchars($rel['tipo']) ?>">
                <a href="/airbnb/<?= htmlspecialchars($rel['slug']) ?>" class="airbnb-card__link">
                    <div class="airbnb-card__img-box">
                        <img src="/<?= htmlspecialchars($rel['imagen']) ?>" alt="<?= htmlspecialchars($rel['nombre']) ?>" loading="lazy">
                        <?php if ($rel['favorito']): ?>
                        <span class="badge-favorito-pill">⭐ Destacado</span>
                        <?php endif; ?>
                        <span class="badge-tipo-tag"><?= ucfirst(htmlspecialchars($rel['tipo'])) ?></span>
                    </div>
                    <div class="airbnb-card__body">
                        <div class="airbnb-card__meta">
                            <span class="airbnb-card__distrito">
                                <i class="ri-map-pin-line"></i> <?= ucfirst(htmlspecialchars($rel['distrito'])) ?>, Arequipa
                            </span>
                            <span class="airbnb-card__rating">
                                <i class="ri-star-fill"></i> <?= number_format($rel['rating'], 1) ?> (<?= $rel['reviews'] ?>)
                            </span>
                        </div>
                        <h3 class="airbnb-card__title"><?= htmlspecialchars($rel['nombre']) ?></h3>
                        <p class="airbnb-card__desc"><?= htmlspecialchars($rel['descripcion']) ?></p>

                        <div class="airbnb-card__specs">
                            <span><i class="ri-user-line"></i> <?= $rel['capacidad'] ?> huéspedes</span>
                            <span><i class="ri-hotel-bed-line"></i> <?= $rel['dormitorios'] ?> dorm.</span>
                            <span><i class="flaticon-bathtub"></i> <?= $rel['banos'] ?> baño<?= $rel['banos'] > 1 ? 's' : '' ?></span>
                        </div>

                        <div class="airbnb-card__footer">
                            <div class="airbnb-card__price">
                                <strong><?= $rel['moneda'] ?> <?= number_format($rel['precio_noche'], 0) ?></strong> <small>/ noche</small>
                            </div>
                            <span class="airbnb-card__cta">Ver espacio <i class="ri-arrow-right-line"></i></span>
                        </div>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- Lightbox Modal -->
<div class="airbnb-lightbox" id="airbnbLightbox" onclick="closeAirbnbLightbox(event)">
    <div class="airbnb-lightbox__content">
        <button type="button" class="airbnb-lightbox__close" onclick="closeAirbnbLightbox()">&times;</button>
        <img id="lightboxImg" src="/<?= htmlspecialchars($item['imagen']) ?>" alt="Foto ampliada">
    </div>
</div>

<?php include_once __DIR__ . '/../footer.php'; ?>

<script>
const PRECIO_NOCHE = <?= (int)$item['precio_noche'] ?>;
const NOMBRE_ALOJAMIENTO = <?= json_encode($item['nombre']) ?>;
const DISTRITO_ALOJAMIENTO = <?= json_encode(ucfirst($item['distrito'])) ?>;

function changeAirbnbImg(src, thumbEl, idx, total) {
    const mainImg = document.getElementById('airbnbGalleryMain');
    const counter = document.getElementById('galleryCounter');
    if (mainImg) mainImg.src = '/' + src.replace(/^\/+/, '');
    if (counter) counter.textContent = idx + ' / ' + total;
    document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
    if (thumbEl) thumbEl.classList.add('active');
}

function openAirbnbLightbox() {
    const mainSrc = document.getElementById('airbnbGalleryMain').src;
    document.getElementById('lightboxImg').src = mainSrc;
    document.getElementById('airbnbLightbox').classList.add('open');
}

function closeAirbnbLightbox(e) {
    if (!e || e.target.id === 'airbnbLightbox' || e.target.classList.contains('airbnb-lightbox__close')) {
        document.getElementById('airbnbLightbox').classList.remove('open');
    }
}

function calcularResumenReserva() {
    const inVal = document.getElementById('bookIn').value;
    const outVal = document.getElementById('bookOut').value;
    if (!inVal || !outVal) return;

    const dIn = new Date(inVal);
    const dOut = new Date(outVal);
    const diffTime = dOut - dIn;
    let nights = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    if (nights < 1) nights = 1;

    const total = nights * PRECIO_NOCHE;
    document.getElementById('breakdownNights').textContent = 'S/ ' + PRECIO_NOCHE + ' × ' + nights + ' noche' + (nights > 1 ? 's' : '');
    document.getElementById('breakdownSubtotal').textContent = 'S/ ' + total.toLocaleString('es-PE');
    document.getElementById('breakdownTotal').textContent = 'S/ ' + total.toLocaleString('es-PE');
}

function irAWhatsAppReserva() {
    const inVal = document.getElementById('bookIn').value;
    const outVal = document.getElementById('bookOut').value;
    const guests = document.getElementById('bookGuests').value;
    const totalTxt = document.getElementById('breakdownTotal').textContent;

    const msg = `Hola Oportunidades Inmobiliarias, deseo reservar el alojamiento *${NOMBRE_ALOJAMIENTO}* en Arequipa (${DISTRITO_ALOJAMIENTO}).%0A%0A📅 Entrada: ${inVal}%0A📅 Salida: ${outVal}%0A👥 Huéspedes: ${guests}%0A💰 Total estimado: ${totalTxt}%0A%0A¿Tienen disponibilidad para esas fechas?`;
    window.open(`https://api.whatsapp.com/send?phone=51999653412&text=${msg}`, '_blank');
}

document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => { 
        if (e.isIntersecting) el.classList.add('is-visible'); 
    }, { threshold: 0.1 }).observe(el);
});
</script>
</body>
</html>
