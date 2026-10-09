<?php
$page        = '¡Solicitud Recibida! — Gracias por Contactarnos | Oportunidades Inmobiliarias Perú';
$description = 'Hemos recibido tus datos con éxito. En breve un asesor especializado se pondrá en contacto contigo para brindarte asesoría inmobiliaria.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/gracias';
$nombre_contacto = trim(filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

include_once 'header.php';
?>

<!-- Evento de conversión GA4 / Google Tag Manager -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    if (typeof gtag === 'function') {
      gtag('event', 'generate_lead', {
        event_category: 'Contacto',
        event_label: 'Formulario Web Enviado',
        value: 1
      });
    }
  });
</script>

<div class="thankyou-page-wrap">
    <div class="l-container">
        <div class="thankyou-card">
            <!-- Icono Check -->
            <div class="thankyou-badge-icon">
                <i class="ri-checkbox-circle-fill"></i>
            </div>

            <h1 class="thankyou-title">
                <?php if (!empty($nombre_contacto)): ?>
                    ¡Gracias, <?php echo htmlspecialchars($nombre_contacto); ?>!
                <?php else: ?>
                    ¡Mensaje Recibido con Éxito!
                <?php endif; ?>
            </h1>

            <p class="thankyou-lead">
                Hemos recibido tus datos correctamente. Uno de nuestros asesores especializados revisará tus requerimientos y se comunicará contigo vía WhatsApp o llamada en <strong>menos de 30 minutos</strong> dentro del horario comercial.
            </p>

            <!-- Acciones Principales -->
            <div class="thankyou-actions-group">
                <a href="https://wa.me/51999653412?text=Hola%20Oportunidades%20Inmobiliarias%20Per%C3%BA,%20acabo%20de%20enviar%20el%20formulario%20de%20contacto%20y%20deseo%20atenci%C3%B3n%20inmediata." target="_blank" rel="noopener" class="thankyou-btn-primary">
                    <i class="flaticon-whatsapp"></i> Chatear por WhatsApp ahora
                </a>
                <a href="/" class="thankyou-btn-secondary">
                    <i class="ri-home-4-line"></i> Volver a la página principal
                </a>
            </div>

            <!-- Próximos pasos -->
            <div class="thankyou-next-steps">
                <h4>¿Qué pasará a continuación?</h4>
                <div class="thankyou-steps-grid">
                    <div class="thankyou-step-item">
                        <div class="thankyou-step-number">1</div>
                        <p><strong>Revisión de perfil:</strong> Un asesor selecciona las mejores opciones según tu presupuesto y zona de interés.</p>
                    </div>
                    <div class="thankyou-step-item">
                        <div class="thankyou-step-number">2</div>
                        <p><strong>Envío de información:</strong> Te enviamos planos, lista de precios actualizados y facilidades de financiamiento.</p>
                    </div>
                    <div class="thankyou-step-item">
                        <div class="thankyou-step-number">3</div>
                        <p><strong>Visita guiada:</strong> Coordinamos una visita presencial y gratuita al terreno o propiedad que más te guste.</p>
                    </div>
                </div>
            </div>

            <!-- Accesos rápidos a catálogos -->
            <div style="margin-top:2.5rem;padding-top:2rem;border-top:1px solid #e2e8f0;">
                <p style="margin:0 0 1rem;font-weight:600;color:var(--main-color);font-size:0.95rem;">Mientras tanto, continúa explorando nuestro catálogo:</p>
                <div style="display:flex;justify-content:center;gap:0.75rem;flex-wrap:wrap;">
                    <a href="/terrenos" class="button secondary" style="margin:0;padding:0.5rem 1.2rem;font-size:0.85rem;"><i class="flaticon-land-1"></i> Terrenos</a>
                    <a href="/casas" class="button secondary" style="margin:0;padding:0.5rem 1.2rem;font-size:0.85rem;"><i class="flaticon-house"></i> Casas</a>
                    <a href="/departamentos" class="button secondary" style="margin:0;padding:0.5rem 1.2rem;font-size:0.85rem;"><i class="flaticon-building"></i> Departamentos</a>
                    <a href="/alquiler" class="button secondary" style="margin:0;padding:0.5rem 1.2rem;font-size:0.85rem;"><i class="ri-key-2-line"></i> Alquiler</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
