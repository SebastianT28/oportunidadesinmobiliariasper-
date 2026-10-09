<?php
$page        = 'Contacto y Asesoría Inmobiliaria en Arequipa | Oportunidades Inmobiliarias Perú';
$description = 'Ponte en contacto con nuestros asesores inmobiliarios en Arequipa. Cotiza terrenos, casas, departamentos o publica tu propiedad. Escríbenos por WhatsApp o déjanos un mensaje.';
$canonical   = 'https://oportunidadesinmobiliariasperu.com/contacto';
$og_image    = 'https://oportunidadesinmobiliariasperu.com/img/sections/bg_contact.webp';

// Procesamiento de formulario de contacto
$form_error = '';
$form_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Honeypot antispam
    $honeypot = trim($_POST['empresa_hp'] ?? '');
    if (!empty($honeypot)) {
        header('Location: /gracias?origen=contacto');
        exit;
    }

    $nombre    = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
    $telefono  = trim(filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
    $email     = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
    $interes   = trim(filter_input(INPUT_POST, 'interes', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'Consulta general');
    $presupuesto = trim(filter_input(INPUT_POST, 'presupuesto', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
    $mensaje   = trim(filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
    $privacidad = isset($_POST['privacidad']);

    if (empty($nombre) || empty($telefono) || empty($email) || empty($mensaje)) {
        $form_error = 'Por favor completa todos los campos requeridos (*).';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = 'Por favor ingresa un correo electrónico válido.';
    } elseif (!$privacidad) {
        $form_error = 'Debes aceptar la política de privacidad para enviar el formulario.';
    } else {
        // Redirigir a página de gracias para registrar conversión en GA4/Ads
        header('Location: /gracias?origen=contacto&nombre=' . urlencode($nombre));
        exit;
    }
}

include_once 'header.php';
?>

<div class="catalog-hero" style="background-image: url('/img/sections/bg_contact.webp');">
    <div class="catalog-hero__overlay"></div>
    <div class="l-container catalog-hero__content">
        <nav class="breadcrumb">
            <a href="/">Inicio</a> <i class="ri-arrow-right-s-line"></i>
            <span>Contacto</span>
        </nav>
        <h1 class="catalog-hero__title">Contáctanos</h1>
        <p class="catalog-hero__sub">Asesoría inmobiliaria experta y personalizada para tu próximo proyecto o inversión en Arequipa.</p>
    </div>
</div>

<section class="contact-section-wrap">
    <div class="l-container">
        <div class="contact-grid-main">
            <!-- Formulario de Contacto -->
            <div class="contact-card-box">
                <div class="contact-card-box__head">
                    <p class="section-eyebrow" style="color:var(--main2-color);margin:0 0 0.4rem;font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Hablemos hoy</p>
                    <h2 class="contact-card-box__title">Envíanos un mensaje</h2>
                    <p class="contact-card-box__subtitle">Déjanos tus datos y un asesor especializado te responderá en menos de 30 minutos.</p>
                </div>

                <?php if (!empty($form_error)): ?>
                <div style="background:#fee2e2;border-left:4px solid #ef4444;color:#991b1b;padding:0.9rem 1.2rem;border-radius:6px;margin-bottom:1.5rem;font-size:0.92rem;">
                    <i class="ri-error-warning-line" style="vertical-align:middle;margin-right:0.3rem;"></i> <?php echo htmlspecialchars($form_error); ?>
                </div>
                <?php endif; ?>

                <form action="/contacto" method="POST" class="contact-form" autocomplete="on">
                    <!-- Campo trampa antispam -->
                    <div style="display:none !important; visibility:hidden !important;" aria-hidden="true">
                        <label for="empresa_hp">No llenar este campo:</label>
                        <input type="text" name="empresa_hp" id="empresa_hp" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-row-two">
                        <div class="form-field">
                            <label for="nombre">Nombre completo <span class="req">*</span></label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Pérez" required value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>">
                        </div>

                        <div class="form-field">
                            <label for="telefono">Teléfono / WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="telefono" name="telefono" placeholder="Ej. 999 653 412" required value="<?php echo htmlspecialchars($_POST['telefono'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="form-row-two">
                        <div class="form-field">
                            <label for="email">Correo electrónico <span class="req">*</span></label>
                            <input type="email" id="email" name="email" placeholder="tu.correo@ejemplo.com" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                        </div>

                        <div class="form-field">
                            <label for="interes">¿Qué tipo de propiedad buscas?</label>
                            <select id="interes" name="interes">
                                <option value="Terrenos">Terrenos en preventa</option>
                                <option value="Casas">Casas residenciales</option>
                                <option value="Departamentos">Departamentos en preventa / entrega inmediata</option>
                                <option value="Alquiler">Propiedades en alquiler</option>
                                <option value="Airbnb">Alojamiento temporal (Airbnb)</option>
                                <option value="Vender">Quiero vender o alquilar mi inmueble</option>
                                <option value="Otro">Otro tipo de consulta</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="presupuesto">Rango de presupuesto estimado (Opcional)</label>
                        <select id="presupuesto" name="presupuesto">
                            <option value="">Selecciona un rango (opcional)</option>
                            <option value="Menos de S/ 50,000">Menos de S/ 50,000</option>
                            <option value="S/ 50,000 - S/ 150,000">S/ 50,000 &mdash; S/ 150,000</option>
                            <option value="S/ 150,000 - S/ 300,000">S/ 150,000 &mdash; S/ 300,000</option>
                            <option value="Más de S/ 300,000">Más de S/ 300,000</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="mensaje">¿En qué podemos ayudarte? <span class="req">*</span></label>
                        <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntanos qué zona de Arequipa prefieres, metraje deseado, o si necesitas financiamiento..." required><?php echo htmlspecialchars($_POST['mensaje'] ?? ''); ?></textarea>
                    </div>

                    <label class="form-checkbox-label">
                        <input type="checkbox" name="privacidad" required checked>
                        <span>He leído y acepto la <a href="/politica-de-privacidad" target="_blank">Política de Privacidad</a> y los <a href="/terminos-y-condiciones" target="_blank">Términos y Condiciones</a>.</span>
                    </label>

                    <button type="submit" class="btn-submit-contact">
                        <i class="ri-send-plane-fill"></i> Enviar consulta ahora
                    </button>

                    <div class="contact-wa-divider">
                        <span>O SI PREFIERES ATENCIÓN INMEDIATA</span>
                    </div>

                    <a href="https://wa.me/51999653412?text=Hola%20Oportunidades%20Inmobiliarias%20Per%C3%BA,%20deseo%20asesor%C3%ADa%20personalizada%20sobre%20sus%20proyectos." target="_blank" rel="noopener" class="btn-whatsapp-direct">
                        <i class="flaticon-whatsapp"></i> Chatear por WhatsApp al 999 653 412
                    </a>
                </form>
            </div>

            <!-- Panel de Canales y Confianza -->
            <div class="contact-info-panel">
                <!-- Teléfono / WhatsApp -->
                <div class="contact-channel-card contact-channel-card--phone">
                    <div class="contact-channel-icon">
                        <i class="flaticon-whatsapp"></i>
                    </div>
                    <div class="contact-channel-info">
                        <h4>Teléfono y WhatsApp</h4>
                        <p>Atención directa de lunes a sábado</p>
                        <a href="https://wa.me/51999653412" target="_blank" rel="noopener">+51 999 653 412</a>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="contact-channel-card contact-channel-card--mail">
                    <div class="contact-channel-icon">
                        <i class="flaticon-email"></i>
                    </div>
                    <div class="contact-channel-info">
                        <h4>Correo Electrónico</h4>
                        <p>Para cotizaciones, propuestas y alianzas</p>
                        <a href="mailto:info@oportunidadesinmobiliariasperu.com">info@oportunidadesinmobiliariasperu.com</a>
                    </div>
                </div>

                <!-- Dirección Física -->
                <div class="contact-channel-card contact-channel-card--loc">
                    <div class="contact-channel-icon">
                        <i class="flaticon-office"></i>
                    </div>
                    <div class="contact-channel-info">
                        <h4>Oficina Comercial</h4>
                        <p>Av. Arequipa #1477 &mdash; Cercado, Arequipa</p>
                        <span style="display:block;margin-top:0.25rem;font-size:0.85rem;color:#64748b;">
                            <i class="ri-time-line"></i> Lun &mdash; Sáb: 8:30 am &mdash; 6:30 pm
                        </span>
                    </div>
                </div>

                <!-- Caja de Confianza / Respaldo -->
                <div class="contact-trust-box">
                    <h4>¿Por qué elegirnos?</h4>
                    <ul class="contact-trust-list">
                        <li>
                            <i class="ri-shield-check-fill"></i>
                            <span>Proyectos con habilitación urbana y títulos en SUNARP.</span>
                        </li>
                        <li>
                            <i class="ri-user-star-fill"></i>
                            <span>Asesoría personalizada y gratuita sin compromiso.</span>
                        </li>
                        <li>
                            <i class="ri-bank-card-fill"></i>
                            <span>Facilidades de financiamiento directo y bancario.</span>
                        </li>
                        <li>
                            <i class="ri-medal-fill"></i>
                            <span>Más de 5 años conectando familias en Arequipa.</span>
                        </li>
                    </ul>
                </div>

                <!-- Mapa de Ubicación -->
                <div class="contact-map-card">
                    <iframe 
                        title="Ubicación de Oportunidades Inmobiliarias Perú en Arequipa"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.4244249129524!2d-71.537451!3d-16.409047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a59fe027473%3A0xa19f9312f205b33e!2sArequipa%2C%20Peru!5e0!3m2!1ses!2spe!4v1700000000000!5m2!1ses!2spe" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="contact-map-card__footer">
                        <span><i class="ri-map-pin-line"></i> Arequipa, Perú</span>
                        <a href="https://maps.google.com/?q=Arequipa,Peru" target="_blank" rel="noopener">Ver en Google Maps &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>
