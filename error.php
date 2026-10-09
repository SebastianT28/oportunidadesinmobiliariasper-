<?php
http_response_code(404);
$page        = 'Página no encontrada (404) | Oportunidades Inmobiliarias Perú';
$description = 'La página o propiedad que buscas no está disponible o ha sido movida. Te invitamos a explorar nuestro catálogo de terrenos, casas y departamentos en Arequipa.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/404';

include_once 'header.php';
?>

<meta name="robots" content="noindex, follow">

<div class="error-page-wrap">
    <div class="l-container">
        <div class="error-card-main">
            <!-- Código de Error -->
            <div class="error-code-badge">404</div>

            <h1 class="error-title">Página no encontrada</h1>
            <p class="error-desc">
                Parece que la página o propiedad que estás buscando ya no está disponible, cambió de dirección o el enlace ingresado tiene un error. ¡No te preocupes, estamos aquí para ayudarte!
            </p>

            <!-- Acciones Principales -->
            <div class="error-actions">
                <a href="/" class="btn-cta">
                    <i class="ri-home-4-line"></i> Ir a la página principal
                </a>
                <a href="/contacto" class="btn-cta" style="background:var(--alter-main);color:var(--main-color);border:1px solid #cbd5e1;">
                    <i class="ri-customer-service-2-line"></i> Contactar a un asesor
                </a>
            </div>

            <!-- Accesos rápidos a secciones clave -->
            <div class="error-quick-categories">
                <h4>O explora nuestras secciones principales:</h4>
                <div class="error-categories-grid">
                    <a href="/terrenos" class="error-category-item">
                        <i class="flaticon-land-1"></i>
                        <span>Terrenos en venta</span>
                    </a>
                    <a href="/casas" class="error-category-item">
                        <i class="flaticon-house"></i>
                        <span>Casas residenciales</span>
                    </a>
                    <a href="/departamentos" class="error-category-item">
                        <i class="flaticon-building"></i>
                        <span>Departamentos</span>
                    </a>
                    <a href="/alquiler" class="error-category-item">
                        <i class="ri-key-2-line"></i>
                        <span>Propiedades en alquiler</span>
                    </a>
                </div>
            </div>

            <!-- Asistencia por WhatsApp -->
            <div style="margin-top:2rem;font-size:0.9rem;color:#64748b;">
                ¿Buscas una propiedad específica? Escríbenos directamente a nuestro WhatsApp: 
                <a href="https://wa.me/51999653412" target="_blank" rel="noopener" style="color:#128c7e;font-weight:600;text-decoration:underline;">
                    +51 999 653 412
                </a>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
