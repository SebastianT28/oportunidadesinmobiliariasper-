<?php
/**
 * Componente: Formulario de contacto / captura de lead.
 * Variables opcionales:
 *   $form_proyecto — nombre del proyecto (pre-llena el select)
 *   $form_titulo   — título del formulario
 */
$form_titulo   = $form_titulo ?? 'Solicita información';
$form_proyecto = $form_proyecto ?? '';
?>
<div class="contact-form-wrap">
    <h4 class="contact-form__titulo"><?= htmlspecialchars($form_titulo) ?></h4>
    <p class="contact-form__sub">Un asesor se comunicará contigo en menos de 24 horas.</p>
    <form class="contact-form" id="form-lead" action="" method="POST" novalidate>
        <input type="hidden" name="proyecto" value="<?= htmlspecialchars($form_proyecto) ?>">
        <div class="form-input">
            <input type="text" name="nombre" id="lead-nombre" placeholder=" " required>
            <label for="lead-nombre">Nombres y apellidos *</label>
        </div>
        <div class="form-input">
            <input type="tel" name="celular" id="lead-celular" placeholder=" " required pattern="[0-9]{9}">
            <label for="lead-celular">Celular *</label>
        </div>
        <div class="form-input">
            <input type="email" name="email" id="lead-email" placeholder=" ">
            <label for="lead-email">Correo electrónico</label>
        </div>
        <div class="form-input">
            <select name="interes" id="lead-interes">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="terreno" <?= $form_proyecto === 'terreno' ? 'selected' : '' ?>>Terreno</option>
                <option value="casa" <?= $form_proyecto === 'casa' ? 'selected' : '' ?>>Casa</option>
                <option value="departamento" <?= $form_proyecto === 'departamento' ? 'selected' : '' ?>>Departamento</option>
                <option value="alquiler">Alquiler</option>
            </select>
            <label for="lead-interes">Me interesa</label>
        </div>
        <div class="form-input">
            <textarea name="mensaje" id="lead-mensaje" rows="3" placeholder=" "></textarea>
            <label for="lead-mensaje">Mensaje (opcional)</label>
        </div>
        <button type="submit" class="button primary w-full" id="btn-lead-submit">
            Enviar solicitud <i class="ri-send-plane-line"></i>
        </button>
    </form>
    <a href="https://api.whatsapp.com/send?phone=51999653412&text=Hola,%20quiero%20información%20sobre%20<?= urlencode($form_proyecto ?: 'sus proyectos') ?>"
       target="_blank" rel="noopener" class="btn-whatsapp-form">
        <i class="flaticon-whatsapp"></i> O escríbenos directo por WhatsApp
    </a>
</div>
