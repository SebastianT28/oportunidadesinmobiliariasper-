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
    'en-venta'        => ['label' => 'En venta',       'class' => 'badge--venta'],
    'en-construccion' => ['label' => 'En construcción', 'class' => 'badge--construccion'],
    'entregado'       => ['label' => 'Entregado',       'class' => 'badge--entregado'],
    'reservado'       => ['label' => 'Reservado',       'class' => 'badge--reservado'],
    'disponible'      => ['label' => 'Disponible',      'class' => 'badge--venta'],
];
$estadoInfo = $estadoLabels[$prop['estado']] ?? ['label' => $prop['estado'], 'class' => ''];
$rutaDetalle = '/' . ltrim($prop['categoria'] . '/' . $prop['slug'], '/');
$imagen = '/' . ltrim($prop['imagenes'][0] ?? 'img/proyectos/villa.webp', '/');
$precioFormato = number_format($prop['precio'], 0, '.', ',');
?>
<article class="prop-card <?= $prop['destacado'] ? 'prop-card--destacado' : '' ?> reveal-card"
         data-id="<?= htmlspecialchars($prop['id'] ?? '') ?>"
         data-precio="<?= (float)($prop['precio'] ?? 0) ?>"
         data-estado="<?= htmlspecialchars($prop['estado'] ?? '') ?>"
         data-dorm="<?= (int)($prop['dormitorios'] ?? 0) ?>"
         data-banos="<?= (int)($prop['banos'] ?? 0) ?>"
         data-area-min="<?= (float)($prop['area_min'] ?? 0) ?>"
         data-area-max="<?= (float)($prop['area_max'] ?? ($prop['area_min'] ?? 0)) ?>"
         data-ubicacion="<?= htmlspecialchars(strtolower($prop['ubicacion'] ?? '')) ?>"
         data-tipo="<?= htmlspecialchars(strtolower($prop['tipo'] ?? ($prop['categoria'] ?? ''))) ?>">
    <a href="<?= $rutaDetalle ?>" class="prop-card__link" title="<?= htmlspecialchars($prop['nombre']) ?>">
        <div class="prop-card__img">
            <img src="<?= $imagen ?>" 
                 alt="<?= htmlspecialchars($prop['nombre']) ?> - <?= htmlspecialchars($prop['ubicacion']) ?>"
                 width="400" height="260"
                 loading="lazy" decoding="async">
            <?php if ($prop['destacado']): ?>
            <span class="prop-card__badge prop-card__badge--top">⭐ Destacado</span>
            <?php endif; ?>
            <span class="prop-card__badge prop-card__badge--estado <?= $estadoInfo['class'] ?>">
                <?= $estadoInfo['label'] ?>
            </span>
            <?php if ($prop['estado'] === 'reservado'): ?>
            <div class="prop-card__reservado-overlay"><span>Reservado</span></div>
            <?php endif; ?>
            <div class="prop-card__tag <?= htmlspecialchars($prop['tag_class']) ?>">
                <?= htmlspecialchars($prop['tag']) ?>
            </div>
        </div>
        <div class="prop-card__body">
            <h3 class="prop-card__nombre"><?= htmlspecialchars($prop['nombre']) ?></h3>
            <p class="prop-card__ubicacion">
                <i class="flaticon-location-pin"></i> <?= htmlspecialchars($prop['ubicacion']) ?>
            </p>
            <div class="prop-card__stats">
                <?php if (!empty($prop['area_min'])): ?>
                <span class="prop-card__stat">
                    <i class="ri-layout-2-line"></i>
                    <?= $prop['area_min'] ?>
                    <?= isset($prop['area_max']) ? '–' . $prop['area_max'] : '' ?> m²
                </span>
                <?php endif; ?>
                <?php if (!empty($prop['dormitorios'])): ?>
                <span class="prop-card__stat">
                    <i class="ri-hotel-bed-line"></i> <?= $prop['dormitorios'] ?> dorm.
                </span>
                <?php endif; ?>
                <?php if (!empty($prop['banos'])): ?>
                <span class="prop-card__stat">
                    <i class="flaticon-bathtub"></i> <?= $prop['banos'] ?> baño<?= $prop['banos'] > 1 ? 's' : '' ?>
                </span>
                <?php endif; ?>
            </div>
            <div class="prop-card__precio">
                <span class="prop-card__desde">desde</span>
                <strong><?= $prop['moneda'] ?> <?= $precioFormato ?></strong>
                <?php if (!empty($prop['precio_usd'])): ?>
                <small>/ $<?= number_format($prop['precio_usd'], 0, '.', ',') ?> USD</small>
                <?php endif; ?>
            </div>
            <?php if (!empty($prop['cuota'])): ?>
            <p class="prop-card__cuota">Cuota desde S/ <?= number_format($prop['cuota'], 0) ?>/mes</p>
            <?php endif; ?>
        </div>
        <div class="prop-card__footer">
            <span class="prop-card__cta">Ver proyecto <i class="ri-arrow-right-line"></i></span>
        </div>
    </a>
</article>
