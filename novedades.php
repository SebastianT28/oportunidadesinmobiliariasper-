<?php
require_once __DIR__ . '/data/articulos.php';

$page        = 'Novedades y Guías Inmobiliarias | Oportunidades Inmobiliarias Perú';
$description = 'Artículos, guías de compra y consejos sobre el sector inmobiliario en Arequipa. Aprende a elegir terrenos, casas y departamentos con seguridad.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/novedades';

$featured = null;
foreach ($articulos as $art) {
    if (!empty($art['destacado'])) {
        $featured = $art;
        break;
    }
}
if (!$featured && !empty($articulos)) {
    $featured = $articulos[0];
}

include_once 'header.php';
?>

<!-- Hero Banner -->
<div class="catalog-hero" style="background-image: url('/img/sections/bg_about_alt.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Novedades</span>
        </nav>
        <h1 class="catalog-hero__title">Novedades & Guías Inmobiliarias</h1>
        <p class="catalog-hero__sub">Consejos prácticos, análisis de mercado y tendencias para tu inversión segura en Arequipa.</p>
    </div>
</div>

<!-- Filtros de categoría por pills -->
<section class="novedades-filter-section">
    <div class="l-container">
        <div class="article-filter-pills" id="articleFilters">
            <button class="filter-pill active" data-category="todos">
                <i class="ri-apps-2-line"></i> Todos los artículos
            </button>
            <button class="filter-pill" data-category="calidad-de-vida">
                <i class="ri-heart-pulse-line"></i> Calidad de vida
            </button>
            <button class="filter-pill" data-category="inversion">
                <i class="ri-line-chart-line"></i> Inversión
            </button>
            <button class="filter-pill" data-category="guia-de-compra">
                <i class="ri-compass-3-line"></i> Guía de compra
            </button>
            <button class="filter-pill" data-category="legal-y-seguridad">
                <i class="ri-shield-check-line"></i> Legal y seguridad
            </button>
        </div>
    </div>
</section>

<!-- Artículo destacado -->
<?php if ($featured): ?>
<section class="featured-article-section">
    <div class="l-container">
        <div class="featured-article-card">
            <div class="featured-article__image-wrap">
                <a href="/novedades/<?php echo htmlspecialchars($featured['slug']); ?>">
                    <img src="/<?php echo htmlspecialchars($featured['imagen']); ?>" alt="<?php echo htmlspecialchars($featured['titulo']); ?>" loading="lazy">
                </a>
                <span class="article-badge-featured"><i class="ri-star-fill"></i> Destacado</span>
            </div>
            <div class="featured-article__content">
                <div class="article-meta-top">
                    <span class="category-pill"><?php echo htmlspecialchars($featured['categoria']); ?></span>
                    <span class="read-time"><i class="ri-time-line"></i> <?php echo htmlspecialchars($featured['tiempo_lectura']); ?> de lectura</span>
                </div>
                <h2 class="featured-article__title">
                    <a href="/novedades/<?php echo htmlspecialchars($featured['slug']); ?>">
                        <?php echo htmlspecialchars($featured['titulo']); ?>
                    </a>
                </h2>
                <p class="featured-article__excerpt"><?php echo htmlspecialchars($featured['resumen']); ?></p>
                <div class="article-meta-bottom">
                    <div class="author-info">
                        <i class="ri-user-3-line author-icon"></i>
                        <div>
                            <strong><?php echo htmlspecialchars($featured['autor']); ?></strong>
                            <small><?php echo htmlspecialchars($featured['fecha']); ?></small>
                        </div>
                    </div>
                    <a href="/novedades/<?php echo htmlspecialchars($featured['slug']); ?>" class="button primary btn-read">
                        Leer artículo <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Grid de todos los artículos -->
<section class="all-articles-section bg-accent">
    <div class="l-container">
        <div class="section-header-row">
            <div>
                <p class="section-eyebrow">Publicaciones recientes</p>
                <h2 class="main_title main-color">Artículos de interés</h2>
            </div>
            <span class="articles-count" id="articlesCount"><?php echo count($articulos); ?> artículos disponibles</span>
        </div>

        <div class="articles-grid" id="articlesGrid">
            <?php foreach ($articulos as $art): ?>
            <article class="article-card" data-category="<?php echo htmlspecialchars($art['categoria_slug']); ?>">
                <div class="article-card__thumb">
                    <a href="/novedades/<?php echo htmlspecialchars($art['slug']); ?>" tabindex="-1" aria-hidden="true">
                        <img src="/<?php echo htmlspecialchars($art['imagen']); ?>" alt="<?php echo htmlspecialchars($art['titulo']); ?>" loading="lazy">
                    </a>
                    <span class="category-pill thumb-pill"><?php echo htmlspecialchars($art['categoria']); ?></span>
                </div>
                <div class="article-card__body">
                    <div class="article-meta-top">
                        <span class="article-date"><i class="ri-calendar-line"></i> <?php echo htmlspecialchars($art['fecha']); ?></span>
                        <span class="read-time"><i class="ri-time-line"></i> <?php echo htmlspecialchars($art['tiempo_lectura']); ?></span>
                    </div>
                    <h3 class="article-card__title">
                        <a href="/novedades/<?php echo htmlspecialchars($art['slug']); ?>">
                            <?php echo htmlspecialchars($art['titulo']); ?>
                        </a>
                    </h3>
                    <p class="article-card__excerpt"><?php echo htmlspecialchars($art['resumen']); ?></p>
                    <div class="article-card__footer">
                        <span class="author-tag"><i class="ri-user-smile-line"></i> <?php echo htmlspecialchars($art['autor']); ?></span>
                        <a href="/novedades/<?php echo htmlspecialchars($art['slug']); ?>" class="read-link">
                            Leer más <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="no-articles-message" id="noArticlesMsg" style="display:none;">
            <i class="ri-file-search-line"></i>
            <h3>No encontramos artículos en esta categoría</h3>
            <p>Selecciona otra categoría para seguir explorando nuestras guías inmobiliarias.</p>
        </div>
    </div>
    <div class="pd2"></div>
</section>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // ── Filtro interactivo por categoría ──────────────────────
    const filterButtons = document.querySelectorAll('.filter-pill');
    const articles = document.querySelectorAll('.article-card');
    const noArticlesMsg = document.getElementById('noArticlesMsg');
    const articlesCount = document.getElementById('articlesCount');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedCat = this.getAttribute('data-category');
            let visibleCount = 0;

            articles.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (selectedCat === 'todos' || cardCat === selectedCat) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (articlesCount) {
                articlesCount.textContent = `${visibleCount} artículo${visibleCount === 1 ? '' : 's'} disponible${visibleCount === 1 ? '' : 's'}`;
            }
            if (noArticlesMsg) {
                noArticlesMsg.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    });
});
</script>

<?php include_once 'footer.php'; ?>
