<footer class="main-footer bg-light">
    <div class="pd2"></div>
    <div class="footer l-container">
        <div class="footer-column br-footer">
            <a href="/"><img src="/img/logo.webp" alt="Oportunidades Inmobiliarias Perú" width="200" height="45"></a>
            <div class="divider-footer"></div>
            <p>Nos preocupamos por la ubicación de tu próximo hogar, por ello tenemos los mejores proyectos residenciales en desarrollo en Arequipa.</p>
            <div class="social-footer">
                <a href="javascript:void(0)" title="Instagram (Próximamente)"><i class="flaticon-instagram"></i></a>
                <a href="javascript:void(0)" title="Facebook (Próximamente)"><i class="flaticon-facebook"></i></a>
                <a href="https://wa.me/51999653412" target="_blank" rel="noopener" title="Contáctanos por WhatsApp"><i class="flaticon-whatsapp"></i></a>
                <a href="javascript:void(0)" title="TikTok (Próximamente)"><i class="flaticon-tik-tok"></i></a>
                <a href="javascript:void(0)" title="LinkedIn (Próximamente)"><i class="flaticon-linkedin"></i></a>
            </div>
            <div class="pd1"></div>
        </div>
        <div class="footer-column">
            <div class="footer">
                <div class="footer-column">
            <h3>Enlaces de interés</h3>
                <ul class="list-check">
                    <li><a href="/nosotros" style="color:inherit;text-decoration:none;">Acerca de nosotros</a></li>
                    <li><a href="/terrenos" style="color:inherit;text-decoration:none;">Terrenos en Arequipa</a></li>
                    <li><a href="/casas" style="color:inherit;text-decoration:none;">Casas residenciales</a></li>
                    <li><a href="/departamentos" style="color:inherit;text-decoration:none;">Departamentos en preventa</a></li>
                    <li><a href="/alquiler" style="color:inherit;text-decoration:none;">Propiedades en alquiler</a></li>
                    <li><a href="/novedades" style="color:inherit;text-decoration:none;">Novedades y Guías</a></li>
                    <li><a href="/contacto" style="color:inherit;text-decoration:none;">Contacto y Asesoría</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contáctanos</h3>
                <div class="icon-footer">
                    <i class="flaticon-office"></i>
                    <p>Av. Arequipa #1477 &mdash; Arequipa, Perú</p>
                </div>
                <div class="icon-footer">
                    <i class="flaticon-email"></i>
                    <p><a href="mailto:info@oportunidadesinmobiliariasperu.com" style="color:inherit;text-decoration:none;">info@oportunidadesinmobiliariasperu.com</a></p>
                </div>
                <div class="icon-footer">
                    <i class="flaticon-phone-call"></i>
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

<div class="infopopup cd-popup" role="alert">
  <div class="cd-popup-container cd-popup-video">
    <div class="embed-container">
      <iframe class="ytvideo" src="https://www.youtube.com/embed/2x4riYPipZU?controls=0&rel=0&hd=1&showinfo=0&enablejsapi=1" frameborder="0" controls="0" allowfullscreen loading="lazy"></iframe>
    </div>
    <a href="#0" class="cd-popup-close img-replace" title="Cerrar Video" alt="Cerrar Video">Cerrar</a>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js' defer></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js' defer></script>
<script src="/js/index2jk2j2.js?v=0.0.6" defer></script>
<script src="/js/sweetalert.min.js" defer></script>
<script src="/js/tab.js" defer></script>

<!-- Banner Cookie Consent -->
<div id="cookie-consent-banner" class="cookie-banner" style="display:none;" role="dialog" aria-live="polite" aria-label="Aviso de Cookies">
    <div class="cookie-banner__inner l-container">
        <div class="cookie-banner__content">
            <div class="cookie-banner__icon">
                <i class="ri-shield-check-line"></i>
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
    // ── 1. Manejo de Cookie Consent ──────────────────────────
    var cookieConsent = localStorage.getItem('oip_cookie_consent');
    var banner = document.getElementById('cookie-consent-banner');
    if (!cookieConsent && banner) {
        setTimeout(function() {
            banner.style.display = 'block';
        }, 600);
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

    // ── 2. Evento de conversión WhatsApp para Google Tag Manager ─
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
