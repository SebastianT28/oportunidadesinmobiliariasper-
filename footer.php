<footer class="main-footer bg-light">
    <div class="pd2"></div>
    <div class="footer l-container">
        <div class="footer-column br-footer">
            <a href="/"><img src="/img/logo.webp" alt="Oportunidades Inmobiliarias Perú" width="200" height="45" loading="lazy" decoding="async"></a>
            <div class="divider-footer"></div>
            <p>Especialistas en la venta de <strong>departamentos de estreno y en preventa en Arequipa</strong>. Edificios residenciales en Yanahuara, Cayma, Cercado y Cerro Colorado con independización en SUNARP y financiamiento directo o bancario.</p>
            <div class="social-footer">
                <span class="social-disabled" role="img" aria-label="Instagram (Próximamente)" title="Instagram (Próximamente)"><i class="flaticon-instagram" aria-hidden="true"></i></span>
                <span class="social-disabled" role="img" aria-label="Facebook (Próximamente)" title="Facebook (Próximamente)"><i class="flaticon-facebook" aria-hidden="true"></i></span>
                <a href="https://wa.me/51999653412" target="_blank" rel="noopener" aria-label="Contáctanos por WhatsApp" title="Contáctanos por WhatsApp"><i class="flaticon-whatsapp" aria-hidden="true"></i></a>
                <span class="social-disabled" role="img" aria-label="TikTok (Próximamente)" title="TikTok (Próximamente)"><i class="flaticon-tik-tok" aria-hidden="true"></i></span>
                <span class="social-disabled" role="img" aria-label="LinkedIn (Próximamente)" title="LinkedIn (Próximamente)"><i class="flaticon-linkedin" aria-hidden="true"></i></span>
            </div>
            <div class="pd1"></div>
        </div>
        <div class="footer-column">
            <div class="footer">
                <div class="footer-column">
            <h3>Enlaces de interés</h3>
                <ul class="list-check">
                    <li><a href="/departamentos" style="color:inherit;text-decoration:none;">Departamentos en Arequipa</a></li>
                    <li><a href="/departamentos?tab=estreno" style="color:inherit;text-decoration:none;">Proyectos en Estreno</a></li>
                    <li><a href="/departamentos?tab=preventa" style="color:inherit;text-decoration:none;">Proyectos en Preventa</a></li>
                    <li><a href="/nosotros" style="color:inherit;text-decoration:none;">Acerca de nosotros</a></li>
                    <li><a href="/novedades" style="color:inherit;text-decoration:none;">Novedades y Guías</a></li>
                    <li><a href="/contacto" style="color:inherit;text-decoration:none;">Contacto y Asesoría</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contáctanos</h3>
                <div class="icon-footer">
                    <i class="flaticon-office" aria-hidden="true"></i>
                    <p>Av. Arequipa #1477 &mdash; Arequipa, Perú</p>
                </div>
                <div class="icon-footer">
                    <i class="flaticon-email" aria-hidden="true"></i>
                    <p><a href="mailto:info@oportunidadesinmobiliariasperu.com" style="color:inherit;text-decoration:none;">info@oportunidadesinmobiliariasperu.com</a></p>
                </div>
                <div class="icon-footer">
                    <i class="flaticon-phone-call" aria-hidden="true"></i>
                    <p><a href="tel:999653412" style="color:inherit;text-decoration:none;">999 653 412</a></p>
                </div>
                <div style="margin-top:0.75rem;">
                    <a href="/contacto" class="button primary" style="padding:0.4rem 1rem;font-size:0.82rem;margin:0;display:inline-block;">Escríbenos</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="pd1"></div>
    <div class="copy f-container">
        <p style="margin:0">Copyright &copy; 2026 <b>Oportunidades Inmobiliarias Perú</b>. Todos los derechos reservados &mdash; <a href="/politica-de-privacidad" style="color:inherit;text-decoration:underline;">Política de Privacidad</a> &bull; <a href="/terminos-y-condiciones" style="color:inherit;text-decoration:underline;">Términos y Condiciones</a> &mdash; Desarrollado por <b>Sinopsis Marketing</b></p>
    </div>
</footer>

<?php if (!empty($use_jquery)): ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
<?php endif; ?>
<?php if (!empty($use_swiper)): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js" defer></script>
<?php endif; ?>
<?php if (!empty($use_gsap)): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js" defer></script>
<?php endif; ?>
<?php if (!empty($use_sweetalert)): ?>
<script src="/js/sweetalert.min.js" defer></script>
<?php endif; ?>
<?php if (!empty($use_tabs)): ?>
<script src="/js/tab.js" defer></script>
<?php endif; ?>
<script src="/js/index2jk2j2.js?v=0.1.0" defer></script>

<!-- Banner Cookie Consent -->
<div id="cookie-consent-banner" class="cookie-banner" style="display:none;" role="dialog" aria-live="polite" aria-label="Aviso de Cookies">
    <div class="cookie-banner__inner l-container">
        <div class="cookie-banner__content">
            <div class="cookie-banner__icon">
                <i class="ri-shield-check-line" aria-hidden="true"></i>
            </div>
            <div class="cookie-banner__text">
                <p><strong>Aviso de Privacidad y Cookies:</strong> En <strong>Oportunidades Inmobiliarias Perú</strong> utilizamos cookies técnicas y analíticas para optimizar tu experiencia y analizar las visitas a la web conforme a nuestra <a href="/politica-de-privacidad">Política de Privacidad</a>.</p>
            </div>
        </div>
        <div class="cookie-banner__actions">
            <button type="button" id="cookie-btn-accept" class="btn-cookie-accept">Aceptar todas</button>
            <button type="button" id="cookie-btn-reject" class="btn-cookie-reject">Solo necesarias</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var cookieConsent = localStorage.getItem('oip_cookie_consent');
    var banner = document.getElementById('cookie-consent-banner');
    if (!cookieConsent && banner) {
        setTimeout(function() {
            banner.style.display = 'block';
        }, 1200);
    }

    var btnAccept = document.getElementById('cookie-btn-accept');
    var btnReject = document.getElementById('cookie-btn-reject');

    if (btnAccept) {
        btnAccept.addEventListener('click', function() {
            localStorage.setItem('oip_cookie_consent', 'accepted');
            if (banner) banner.style.display = 'none';
        });
    }
    if (btnReject) {
        btnReject.addEventListener('click', function() {
            localStorage.setItem('oip_cookie_consent', 'essential');
            if (banner) banner.style.display = 'none';
        });
    }

    document.addEventListener('click', function(e) {
        var link = e.target.closest('a[href*="wa.me"], a[href*="whatsapp.com"], a[href*="api.whatsapp.com"], a[href^="whatsapp:"]');
        if (link) {
            var url = link.getAttribute('href') || 'WhatsApp';
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event': 'whatsapp_click',
                'conversion_category': 'Contacto',
                'conversion_action': 'Clic WhatsApp',
                'conversion_label': url,
                'link_url': url,
                'page_location': window.location.href
            });
            if (typeof gtag === 'function') {
                gtag('event', 'whatsapp_click', {
                    'event_category': 'Contacto',
                    'event_label': url,
                    'value': 1,
                    'transport_type': 'beacon'
                });
            }
        }
    });
});
</script>
