<?php
/**
 * Componente: Tarjeta de propiedad reutilizable.
 * Uso: include con $prop = array de propiedades
 *
 * Variables esperadas:
 *   $prop  — array de propiedad del data layer
 *   $base  — path base relativo (default '')
 */
$base = $base ?? '';
$estadoLabels = [
    'en-venta'        => ['label' => 'En venta',           'class' => 'badge--venta'],
    'preventa'        => ['label' => 'En preventa · Planos','class' => 'badge--preventa'],
    'en-construccion' => ['label' => 'En construcción',    'class' => 'badge--construccion'],
    'entregado'       => ['label' => 'En estreno',         'class' => 'badge--entregado'],
    'reservado'       => ['label' => 'Reservado',          'class' => 'badge--reservado'],
    'disponible'      => ['label' => 'Disponible',         'class' => 'badge--venta'],
];
$estadoInfo = $estadoLabels[$prop['estado']] ?? ['label' => $prop['estado'], 'class' => ''];
$rutaDetalle = '/' . ltrim($prop['categoria'] . '/' . $prop['slug'], '/');
$imagen = '/' . ltrim($prop['imagenes'][0] ?? 'img/proyectos/villa.webp', '/');
$precioFormato = number_format($prop['precio'], 0, '.', ',');

$distrito = !empty($prop['distrito_corto'])
    ? $prop['distrito_corto']
    : trim(explode(',', $prop['ubicacion'] ?? 'Arequipa')[0]);
$badgeEstadoTexto = (!empty($prop['entrega']) && ($prop['estado'] ?? '') === 'en-construccion')
    ? 'Entrega ' . $prop['entrega']
    : $estadoInfo['label'];

$specsList = [];
if (!empty($prop['dormitorios_rango'])) {
    $specsList[] = $prop['dormitorios_rango'] . ' Dorm';
} elseif (!empty($prop['dormitorios'])) {
    $specsList[] = (int)$prop['dormitorios'] . ' Dorm';
}
if (!empty($prop['banos_rango'])) {
    $specsList[] = $prop['banos_rango'] . ' Baños';
} elseif (!empty($prop['banos'])) {
    $b = (int)$prop['banos'];
    $specsList[] = $b . ' Baño' . ($b > 1 ? 's' : '');
}
if (!empty($prop['area_min'])) {
    $areaStr = $prop['area_min'];
    if (!empty($prop['area_max']) && $prop['area_max'] != $prop['area_min']) {
        $areaStr .= '–' . $prop['area_max'];
    }
    $specsList[] = $areaStr . ' m²';
}
$specsTexto = implode(' · ', $specsList);
$ctaLabel = (($prop['categoria'] ?? '') === 'departamentos') ? 'Ver depa' : 'Ver proyecto';
$dormsAttr = !empty($prop['dorms_disponibles'])
    ? implode(',', $prop['dorms_disponibles'])
    : (string)((int)($prop['dormitorios'] ?? 0));
$isEagerCard = !empty($card_eager);
?>
<article class="prop-card <?= !empty($prop['destacado']) ? 'prop-card--destacado' : '' ?> <?= $isEagerCard ? '' : 'reveal-card' ?>"
         data-id="<?= htmlspecialchars($prop['id'] ?? '') ?>"
         data-precio="<?= (float)($prop['precio'] ?? 0) ?>"
         data-estado="<?= htmlspecialchars($prop['estado'] ?? '') ?>"
         data-dorm="<?= (int)($prop['dormitorios'] ?? 0) ?>"
         data-dorms="<?= htmlspecialchars($dormsAttr) ?>"
         data-banos="<?= (int)($prop['banos'] ?? 0) ?>"
         data-area-min="<?= (float)($prop['area_min'] ?? 0) ?>"
         data-area-max="<?= (float)($prop['area_max'] ?? ($prop['area_min'] ?? 0)) ?>"
         data-ubicacion="<?= htmlspecialchars(strtolower($prop['ubicacion'] ?? '')) ?>"
         data-tipo="<?= htmlspecialchars(strtolower($prop['tipo'] ?? ($prop['categoria'] ?? ''))) ?>">
    <a href="<?= $rutaDetalle ?>" class="prop-card__link" title="<?= htmlspecialchars($prop['nombre']) ?>">
        <img src="<?= $imagen ?>"
             alt="<?= htmlspecialchars($prop['nombre']) ?> - <?= htmlspecialchars($prop['ubicacion']) ?>"
             class="prop-card__bg"
             width="420" height="360"
             loading="<?= $isEagerCard ? 'eager' : 'lazy' ?>" decoding="async">
        <div class="prop-card__overlay"></div>

        <?php if (($prop['estado'] ?? '') === 'reservado'): ?>
        <div class="prop-card__reservado-overlay"><span>Reservado</span></div>
        <?php endif; ?>

        <!-- Top: Distrito + 1 solo estado/entrega (sin duplicados) -->
        <div class="prop-card__top">
            <span class="prop-card__pill prop-card__pill--distrito">
                <?= htmlspecialchars($distrito) ?>
            </span>
            <span class="prop-card__pill prop-card__pill--estado <?= htmlspecialchars($estadoInfo['class']) ?>">
                <?= htmlspecialchars($badgeEstadoTexto) ?>
            </span>
        </div>

        <!-- Bottom: Título, Specs + Dock Flotante de Precio -->
        <div class="prop-card__bottom">
            <div class="prop-card__info">
                <h3 class="prop-card__nombre"><?= htmlspecialchars($prop['nombre']) ?></h3>
                <?php if ($specsTexto !== ''): ?>
                <p class="prop-card__specs"><?= htmlspecialchars($specsTexto) ?></p>
                <?php endif; ?>
            </div>

            <div class="prop-card__dock">
                <div class="prop-card__precio-wrap">
                    <span class="prop-card__desde">Desde</span>
                    <strong class="prop-card__precio-val"><?= htmlspecialchars($prop['moneda']) ?> <?= $precioFormato ?></strong>
                </div>
                <span class="prop-card__cta">
                    <?= $ctaLabel ?> <i class="ri-arrow-right-line"></i>
                </span>
            </div>
        </div>
    </a>
</article>
