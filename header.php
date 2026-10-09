<!DOCTYPE html>
<html lang="es-PE">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0G2D1J86CG"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-0G2D1J86CG');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title><?php echo htmlspecialchars($page ?? 'Oportunidades Inmobiliarias Perú'); ?> &mdash; Oportunidades Inmobiliarias Perú</title>

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
    <meta property="og:title" content="<?php echo htmlspecialchars($page ?? 'Inicio'); ?> &mdash; Oportunidades Inmobiliarias Perú">
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

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">

    <!-- DNS Prefetch & Preconnect críticos -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fuente principal: preload + font-display swap (evita FOIT) -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;600;800&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;600;800&display=swap"></noscript>

    <!-- CSS propio: crítico, carga síncrona con versión para cache busting -->
    <link rel="stylesheet" type="text/css" href="/css/styles2k2k2.css?v=0.2.3">

    <!-- CSS externos no críticos: carga diferida para no bloquear render -->
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"></noscript>

    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"></noscript>

    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

    <!-- Preload logo (imagen crítica LCP móvil) -->
    <link rel="preload" as="image" href="/img/logo.webp">

    <!-- Google Tag Manager (async, no bloquea render) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TJ48PG23');</script>
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
                        <a href="tel:999653412" target="_blank">
                            <div class="contact-widget__icon flaticon-phone-call icon-header"></div>
                        </a>

                        <!--Datos-->
                        <div class="contact-widget__data no-widget">
                          <h3 class="contact-widget__title white">Llámanos</h3>
                          <p class="contact-widget__content white">999 653 412</p>
                        </div>
                    </div>

                    <div class="contact-widget">
                        <!--Icono-->
                        <a href="mailto:info@oportunidadesinmobiliariasperu.com" target="_blank">
                            <div class="contact-widget__icon flaticon-email icon-header"></div>
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
                        <a href="https://wa.me/51999653412?text=Hola%20Oportunidades%20Inmobiliarias%20Per%C3%BA,%20deseo%20una%20consulta%20gratuita." target="_blank" rel="noopener" title="¡Obtén tu consulta gratuita por WhatsApp!">
                            <i class="flaticon-phone-call"></i> <span class="no-mobile">Consulta gratuita</span>
                        </a>
                    </div>

                </div>

        </div>
    </div>


    <header class="main-header">
            <nav class="nav l-container">
                <div class="nav__data">
                    <a href="/" class="nav__logo">
                        <img src="/img/logo.webp" alt="Oportunidades Inmobiliarias Perú" class="logo" width="211" height="48" fetchpriority="high" loading="eager">
                    </a>
    
                    <div class="nav__toggle" id="nav-toggle">
                        <i class="ri-menu-line nav__toggle-menu"></i>
                        <i class="ri-close-line nav__toggle-close"></i>
                    </div>
                </div>

                <!--=============== NAV MENU ===============-->
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <!--=============== DROPDOWN 1 ===============-->
                        <li class="dropdown__item">                      
                            <div class="nav__link dropdown__button">
                                Terrenos <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <div class="dropdown__container" style="/*opacity: 1;pointer-events: initial; cursor: initial;*/">
                                <div class="dropdown__content l-container">
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-star"></i>
                                        </div>
    
                                        <span class="dropdown__title">Lo más nuevo</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/terrenos/villa-victoria" class="dropdown__link">Villa Victoria — Chiguata</a>
                                            </li>
                                            <li>
                                                <a href="/terrenos/valle-sol" class="dropdown__link">Valle Sol — La Joya</a>
                                            </li>
                                            <li>
                                                <a href="/terrenos/portales-la-joya" class="dropdown__link">Portales La Joya</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-land-1"></i>
                                        </div>

                                        <span class="dropdown__title">Nuestros terrenos</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/terrenos/villa-victoria" class="dropdown__link">Villa Victoria</a>
                                            </li>
                                            <li>
                                                <a href="/terrenos/valle-sol" class="dropdown__link">Valle Sol</a>
                                            </li>
                                            <li>
                                                <a href="/terrenos/portales-la-joya" class="dropdown__link">Portales La Joya</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-search-eye-line"></i>
                                        </div>
                                        <span class="dropdown__title">¿Te gustaría saber más?</span>
                                        <p style="margin:0;padding:0">Explora todos nuestros terrenos disponibles en Arequipa.</p>
                                        <a href="/terrenos" class="button primary center" style="margin:0;">Ver todos los terrenos</a>
                                    </div>




                                </div>
                            </div>
                        </li>

                        <!--=============== DROPDOWN 1 ===============-->
                        <li class="dropdown__item">                      
                            <div class="nav__link dropdown__button">
                                Casas <i class="ri-arrow-down-s-line dropdown__arrow"></i>
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
                                                <a href="/casas/las-lomas" class="dropdown__link">Casa en Las Lomas I</a>
                                            </li>
                                            <li>
                                                <a href="/casas/el-olivar" class="dropdown__link">Praderas El Olivar II</a>
                                            </li>
                                            <li>
                                                <a href="/casas/casonas-blancas" class="dropdown__link">Casonas Blancas</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-house"></i>
                                        </div>
    
                                        <span class="dropdown__title">Casas Arequipa</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/casas/las-lomas" class="dropdown__link">Las Lomas I</a>
                                            </li>
                                            <li>
                                                <a href="/casas/el-olivar" class="dropdown__link">El Olivar II</a>
                                            </li>
                                            <li>
                                                <a href="/casas/casonas-blancas" class="dropdown__link">Casonas Blancas</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-house"></i>
                                        </div>
    
                                        <span class="dropdown__title">Casas destacadas</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/casas/las-lomas" class="dropdown__link">Las Lomas (Cerro Colorado)</a>
                                            </li>
                                            <li>
                                                <a href="/casas/el-olivar" class="dropdown__link">Praderas El Olivar</a>
                                            </li>
                                            <li>
                                                <a href="/casas/casonas-blancas" class="dropdown__link">Casonas Blancas (Cayma)</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-search-eye-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">¿Te gustaría saber más?</span>
                                        <p style="margin:0;padding:0">Conoce todas nuestras casas disponibles en Arequipa.</p>
                                        <a href="/casas" class="button primary center" style="margin:0;">Ver todas las casas</a>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <!--=============== DROPDOWN 2 ===============-->
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
                                                <a href="/departamentos/torres-del-sol" class="dropdown__link">Torres del Sol</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-hook"></i>
                                        </div>
    
                                        <span class="dropdown__title">Departamentos en preventa</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/departamentos/proyecto-1" class="dropdown__link">Condominio Los Sauces</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/proyecto-2" class="dropdown__link">Residencial Mirador</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/proyecto-3" class="dropdown__link">Edificio Las Palmas</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-building"></i>
                                        </div>
    
                                        <span class="dropdown__title">Proyectos entregados</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/departamentos/condominio-verde" class="dropdown__link">Condominio Verde</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/torres-del-sol" class="dropdown__link">Torres del Sol</a>
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

                        <!--=============== DROPDOWN AIRBNB ===============-->
                        <li class="dropdown__item">
                            <div class="nav__link dropdown__button">
                                Airbnb <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <div class="dropdown__container">
                                <div class="dropdown__content l-container">
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-home-heart-line"></i>
                                        </div>

                                        <span class="dropdown__title">Alojamiento temporal</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/airbnb?distrito=yanahuara" class="dropdown__link">Yanahuara</a>
                                            </li>
                                            <li>
                                                <a href="/airbnb?distrito=miraflores" class="dropdown__link">Miraflores</a>
                                            </li>
                                            <li>
                                                <a href="/airbnb?distrito=cayma" class="dropdown__link">Cayma</a>
                                            </li>
                                            <li>
                                                <a href="/airbnb?distrito=cercado" class="dropdown__link">Cercado de Arequipa</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-building-line"></i>
                                        </div>

                                        <span class="dropdown__title">Tipos de estadía</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="/airbnb?tipo=departamento" class="dropdown__link">Departamentos completos</a>
                                            </li>
                                            <li>
                                                <a href="/airbnb?tipo=casa" class="dropdown__link">Casas de campo y ciudad</a>
                                            </li>
                                            <li>
                                                <a href="/airbnb?tipo=suite" class="dropdown__link">Suites boutique</a>
                                            </li>
                                            <li>
                                                <a href="/airbnb?tipo=habitacion" class="dropdown__link">Habitaciones privadas</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-star-smile-line"></i>
                                        </div>

                                        <span class="dropdown__title">Estadías en Arequipa</span>
                                        <p style="margin:0;padding:0">Espacios amoblados, flexibles y verificados en la Ciudad Blanca.</p>
                                        <a href="/airbnb" class="button primary center" style="margin:0;">Ver todos los alojamientos</a>
                                    </div>
                                </div>
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
                                                <a href="/novedades/habilitacion-urbana-titulo-propiedad" class="dropdown__link">Habilitación urbana y SUNARP</a>
                                            </li>
                                            <li>
                                                <a href="/departamentos/condominio-verde" class="dropdown__link">Proyectos entregados</a>
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