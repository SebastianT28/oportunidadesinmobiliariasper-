<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <?php
    $computed_doc_title = !empty($meta_title_exact)
        ? $meta_title_exact
        : (($page ?? 'Oportunidades Inmobiliarias Perú') . ' — Oportunidades Inmobiliarias Perú');
    ?>
    <title><?php echo htmlspecialchars($computed_doc_title); ?></title>

    <?php if (!empty($description)): ?>
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <?php endif; ?>

    <?php
    $canonical_url = $canonical ?? 'https://oportunidadesinmobiliariasperu.com' . $_SERVER['REQUEST_URI'];
    ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <!-- Hreflang Tags -->
    <link rel="alternate" hreflang="es-PE" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <link rel="alternate" hreflang="es" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_PE">
    <meta property="og:site_name" content="Oportunidades Inmobiliarias Perú">
    <meta property="og:title" content="<?php echo htmlspecialchars($computed_doc_title); ?>">
    <?php if (!empty($description)): ?>
    <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
    <?php endif; ?>
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <?php $og_image_final = !empty($og_image) ? $og_image : 'https://oportunidadesinmobiliariasperu.com/img/og-default.webp'; ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image_final); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page ?? 'Inicio'); ?> &mdash; Oportunidades Inmobiliarias Perú">
    <?php if (!empty($description)): ?>
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>">
    <?php endif; ?>
    <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image_final); ?>">

    <!-- Schema.org JSON-LD: RealEstateAgent & Organization -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "RealEstateAgent",
      "name": "Oportunidades Inmobiliarias Perú",
      "url": "https://oportunidadesinmobiliariasperu.com/",
      "logo": "https://oportunidadesinmobiliariasperu.com/img/logo.webp",
      "image": "https://oportunidadesinmobiliariasperu.com/img/og-default.webp",
      "description": "Empresa arequipeña especializada en el desarrollo y comercialización de terrenos con habilitación urbana, casas residenciales, departamentos y alquileres.",
      "telephone": "+51999653412",
      "email": "info@oportunidadesinmobiliariasperu.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Av. Arequipa #1477",
        "addressLocality": "Arequipa",
        "addressRegion": "Arequipa",
        "postalCode": "04001",
        "addressCountry": "PE"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -16.409047,
        "longitude": -71.537451
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        "opens": "08:30",
        "closes": "18:30"
      },
      "priceRange": "S/ 8,900 - S/ 850,000"
    }
    </script>

    <?php if (!empty($prop)): ?>
    <!-- Schema.org JSON-LD: Detalle de Propiedad Inmobiliaria -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Product",
      "name": <?php echo json_encode($prop['nombre']); ?>,
      "description": <?php echo json_encode($prop['descripcion'] ?? ''); ?>,
      "image": <?php echo json_encode(!empty($prop['imagen_og']) ? 'https://oportunidadesinmobiliariasperu.com/' . $prop['imagen_og'] : $og_image_final); ?>,
      "category": <?php echo json_encode(ucfirst($prop['categoria'] ?? 'Inmueble')); ?>,
      "offers": {
        "@type": "Offer",
        "priceCurrency": <?php echo json_encode(!empty($prop['moneda']) && $prop['moneda'] === 'S/' ? 'PEN' : 'USD'); ?>,
        "price": <?php echo json_encode($prop['precio'] ?? '0'); ?>,
        "availability": "https://schema.org/InStock",
        "url": <?php echo json_encode($canonical_url); ?>,
        "seller": {
          "@type": "Organization",
          "name": "Oportunidades Inmobiliarias Perú"
        }
      }
    }
    </script>
    <?php elseif (!empty($item)): ?>
    <!-- Schema.org JSON-LD: Detalle Alojamiento Airbnb -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LodgingBusiness",
      "name": <?php echo json_encode($item['nombre']); ?>,
      "description": <?php echo json_encode($item['descripcion'] ?? ''); ?>,
      "image": <?php echo json_encode(!empty($item['imagen']) ? 'https://oportunidadesinmobiliariasperu.com/' . $item['imagen'] : $og_image_final); ?>,
      "priceRange": <?php echo json_encode('S/ ' . ($item['precio_noche'] ?? '120') . ' por noche'); ?>,
      "telephone": "+51999653412",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": <?php echo json_encode($item['distrito'] ?? 'Arequipa'); ?>,
        "addressRegion": "Arequipa",
        "addressCountry": "PE"
      }
    }
    </script>
    <?php endif; ?>

    <!-- Favicon circular centrado (192x192 estándar Google Search y pestañas retina) -->
    <link rel="icon" type="image/png" sizes="192x192" href="/img/favicon.png?v=2">
    <link rel="shortcut icon" href="/img/favicon.png?v=2" type="image/png">
    <link rel="apple-touch-icon" href="/img/favicon.png?v=2">

    <!-- DNS Prefetch & Preconnect críticos (máximo 2 orígenes esenciales para FCP óptimo) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php if (!empty($use_swiper) || !empty($use_gsap)): ?>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <?php endif; ?>

    <!-- Preload dinámico de la imagen LCP real de cada vista -->
    <?php if (!empty($preload_lcp_image)): ?>
    <link rel="preload" as="image" href="<?php echo htmlspecialchars($preload_lcp_image); ?>"<?php if (!empty($preload_lcp_srcset)): ?> imagesrcset="<?php echo htmlspecialchars($preload_lcp_srcset); ?>" imagesizes="<?php echo htmlspecialchars($preload_lcp_sizes ?? '100vw'); ?>"<?php endif; ?> fetchpriority="high">
    <?php endif; ?>

    <!-- Fuente principal: preload + font-display swap (evita FOIT) -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;600;800&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;600;800&display=swap"></noscript>

    <!-- CSS propio minificado: crítico -->
    <link rel="stylesheet" type="text/css" href="/css/styles2k2k2.min.css?v=0.4.1">

    <!-- RemixIcon subset local con font-display: swap (3.5 KB, carga no bloqueante) -->
    <link rel="preload" as="style" href="/css/remixicon.min.css?v=1.0.0" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/css/remixicon.min.css?v=1.0.0"></noscript>

    <?php if (!empty($use_swiper)): ?>
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"></noscript>
    <?php endif; ?>

    <?php if (!empty($use_sweetalert)): ?>
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
    <?php endif; ?>

    <?php if (!empty($prop['has_panorama']) || !empty($prop['tour_virtual']['activo'])): ?>
    <!-- Pannellum 360° viewer CSS: carga diferida no bloqueante para FCP óptimo -->
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"></noscript>
    <!-- Estilos personalizados minificados del visor 360° -->
    <link rel="stylesheet" type="text/css" href="/css/360.min.css?v=1.3.2">
    <?php endif; ?>

    <!-- Google Analytics (G-0G2D1J86CG) + Google Tag Manager (GTM-TJ48PG23): dataLayer inmediato + red diferida post-interacción/idle -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){window.dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-0G2D1J86CG');
      window.dataLayer.push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
      (function() {
        var analyticsLoaded = false;
        function loadGoogleTags() {
          if (analyticsLoaded) return;
          analyticsLoaded = true;
          var ga = document.createElement('script');
          ga.async = true;
          ga.src = 'https://www.googletagmanager.com/gtag/js?id=G-0G2D1J86CG';
          document.head.appendChild(ga);

          var gtm = document.createElement('script');
          gtm.async = true;
          gtm.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-TJ48PG23';
          document.head.appendChild(gtm);
        }
        ['pointerdown', 'keydown', 'touchstart', 'scroll'].forEach(function(ev) {
          window.addEventListener(ev, loadGoogleTags, { passive: true, once: true });
        });
        <?php if (!empty($eager_analytics)): ?>
        window.addEventListener('DOMContentLoaded', function() { setTimeout(loadGoogleTags, 150); });
        <?php else: ?>
        window.addEventListener('load', function() { setTimeout(loadGoogleTags, 3500); });
        <?php endif; ?>
      })();
    </script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ48PG23"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="bg-main navsection" id="inicio">
        <div class="top-bar l-container">

                <div class="top-bar__left">

                    <div class="contact-widget">
                        <!--Icono-->
                        <a href="tel:999653412" aria-label="Llamar al 999 653 412">
                            <div class="contact-widget__icon flaticon-phone-call icon-header" aria-hidden="true"></div>
                        </a>

                        <!--Datos-->
                        <div class="contact-widget__data no-widget">
                          <h3 class="contact-widget__title white">Llámanos</h3>
                          <p class="contact-widget__content white">999 653 412</p>
                        </div>
                    </div>

                    <div class="contact-widget">
                        <!--Icono-->
                        <a href="mailto:info@oportunidadesinmobiliariasperu.com" aria-label="Escribir al correo info@oportunidadesinmobiliariasperu.com">
                            <div class="contact-widget__icon flaticon-email icon-header" aria-hidden="true"></div>
                        </a>

                        <!--Datos-->
                        <div class="contact-widget__data no-widget">
                          <h3 class="contact-widget__title white">Escríbenos</h3>
                          <p class="contact-widget__content white">info@oportunidadesinmobiliariasperu.com</p>
                        </div>
                    </div>
                </div>
                <div class="top-bar__right">

                    <div class="widget-top">
                        <a href="https://wa.me/51999653412?text=Hola%20Oportunidades%20Inmobiliarias%20Per%C3%BA,%20deseo%20una%20consulta%20gratuita." target="_blank" rel="noopener" aria-label="Consulta gratuita por WhatsApp" title="¡Obtén tu consulta gratuita por WhatsApp!">
                            <i class="flaticon-phone-call" aria-hidden="true"></i> <span class="no-mobile">Consulta gratuita</span>
                        </a>
                    </div>

                </div>

        </div>
    </div>


    <header class="main-header">
            <nav class="nav l-container" aria-label="Navegación principal">
                <div class="nav__data">
                    <a href="/" class="nav__logo">
                        <img src="/img/logo.webp" alt="Oportunidades Inmobiliarias Perú" class="logo" width="211" height="48" loading="eager" decoding="async">
                    </a>
    
                    <button type="button" class="nav__toggle" id="nav-toggle" aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="nav-menu">
                        <i class="ri-menu-line nav__toggle-menu" aria-hidden="true"></i>
                        <i class="ri-close-line nav__toggle-close" aria-hidden="true"></i>
                    </button>
                </div>

                <!--=============== NAV MENU ===============-->
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <!--=============== DROPDOWN DEPARTAMENTOS (1ra OPCIÓN) ===============-->
                        <li class="dropdown__item">
                            <div class="nav__link dropdown__button">
                                Departamentos <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <div class="dropdown__container">
                                <div class="dropdown__content l-container">
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-flashlight-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">Lo más visto</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/departamentos/residencias-norte" class="dropdown__link">Residencias del Norte</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/residencial-los-arces" class="dropdown__link">Residencial Los Arces</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-key-2-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">Departamentos en estreno</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/departamentos/terrazas-de-vallecito" class="dropdown__link">Terrazas de Vallecito</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/residencias-norte" class="dropdown__link">Residencias del Norte</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/residencial-los-arces" class="dropdown__link">Residencial Los Arces</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/mirador-santa-catalina" class="dropdown__link">Mirador de Santa Catalina</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos?tab=estreno" class="dropdown__link" style="color:var(--main2-color);font-weight:600;">Ver todos &rarr;</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-hook"></i>
                                        </div>
    
                                        <span class="dropdown__title">Departamentos en construcción</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/departamentos/proyecto-altamira" class="dropdown__link">Altamira Residencial</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/proyecto-mirador" class="dropdown__link">Mirador del Misti</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/proyecto-parque-real" class="dropdown__link">Parque Real</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos?tab=en-construccion" class="dropdown__link" style="color:var(--main2-color);font-weight:600;">Ver todos &rarr;</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-draft-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">Departamentos en preventa</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/departamentos/edificio-alba" class="dropdown__link">Edificio Alba</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/edificio-zentra" class="dropdown__link">Edificio Zentra</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos?tab=preventa" class="dropdown__link" style="color:var(--main2-color);font-weight:600;">Ver todos &rarr;</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-search-eye-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">¿Te gustaría saber más?</span>
                                        <p style="margin:0;padding:0">Explora todos nuestros departamentos disponibles en Arequipa.</p>
                                        <a href="/departamentos" class="button primary center" style="margin:0;">Ver todos los departamentos</a>
                                        
                                    </div>


                                </div>
                            </div>
                        </li>

                        <!--=============== TERRENOS (DESHABILITADO) ===============-->
                        <li class="nav__item--disabled">                      
                            <div class="nav__link dropdown__button" aria-disabled="true">
                                Terrenos <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>
                        </li>

                        <!--=============== CASAS (DESHABILITADO) ===============-->
                        <li class="nav__item--disabled">                      
                            <div class="nav__link dropdown__button" aria-disabled="true">
                                Casas <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>
                        </li>

                        <!--=============== AIRBNB (DESHABILITADO) ===============-->
                        <li class="nav__item--disabled">
                            <div class="nav__link dropdown__button" aria-disabled="true">
                                Airbnb <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>
                        </li>

                        <li>
                            <a href="/novedades" class="nav__link">Novedades</a>
                        </li>

                        <!--=============== DROPDOWN 3 ===============-->
                        <li class="dropdown__item">                        
                            <div class="nav__link dropdown__button">
                                Nosotros <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <div class="dropdown__container">
                                <div class="dropdown__content l-container">
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-office"></i>
                                        </div>
    
                                        <span class="dropdown__title">Acerca de nosotros</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/nosotros" class="dropdown__link">Quiénes somos</a>
                                            </li>
                                            <li>
                                                <a href="/nosotros" class="dropdown__link">Nuestro equipo</a>
                                            </li>
                                            <li>
                                                <a href="/novedades" class="dropdown__link">Guías inmobiliarias</a>
                                            </li>
                                            <li>
                                                <a href="/contacto" class="dropdown__link">Contáctanos</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-hand-shake"></i>
                                        </div>
    
                                        <span class="dropdown__title">Seguridad y calidad</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/novedades/analisis-inversion-departamentos-bustamante-y-rivero-arequipa" class="dropdown__link">Análisis e inversión inmobiliaria</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos?tab=estreno" class="dropdown__link">Departamentos en estreno</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="/contacto" class="nav__link">Contacto</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <div id="cd-shadow-layer"></div>

<div class="p-top"></div>