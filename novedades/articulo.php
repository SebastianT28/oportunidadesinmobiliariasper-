<?php
require_once __DIR__ . '/../data/articulos.php';
require_once __DIR__ . '/../data/propiedades.php';

$slug = trim($_GET['slug'] ?? '');
if (!$slug) {
    header('Location: /novedades', true, 301);
    exit;
}

// Redirecciones 301 para slugs antiguos o alias
$aliases = [
    'protege-tu-hogar-de-las-lluvias'      => 'protege-tu-hogar-lluvias',
    'mejores-zonas-arequipa'               => 'analisis-inversion-departamentos-bustamante-y-rivero-arequipa',
    'mejores-zonas-aire-puro-arequipa'     => 'analisis-inversion-departamentos-bustamante-y-rivero-arequipa',
    'donde-comprar-mi-primer-hogar'        => 'rentabilidad-departamentos-cercado-arequipa-alquiler-airbnb',
    'donde-comprar-futuro-hogar'           => 'rentabilidad-departamentos-cercado-arequipa-alquiler-airbnb',
    'cuida-el-futuro-de-tu-familia'        => 'proyeccion-economica-2027-arequipa-inversion-departamentos',
    'invertir-bienes-raices-2026'          => 'proyeccion-economica-2027-arequipa-inversion-departamentos',
    'habilitacion-urbana-titulo-propiedad' => 'analisis-inversion-departamentos-bustamante-y-rivero-arequipa',
];
if (isset($aliases[$slug])) {
    header('Location: /novedades/' . $aliases[$slug], true, 301);
    exit;
}

$articulo = findArticle($slug);
if (!$articulo) {
    header('HTTP/1.0 404 Not Found');
    $page = 'Artículo no encontrado — Oportunidades Inmobiliarias Perú';
    include_once __DIR__ . '/../header.php';
    echo '<div class="l-container center" style="padding: 100px 20px;">
            <i class="ri-article-line" style="font-size: 4rem; color: var(--main2-color);"></i>
            <h1 class="main_title main-color">Artículo no encontrado</h1>
            <p>El artículo que estás buscando no existe o fue reubicado.</p>
            <div class="pd1"></div>
            <a href="/novedades" class="button primary">Ver todas las novedades</a>
          </div>';
    include_once __DIR__ . '/../footer.php';
    exit;
}

$meta_title_exact = $articulo['meta_title'] ?? null;
$page        = $articulo['titulo'] . ' | Novedades';
$description = $articulo['meta_description'] ?? $articulo['resumen'];
$canonical   = 'https://oportunidadesinmobiliariasperu.com/novedades/' . $articulo['slug'];
$og_image    = 'https://oportunidadesinmobiliariasperu.com/' . ltrim($articulo['imagen'], '/');
$ogImage     = $og_image;

$relacionados      = recentArticles($articulo['slug'], 3);
$currentUrl        = 'https://oportunidadesinmobiliariasperu.com/novedades/' . $articulo['slug'];
$preload_lcp_image = '/' . ltrim($articulo['imagen'], '/');

include_once __DIR__ . '/../header.php';
?>

<!-- Schema.org BlogPosting (Con señales E-E-A-T y sede física en Arequipa) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": <?php echo json_encode($articulo['titulo'], JSON_UNESCAPED_UNICODE); ?>,
  "description": <?php echo json_encode($description, JSON_UNESCAPED_UNICODE); ?>,
  "image": <?php echo json_encode($og_image, JSON_UNESCAPED_SLASHES); ?>,
  "datePublished": <?php echo json_encode($articulo['fecha_iso']); ?>,
  "dateModified": <?php echo json_encode($articulo['fecha_iso']); ?>,
  "author": {
    "@type": "Organization",
    "name": <?php echo json_encode($articulo['autor'], JSON_UNESCAPED_UNICODE); ?>,
    "url": "https://oportunidadesinmobiliariasperu.com/nosotros",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Av. Arequipa #1477",
      "addressLocality": "Arequipa",
      "addressRegion": "Arequipa",
      "addressCountry": "PE"
    }
  },
  "publisher": {
    "@type": "Organization",
    "name": "Oportunidades Inmobiliarias Perú",
    "logo": {
      "@type": "ImageObject",
      "url": "https://oportunidadesinmobiliariasperu.com/img/logo.webp"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": <?php echo json_encode($canonical, JSON_UNESCAPED_SLASHES); ?>
  }
}
</script>

<!-- Breadcrumbs y Header de Artículo -->
<div class="article-header-bg">
    <div class="l-container">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <a href="/novedades">Novedades</a> <i class="ri-arrow-right-s-line"></i>
            <span><?php echo htmlspecialchars($articulo['categoria']); ?></span>
        </nav>

        <div class="article-header-content">
            <div class="article-badge-row">
                <span class="category-pill"><?php echo htmlspecialchars($articulo['categoria']); ?></span>
                <span class="read-time"><i class="ri-time-line"></i> <?php echo htmlspecialchars($articulo['tiempo_lectura']); ?> de lectura</span>
            </div>

            <h1 class="article-single-title"><?php echo htmlspecialchars($articulo['titulo']); ?></h1>

            <div class="article-author-bar">
                <div class="author-meta-left">
                    <div class="author-avatar-badge">
                        <i class="ri-user-star-line"></i>
                    </div>
                    <div>
                        <div class="author-name"><?php echo htmlspecialchars($articulo['autor']); ?></div>
                        <div class="author-title"><?php echo htmlspecialchars($articulo['autor_cargo'] ?? 'Especialista Inmobiliario'); ?> · <?php echo htmlspecialchars($articulo['fecha']); ?></div>
                    </div>
                </div>

                <div class="article-share-top">
                    <span>Compartir:</span>
                    <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($articulo['titulo'] . ' ' . $currentUrl); ?>" target="_blank" rel="noopener" class="share-btn wa" aria-label="Compartir en WhatsApp" title="Compartir en WhatsApp">
                        <i class="ri-whatsapp-line" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($currentUrl); ?>" target="_blank" rel="noopener" class="share-btn fb" aria-label="Compartir en Facebook" title="Compartir en Facebook">
                        <i class="ri-facebook-fill" aria-hidden="true"></i>
                    </a>
                    <button type="button" class="share-btn copy" onclick="copyArticleUrl()" aria-label="Copiar enlace del artículo" title="Copiar enlace">
                        <i class="ri-links-line" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Layout de Contenido Principal -->
<div class="article-container-wrap">
    <div class="l-container">
        <div class="article-two-cols">

            <!-- Columna Principal -->
            <main class="article-main-col">
                <div class="article-featured-media">
                    <img src="/<?php echo htmlspecialchars($articulo['imagen']); ?>" alt="<?php echo htmlspecialchars($articulo['imagen_alt'] ?? $articulo['titulo']); ?>" width="1200" height="675" loading="eager" fetchpriority="high" decoding="sync">
                </div>

                <div class="article-body-content">
                    <?php echo $articulo['contenido']; ?>
                </div>

                <!-- Tags -->
                <?php if (!empty($articulo['tags'])): ?>
                <div class="article-tags-wrap">
                    <span class="tags-title"><i class="ri-price-tag-3-line"></i> Temas:</span>
                    <div class="tags-list">
                        <?php foreach ($articulo['tags'] as $tag): ?>
                            <span class="tag-item">#<?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Caja de Compartir abajo -->
                <div class="article-share-bottom">
                    <h4>¿Te pareció útil este artículo? Compártelo:</h4>
                    <div class="share-buttons-bottom">
                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($articulo['titulo'] . ' ' . $currentUrl); ?>" target="_blank" rel="noopener" class="btn-share-lg wa">
                            <i class="ri-whatsapp-line"></i> Enviar por WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($currentUrl); ?>" target="_blank" rel="noopener" class="btn-share-lg fb">
                            <i class="ri-facebook-fill"></i> Facebook
                        </a>
                        <button class="btn-share-lg copy" onclick="copyArticleUrl()">
                            <i class="ri-links-line"></i> <span id="copyTextBtn">Copiar enlace</span>
                        </button>
                    </div>
                </div>

                <!-- Bio autor (Señal E-E-A-T Institucional) -->
                <div class="author-bio-card">
                    <div class="bio-avatar">
                        <i class="ri-shield-user-line"></i>
                    </div>
                    <div class="bio-info">
                        <h3><?php echo !empty($articulo['firma_eeat_titulo']) ? htmlspecialchars($articulo['firma_eeat_titulo']) : ('Publicado por ' . htmlspecialchars($articulo['autor'])); ?></h3>
                        <p><?php echo !empty($articulo['firma_eeat']) ? htmlspecialchars($articulo['firma_eeat']) : 'Redactado por el Equipo de Análisis e Inversión de Oportunidades Inmobiliarias Perú — Especialistas en Saneamiento y Desarrollo Urbano en Arequipa (Av. Arequipa #1477).'; ?></p>
                    </div>
                </div>
            </main>

            <!-- Sidebar -->
            <aside class="article-sidebar">
                <div class="sidebar-sticky">



                    <!-- Widget Artículos Recientes -->
                    <div class="sidebar-card">
                        <h4 class="sidebar-widget-title"><i class="ri-article-line"></i> Otras novedades</h4>
                        <div class="sidebar-recent-list">
                            <?php foreach ($relacionados as $rel): ?>
                            <a href="/novedades/<?php echo htmlspecialchars($rel['slug']); ?>" class="recent-article-item">
                                <img src="/<?php echo htmlspecialchars($rel['imagen']); ?>" alt="<?php echo htmlspecialchars($rel['imagen_alt'] ?? $rel['titulo']); ?>" width="120" height="80" loading="lazy" decoding="async">
                                <div class="recent-article-info">
                                    <span class="recent-cat"><?php echo htmlspecialchars($rel['categoria']); ?></span>
                                    <h5><?php echo htmlspecialchars($rel['titulo']); ?></h5>
                                    <small><?php echo htmlspecialchars($rel['tiempo_lectura']); ?> de lectura</small>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Widget Proyectos Destacados -->
                    <div class="sidebar-card">
                        <h4 class="sidebar-widget-title"><i class="ri-community-line"></i> Proyectos recomendados</h4>
                        <ul class="sidebar-props-list">
                            <li>
                                <a href="/departamentos/terrazas-de-vallecito">
                                    <strong>Terrazas de Vallecito</strong>
                                    <span>Departamentos de estreno en Cercado</span>
                                </a>
                            </li>
                            <li>
                                <a href="/departamentos/proyecto-mirador">
                                    <strong>Mirador del Misti</strong>
                                    <span>Departamentos en Yanahuara desde S/ 265,000</span>
                                </a>
                            </li>
                            <li>
                                <a href="/departamentos/proyecto-altamira">
                                    <strong>Altamira Residencial</strong>
                                    <span>Edificio moderno en Cayma de 2 y 3 dorm.</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </aside>

        </div>
    </div>
</div>

<!-- Artículos Relacionados -->
<?php if (!empty($relacionados)): ?>
<section class="related-articles-section bg-accent">
    <div class="pd5"></div>
    <div class="l-container">
        <div class="section-center-head">
            <p class="section-eyebrow">Continúa aprendiendo</p>
            <h2 class="main_title main-color">Artículos relacionados</h2>
        </div>

        <div class="articles-grid">
            <?php foreach ($relacionados as $rel): ?>
            <article class="article-card">
                <div class="article-card__thumb">
                    <a href="/novedades/<?php echo htmlspecialchars($rel['slug']); ?>" tabindex="-1" aria-hidden="true">
                        <img src="/<?php echo htmlspecialchars($rel['imagen']); ?>" alt="<?php echo htmlspecialchars($rel['titulo']); ?>" width="600" height="338" loading="lazy" decoding="async">
                    </a>
                    <span class="category-pill thumb-pill"><?php echo htmlspecialchars($rel['categoria']); ?></span>
                </div>
                <div class="article-card__body">
                    <div class="article-meta-top">
                        <span class="article-date"><i class="ri-calendar-line"></i> <?php echo htmlspecialchars($rel['fecha']); ?></span>
                        <span class="read-time"><i class="ri-time-line"></i> <?php echo htmlspecialchars($rel['tiempo_lectura']); ?></span>
                    </div>
                    <h3 class="article-card__title">
                        <a href="/novedades/<?php echo htmlspecialchars($rel['slug']); ?>">
                            <?php echo htmlspecialchars($rel['titulo']); ?>
                        </a>
                    </h3>
                    <p class="article-card__excerpt"><?php echo htmlspecialchars($rel['resumen']); ?></p>
                    <div class="article-card__footer">
                        <span class="author-tag"><i class="ri-user-smile-line"></i> <?php echo htmlspecialchars($rel['autor_corto'] ?? $rel['autor']); ?></span>
                        <a href="/novedades/<?php echo htmlspecialchars($rel['slug']); ?>" class="read-link">
                            Leer más <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pd5"></div>
</section>
<?php endif; ?>

<script>
function copyArticleUrl() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const btn = document.getElementById('copyTextBtn');
        if (btn) btn.textContent = '¡Enlace copiado!';
        alert('Enlace copiado al portapapeles');
        setTimeout(() => {
            if (btn) btn.textContent = 'Copiar enlace';
        }, 3000);
    }).catch(err => {
        console.error('Error al copiar:', err);
    });
}
</script>

<?php include_once __DIR__ . '/../footer.php'; ?>
