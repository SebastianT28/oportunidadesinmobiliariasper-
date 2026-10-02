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

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_PE">
    <meta property="og:site_name" content="Oportunidades Inmobiliarias Perú">
    <meta property="og:title" content="<?php echo htmlspecialchars($page ?? 'Inicio'); ?> &mdash; Oportunidades Inmobiliarias Perú">
    <?php if (!empty($description)): ?>
    <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
    <?php endif; ?>
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <?php if (!empty($og_image)): ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
    <?php else: ?>
    <meta property="og:image" content="https://oportunidadesinmobiliariasperu.com/img/og-default.jpg">
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>

    <link rel="stylesheet" type="text/css" href="css/styles2k2k2.css?v.0.2.0">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TJ48PG23');</script>
    <!-- End Google Tag Manager -->
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
                        <a href="tel:912079015" target="_blank">
                            <div class="contact-widget__icon flaticon-phone-call icon-header"></div>
                        </a>

                        <!--Datos-->
                        <div class="contact-widget__data no-widget">
                          <h3 class="contact-widget__title white">Llámanos</h3>
                          <p class="contact-widget__content white">999 999 999</p>
                        </div>
                    </div>

                    <div class="contact-widget">
                        <!--Icono-->
                        <a href="mailto:ventas@coquitoarequipa.pe" target="_blank">
                            <div class="contact-widget__icon flaticon-email icon-header"></div>
                        </a>

                        <!--Datos-->
                        <div class="contact-widget__data no-widget">
                          <h3 class="contact-widget__title white">Escríbenos</h3>
                          <p class="contact-widget__content white">hola@oportunidadesinmobiliariasperu.com</p>
                        </div>
                    </div>
                </div>
                <div class="top-bar__right">

                    <div class="widget-top">
                        <a href="javascript:void(0)" id="profile-toggle" title="¡Obtén tu consulta gratuita!">
                            <i class="flaticon-phone-call"></i> <span class="no-mobile">Consulta gratuita</span>
                        </a>
                    </div>

                </div>

        </div>
    </div>


    <!-- POPOVER  FACTURACION -->
        <div class="l-container p-relative">
            <div class="toggle-profile" id="popover-perfil">
                <div class="toggle-profile-header">
                    <div class="toggle-profile__icon">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="toggle-profile__title">
                        <h5>ELIGE UNA OPCIÓN</h5>
                    </div>
                </div>

                <a href="https://bill.pecano.pe/app" target="_blank" class="link-toggle">
                    <div class="toggle-profile-list">
                        <div class="toggle-profile__icon">
                            <i class="flaticon-next"></i>
                        </div>
                        <div class="toggle-profile__title">
                            <p>Consumidor final</p>
                        </div>
                    </div>
                </a>

                <a href="https://bill.pecano.pe/app/customer" target="_blank" class="link-toggle">
                    <div class="toggle-profile-list">
                        <div class="toggle-profile__icon">
                            <i class="flaticon-next"></i>
                        </div>
                        <div class="toggle-profile__title">
                            <p>Consumidor especial</p>
                        </div>
                    </div>
                </a>
              </div>
        </div>
        <!-- END POPOVER PROFILE -->


    <header class="main-header">
            <nav class="nav l-container">
                <div class="nav__data">
                    <a href="#" class="nav__logo">
                        <img src="img/logo.webp" alt="" class="logo">
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
                                                <a href="#" class="dropdown__link">Chiguata</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Portales La Joya</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Arequipeñadas</a>
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
                                                <a href="#" class="dropdown__link">Terreno 1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 3</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        
                                        <div class="dropdown__icon">
                                            <i class="flaticon-land-1"></i>
                                        </div>

                                        <span class="dropdown__title">Terrenos nuevos en estreno</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 3</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-land"></i>
                                        </div>
    
                                        <span class="dropdown__title">Terrenos</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Terreno 3</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-search-eye-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">¿Te gustaría saber más?</span>
                                        <p style="margin:0;padding:0">Conoce más de nuestros terrenos con mayor embergadura.</p>
                                        <a href="#" class="button primary center" style="margin:0;">Ver terrenos</a>
                                        
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
                                                <a href="#" class="dropdown__link">Casa en Las Lomas I</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Praderas El Olivar II</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Villa Killari - Cusco</a>
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
                                                <a href="#" class="dropdown__link">Las Lomas I</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">El Olivar II</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Casonas Blancas</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="flaticon-house"></i>
                                        </div>
    
                                        <span class="dropdown__title">Casas económicas</span>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Las Lomas I</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">El Olivar II</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Casonas Blancas</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Urb. El Solar</a>
                                            </li>
                                        </ul>
                                    </div>


    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-search-eye-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">¿Te gustaría saber más?</span>
                                        <p style="margin:0;padding:0">Conoce más de nuestros terrenos con mayor embergadura.</p>
                                        <a href="#" class="button primary center" style="margin:0;">Ver casas</a>
                                        
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
                                                <a href="#" class="dropdown__link">Proyecto departamento 1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 2</a>
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
                                                <a href="#" class="dropdown__link">Proyecto departamento 1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 3</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 4</a>
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
                                                <a href="#" class="dropdown__link">Proyecto departamento 1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 3</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyecto departamento 4</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-search-eye-line"></i>
                                        </div>
    
                                        <span class="dropdown__title">¿Te gustaría saber más?</span>
                                        <p style="margin:0;padding:0">Conoce más de nuestros terrenos con mayor embergadura.</p>
                                        <a href="#" class="button primary center" style="margin:0;">Ver departamentos</a>
                                        
                                    </div>


                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="novedades" class="nav__link">Novedades</a>
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
                                                <a href="#" class="dropdown__link">Nosotros</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Sostenibilidad</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Contacto</a>
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
                                                <a href="#" class="dropdown__link">Política y normativa</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Proyectos entregados</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <div id="cd-shadow-layer"></div>

<div class="p-top"></div>