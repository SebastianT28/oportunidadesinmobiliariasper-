<?php
/**
 * Airbnb en Arequipa — Catálogo y buscador de alojamientos temporales
 * Oportunidades Inmobiliarias Perú
 */
require_once __DIR__ . '/data/alojamientos.php';

$page = 'Airbnb en Arequipa - Alojamientos temporales, casas y departamentos amoblados';
$description = 'Encuentra alojamientos en Arequipa estilo Airbnb. Departamentos con vista al Misti, suites en el centro y casas amobladas en Yanahuara, Cayma y Miraflores. Reserva por días o meses.';
$canonical = 'https://oportunidadesinmobiliariasperu.com/airbnb';
$og_image = 'https://oportunidadesinmobiliariasperu.com/img/airbnb/hero-arequipa.webp';

include_once __DIR__ . '/header.php';

$favoritos = getFavoritos(4);
$todos = $alojamientos;

// Parámetros GET opcionales para prefiltrado
$filterDistrito = $_GET['distrito'] ?? '';
$filterTipo     = $_GET['tipo'] ?? '';
?>

<!-- ═══════════════════════════════════════════════
     SECCIÓN 1 — HERO SEARCH (BUSCADOR PRINCIPAL)
════════════════════════════════════════════════ -->
<section class="airbnb-hero">
    <div class="airbnb-hero__bg"></div>
    <div class="l-container airbnb-hero__inner">
        <!-- Columna Izquierda: Formulario de Búsqueda -->
        <div class="airbnb-search-card reveal-card">
            <span class="airbnb-search-badge">
                <i class="ri-hotel-bed-line"></i> Estadías cortas y flexibles
            </span>
            <h1 class="airbnb-search-title">Encuentra tu alojamiento ideal en Arequipa</h1>
            <p class="airbnb-search-sub">Departamentos con vista al Misti, casas coloniales y suites boutique verificadas.</p>

            <form id="airbnbSearchForm" class="airbnb-search-form" onsubmit="event.preventDefault(); filtrarAlojamientos();">
                <div class="airbnb-form-group">
                    <label for="searchDistrito"><i class="ri-map-pin-2-line"></i> ¿Dónde te hospedas?</label>
                    <select id="searchDistrito" name="distrito" class="airbnb-select">
                        <option value="">Todos los distritos de Arequipa</option>
                        <option value="yanahuara" <?= $filterDistrito === 'yanahuara' ? 'selected' : '' ?>>Yanahuara (Mirador y colonial)</option>
                        <option value="miraflores" <?= $filterDistrito === 'miraflores' ? 'selected' : '' ?>>Miraflores (Cerca al centro)</option>
                        <option value="cayma" <?= $filterDistrito === 'cayma' ? 'selected' : '' ?>>Cayma (Tranquilidad y vistas)</option>
                        <option value="cercado" <?= $filterDistrito === 'cercado' ? 'selected' : '' ?>>Cercado (Centro Histórico)</option>
                        <option value="sachaca" <?= $filterDistrito === 'sachaca' ? 'selected' : '' ?>>Sachaca (Campiña arequipeña)</option>
                        <option value="mariano-melgar" <?= $filterDistrito === 'mariano-melgar' ? 'selected' : '' ?>>Mariano Melgar</option>
                        <option value="cerro-colorado" <?= $filterDistrito === 'cerro-colorado' ? 'selected' : '' ?>>Cerro Colorado</option>
                        <option value="la-joya" <?= $filterDistrito === 'la-joya' ? 'selected' : '' ?>>La Joya (Clima de sol)</option>
                    </select>
                </div>

                <div class="airbnb-form-dates">
                    <div class="airbnb-form-group">
                        <label for="checkIn"><i class="ri-calendar-event-line"></i> Llegada</label>
                        <input type="date" id="checkIn" name="checkIn" class="airbnb-input-date" min="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="airbnb-form-group">
                        <label for="checkOut"><i class="ri-calendar-check-line"></i> Salida</label>
                        <input type="date" id="checkOut" name="checkOut" class="airbnb-input-date" min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                    </div>
                </div>

                <div class="airbnb-form-group">
                    <label><i class="ri-user-line"></i> Huéspedes</label>
                    <div class="guest-counter-widget">
                        <span id="guestCountLabel" class="guest-counter-text">2 personas</span>
                        <div class="guest-counter-controls">
                            <button type="button" class="btn-guest-counter" onclick="cambiarHuespedes(-1)" aria-label="Menos huéspedes">
                                <i class="ri-subtract-line"></i>
                            </button>
                            <input type="hidden" id="huespedesCount" name="huespedes" value="2">
                            <button type="button" class="btn-guest-counter" onclick="cambiarHuespedes(1)" aria-label="Más huéspedes">
                                <i class="ri-add-line"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="button" class="airbnb-btn-search" onclick="filtrarAlojamientos()">
                    <i class="ri-search-line"></i> Buscar alojamiento en Arequipa
                </button>
            </form>
        </div>

        <!-- Columna Derecha: Destacado visual Arequipa -->
        <div class="airbnb-hero__media reveal-card">
            <div class="airbnb-hero__image-wrap">
                <img src="/img/airbnb/hero-arequipa.webp" alt="Alojamiento en Arequipa con terraza y vista al Misti" class="airbnb-hero__img">
                <div class="airbnb-hero__floating-pill">
                    <i class="ri-map-pin-fill"></i> Arequipa, Perú · Ciudad Blanca
                </div>
                <div class="airbnb-hero__feature-badge">
                    <span class="badge-number">4.9 ★</span>
                    <span class="badge-text">Promedio valoraciones</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECCIÓN 2 — STATS DE BENEFICIOS (3 PILARES)
════════════════════════════════════════════════ -->
<section class="airbnb-benefits-section">
    <div class="l-container">
        <div class="airbnb-benefits-grid">
            <div class="airbnb-benefit-card reveal-card">
                <div class="airbnb-benefit-card__icon">
                    <i class="ri-calendar-check-line"></i>
                </div>
                <div class="airbnb-benefit-card__content">
                    <h3 class="airbnb-benefit-title">Flexibilidad total</h3>
                    <p class="airbnb-benefit-desc">Reserva por días, semanas o meses con tarifas transparentes y sin ataduras notariales.</p>
                </div>
            </div>

            <div class="airbnb-benefit-card reveal-card">
                <div class="airbnb-benefit-card__icon">
                    <i class="ri-shield-check-line"></i>
                </div>
                <div class="airbnb-benefit-card__content">
                    <h3 class="airbnb-benefit-title">Espacios verificados</h3>
                    <p class="airbnb-benefit-desc">Cada propiedad es inspeccionada en Arequipa: agua caliente, conexión Wi-Fi real y fotos 100% fidedignas.</p>
                </div>
            </div>

            <div class="airbnb-benefit-card reveal-card">
                <div class="airbnb-benefit-card__icon">
                    <i class="ri-map-pin-user-line"></i>
                </div>
                <div class="airbnb-benefit-card__content">
                    <h3 class="airbnb-benefit-title">Experiencia local</h3>
                    <p class="airbnb-benefit-desc">Anfitriones y asesores arequipeños listos para guiarte en gastronomía, movilidad y turismo.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECCIÓN 3 — FAVORITOS POR DISTRITO
════════════════════════════════════════════════ -->
<section class="airbnb-section bg-accent" id="favoritosSection">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="section-head-airbnb">
            <div>
                <p class="section-eyebrow"><i class="ri-heart-3-line"></i> Los más reservados</p>
                <h2 class="main_title main-color">Favoritos por distrito en Arequipa</h2>
            </div>
            <p class="section-subtext">Propiedades con las más altas calificaciones de huéspedes en las zonas más cotizadas.</p>
        </div>

        <!-- Filtros Pill por Distrito -->
        <div class="district-pills-bar" role="tablist">
            <button type="button" class="district-pill active" onclick="filtrarFavoritosDistrito('todos', this)">
                <i class="ri-apps-line"></i> Todos los distritos
            </button>
            <button type="button" class="district-pill" onclick="filtrarFavoritosDistrito('yanahuara', this)">
                Yanahuara
            </button>
            <button type="button" class="district-pill" onclick="filtrarFavoritosDistrito('miraflores', this)">
                Miraflores
            </button>
            <button type="button" class="district-pill" onclick="filtrarFavoritosDistrito('cayma', this)">
                Cayma
            </button>
            <button type="button" class="district-pill" onclick="filtrarFavoritosDistrito('cercado', this)">
                Cercado
            </button>
            <button type="button" class="district-pill" onclick="filtrarFavoritosDistrito('sachaca', this)">
                Sachaca
            </button>
            <button type="button" class="district-pill" onclick="filtrarFavoritosDistrito('mariano-melgar', this)">
                Mariano Melgar
            </button>
        </div>

        <!-- Grid de Favoritos -->
        <div class="airbnb-grid" id="favoritosGrid">
            <?php foreach ($favoritos as $fav): ?>
            <article class="airbnb-card reveal-card" data-distrito="<?= htmlspecialchars($fav['distrito']) ?>" data-tipo="<?= htmlspecialchars($fav['tipo']) ?>">
                <a href="/airbnb/<?= htmlspecialchars($fav['slug']) ?>" class="airbnb-card__link">
                    <div class="airbnb-card__img-box">
                        <img src="/<?= htmlspecialchars($fav['imagen']) ?>" alt="<?= htmlspecialchars($fav['nombre']) ?>" loading="lazy">
                        <span class="badge-favorito-pill">⭐ Favorito de huéspedes</span>
                        <span class="badge-tipo-tag"><?= ucfirst(htmlspecialchars($fav['tipo'])) ?></span>
                    </div>
                    <div class="airbnb-card__body">
                        <div class="airbnb-card__meta">
                            <span class="airbnb-card__distrito">
                                <i class="ri-map-pin-line"></i> <?= ucfirst(htmlspecialchars($fav['distrito'])) ?>, Arequipa
                            </span>
                            <span class="airbnb-card__rating">
                                <i class="ri-star-fill"></i> <?= number_format($fav['rating'], 1) ?> (<?= $fav['reviews'] ?>)
                            </span>
                        </div>
                        <h3 class="airbnb-card__title"><?= htmlspecialchars($fav['nombre']) ?></h3>
                        <p class="airbnb-card__desc"><?= htmlspecialchars($fav['descripcion']) ?></p>

                        <div class="airbnb-card__specs">
                            <span><i class="ri-user-line"></i> <?= $fav['capacidad'] ?> huéspedes</span>
                            <span><i class="ri-hotel-bed-line"></i> <?= $fav['dormitorios'] ?> dorm.</span>
                            <span><i class="flaticon-bathtub"></i> <?= $fav['banos'] ?> baño<?= $fav['banos'] > 1 ? 's' : '' ?></span>
                        </div>

                        <div class="airbnb-card__footer">
                            <div class="airbnb-card__price">
                                <strong><?= $fav['moneda'] ?> <?= number_format($fav['precio_noche'], 0) ?></strong> <small>/ noche</small>
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

<!-- ═══════════════════════════════════════════════
     SECCIÓN 4 — TODOS LOS ALOJAMIENTOS EN AREQUIPA
════════════════════════════════════════════════ -->
<section class="airbnb-section" id="todosAlojamientos">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="section-head-airbnb">
            <div>
                <p class="section-eyebrow"><i class="ri-hotel-line"></i> Catálogo completo</p>
                <h2 class="main_title main-color">Todos los alojamientos en Arequipa</h2>
            </div>
            <p class="section-subtext">Departamentos, casas familiares, habitaciones privadas y suites disponibles.</p>
        </div>

        <!-- Filtros por Tipo de Espacio -->
        <div class="type-filter-bar">
            <button type="button" class="type-filter-btn active" onclick="filtrarTipo('todos', this)">
                <i class="ri-dashboard-line"></i> Todos los tipos
            </button>
            <button type="button" class="type-filter-btn" onclick="filtrarTipo('departamento', this)">
                <i class="ri-building-line"></i> Departamentos
            </button>
            <button type="button" class="type-filter-btn" onclick="filtrarTipo('casa', this)">
                <i class="flaticon-house"></i> Casas
            </button>
            <button type="button" class="type-filter-btn" onclick="filtrarTipo('suite', this)">
                <i class="ri-vip-diamond-line"></i> Suites boutique
            </button>
            <button type="button" class="type-filter-btn" onclick="filtrarTipo('habitacion', this)">
                <i class="ri-hotel-bed-line"></i> Habitaciones privadas
            </button>
        </div>

        <!-- Resultados de Alojamientos -->
        <div class="airbnb-grid" id="todosGrid">
            <?php foreach ($todos as $item): ?>
            <article class="airbnb-card reveal-card" data-tipo="<?= htmlspecialchars($item['tipo']) ?>" data-distrito="<?= htmlspecialchars($item['distrito']) ?>" data-huespedes="<?= $item['capacidad'] ?>">
                <a href="/airbnb/<?= htmlspecialchars($item['slug']) ?>" class="airbnb-card__link">
                    <div class="airbnb-card__img-box">
                        <img src="/<?= htmlspecialchars($item['imagen']) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>" loading="lazy">
                        <?php if ($item['favorito']): ?>
                        <span class="badge-favorito-pill">⭐ Destacado</span>
                        <?php endif; ?>
                        <span class="badge-tipo-tag"><?= ucfirst(htmlspecialchars($item['tipo'])) ?></span>
                    </div>
                    <div class="airbnb-card__body">
                        <div class="airbnb-card__meta">
                            <span class="airbnb-card__distrito">
                                <i class="ri-map-pin-line"></i> <?= ucfirst(htmlspecialchars($item['distrito'])) ?>, Arequipa
                            </span>
                            <span class="airbnb-card__rating">
                                <i class="ri-star-fill"></i> <?= number_format($item['rating'], 1) ?> (<?= $item['reviews'] ?>)
                            </span>
                        </div>
                        <h3 class="airbnb-card__title"><?= htmlspecialchars($item['nombre']) ?></h3>
                        <p class="airbnb-card__desc"><?= htmlspecialchars($item['descripcion']) ?></p>

                        <div class="airbnb-card__specs">
                            <span><i class="ri-user-line"></i> Hasta <?= $item['capacidad'] ?> huéspedes</span>
                            <span><i class="ri-hotel-bed-line"></i> <?= $item['dormitorios'] ?> dorm.</span>
                            <span><i class="flaticon-bathtub"></i> <?= $item['banos'] ?> baño<?= $item['banos'] > 1 ? 's' : '' ?></span>
                        </div>

                        <div class="airbnb-card__footer">
                            <div class="airbnb-card__price">
                                <strong><?= $item['moneda'] ?> <?= number_format($item['precio_noche'], 0) ?></strong> <small>/ noche</small>
                            </div>
                            <span class="airbnb-card__cta">Reservar <i class="ri-arrow-right-line"></i></span>
                        </div>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>

        <div id="noResultsMsg" class="airbnb-no-results" style="display: none;">
            <i class="ri-search-2-line"></i>
            <h3>No encontramos alojamientos con ese criterio</h3>
            <p>Prueba seleccionando otro distrito o tipo de propiedad.</p>
            <button type="button" class="button primary" onclick="resetFiltros()">Ver todos los alojamientos</button>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- ═══════════════════════════════════════════════
     SECCIÓN 5 — FAQ PREGUNTAS FRECUENTES
════════════════════════════════════════════════ -->
<section class="airbnb-faq-section bg-accent">
    <div class="pd2"></div>
    <div class="l-container">
        <div class="airbnb-faq-layout">
            <div class="airbnb-faq-sidebar reveal-card">
                <p class="section-eyebrow"><i class="ri-questionnaire-line"></i> Dudas frecuentes</p>
                <h2 class="main_title main-color">Todo lo que necesitas saber antes de reservar</h2>
                <p class="airbnb-faq-sidebar__desc">Queremos que tu experiencia en Arequipa sea fluida, segura y memorable. Encuentra aquí las respuestas a las consultas más habituales de nuestros huéspedes.</p>
            </div>

            <div class="airbnb-faq-accordion reveal-card">
                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Cómo puedo reservar un alojamiento en Arequipa?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>Puedes seleccionar las fechas y el número de huéspedes directamente en cada alojamiento, y confirmar la reserva de forma inmediata a través de nuestro canal verificado de WhatsApp o atención telefónica con un asesor asignado.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Cuál es la diferencia entre una habitación privada y un departamento completo?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>Un departamento completo ofrece uso exclusivo de sala, cocina, baños y acceso independiente para ti y tus acompañantes. Una habitación privada te brinda tu dormitorio propio con baño privado dentro de una propiedad con áreas compartidas.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Los precios por noche incluyen todos los servicios e impuestos?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>Sí, la tarifa mostrada incluye servicios de agua caliente, Wi-Fi de alta velocidad, electricidad, limpieza inicial y gastos comunes de la propiedad. No hay comisiones sorpresa al momento de reservar.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Puedo cancelar o reprogramar mi reserva sin costo?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>Ofrecemos cancelación flexible: si cancelas con al menos 48 horas de anticipación a la fecha de ingreso, recibes reembolso total o crédito para reprogramar tus fechas sin penalidad.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Cómo me pongo en contacto con el anfitrión antes de llegar?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>Una vez confirmada la reserva, recibirás los datos directos del anfitrión y de nuestro soporte en Arequipa vía WhatsApp para coordinar la hora de check-in, entrega de llaves o accesos inteligentes.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Qué documentos necesito para confirmar la estadía?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>Solo requerimos documento de identidad válido (DNI para peruanos o Pasaporte / Carné de Extranjería para visitantes internacionales) del huésped titular que realiza el registro.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-trigger" onclick="toggleFaq(this)">
                        <span>¿Hay tarifas especiales para estancias largas (más de 30 días)?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-panel">
                        <p>¡Por supuesto! Para estadías mayores a 15 o 30 días ofrecemos descuentos preferenciales de hasta 25% y facilidades de pago corporativo o nómada digital.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pd2"></div>
</section>

<!-- ═══════════════════════════════════════════════
     BANNER CTA FINAL WHATSAPP
════════════════════════════════════════════════ -->
<section class="cta-catalog">
    <div class="l-container cta-catalog__inner">
        <div>
            <h3>¿Tienes un inmueble en Arequipa y quieres rentarlo en Airbnb?</h3>
            <p>Gestionamos tu propiedad, optimizamos tus ingresos y cuidamos cada detalle para tus huéspedes.</p>
        </div>
        <a href="https://api.whatsapp.com/send?phone=51999653412&text=Hola,%20quiero%20publicar%20mi%20propiedad%20en%20Airbnb%20con%20ustedes%20en%20Arequipa" target="_blank" rel="noopener" class="btn-wa-cta">
            <i class="flaticon-whatsapp"></i> Publicar mi espacio
        </a>
    </div>
</section>

<?php include_once __DIR__ . '/footer.php'; ?>

<!-- ═══════════════════════════════════════════════
     SCRIPTS ESPECÍFICOS DE AIRBNB
════════════════════════════════════════════════ -->
<script>
// Contador de huéspedes
function cambiarHuespedes(delta) {
    const input = document.getElementById('huespedesCount');
    const label = document.getElementById('guestCountLabel');
    let val = parseInt(input.value, 10) || 1;
    val = Math.max(1, Math.min(10, val + delta));
    input.value = val;
    label.textContent = val === 1 ? '1 persona' : val + ' personas';
}

// Filtro de Favoritos por Distrito
function filtrarFavoritosDistrito(distrito, btnEl) {
    document.querySelectorAll('.district-pill').forEach(b => b.classList.remove('active'));
    if (btnEl) btnEl.classList.add('active');

    const cards = document.querySelectorAll('#favoritosGrid .airbnb-card');
    cards.forEach(card => {
        const cardDist = card.getAttribute('data-distrito');
        if (distrito === 'todos' || cardDist === distrito) {
            card.style.display = '';
            card.classList.add('is-visible');
        } else {
            card.style.display = 'none';
        }
    });
}

// Filtro de Todos por Tipo
function filtrarTipo(tipo, btnEl) {
    document.querySelectorAll('.type-filter-btn').forEach(b => b.classList.remove('active'));
    if (btnEl) btnEl.classList.add('active');

    const cards = document.querySelectorAll('#todosGrid .airbnb-card');
    let visibles = 0;
    cards.forEach(card => {
        const cardTipo = card.getAttribute('data-tipo');
        if (tipo === 'todos' || cardTipo === tipo) {
            card.style.display = '';
            card.classList.add('is-visible');
            visibles++;
        } else {
            card.style.display = 'none';
        }
    });

    const noRes = document.getElementById('noResultsMsg');
    if (noRes) noRes.style.display = visibles === 0 ? 'block' : 'none';
}

// Buscador general (hero form)
function filtrarAlojamientos() {
    const distrito = document.getElementById('searchDistrito').value;
    const huespedes = parseInt(document.getElementById('huespedesCount').value, 10) || 1;

    const cards = document.querySelectorAll('#todosGrid .airbnb-card');
    let count = 0;

    cards.forEach(card => {
        const cDist = card.getAttribute('data-distrito');
        const cCap = parseInt(card.getAttribute('data-huespedes'), 10) || 1;

        const matchDist = !distrito || cDist === distrito;
        const matchCap = cCap >= huespedes;

        if (matchDist && matchCap) {
            card.style.display = '';
            card.classList.add('is-visible');
            count++;
        } else {
            card.style.display = 'none';
        }
    });

    const noRes = document.getElementById('noResultsMsg');
    if (noRes) noRes.style.display = count === 0 ? 'block' : 'none';

    // Desplazar suavemente a los resultados
    const sec = document.getElementById('todosAlojamientos');
    if (sec) sec.scrollIntoView({ behavior: 'smooth' });
}

function resetFiltros() {
    document.getElementById('searchDistrito').value = '';
    document.querySelectorAll('.type-filter-btn').forEach(b => b.classList.remove('active'));
    const primerTipo = document.querySelector('.type-filter-btn');
    if (primerTipo) primerTipo.classList.add('active');

    const cards = document.querySelectorAll('#todosGrid .airbnb-card');
    cards.forEach(c => {
        c.style.display = '';
        c.classList.add('is-visible');
    });
    const noRes = document.getElementById('noResultsMsg');
    if (noRes) noRes.style.display = 'none';
}

// Acordeón FAQ
function toggleFaq(btn) {
    const item = btn.parentElement;
    const isOpen = item.classList.contains('active');
    
    // Cerrar los otros si se desea acordeón exclusivo
    document.querySelectorAll('.faq-item').forEach(el => {
        if (el !== item) el.classList.remove('active');
    });

    if (isOpen) {
        item.classList.remove('active');
    } else {
        item.classList.add('active');
    }
}

// Animación reveal-card
document.querySelectorAll('.reveal-card').forEach(el => {
    new IntersectionObserver(([e]) => { 
        if (e.isIntersecting) el.classList.add('is-visible'); 
    }, { threshold: 0.1 }).observe(el);
});
</script>
</body>
</html>
