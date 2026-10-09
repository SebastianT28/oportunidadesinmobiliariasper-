<?php
/**
 * Data layer — Artículos y Novedades del sector inmobiliario.
 * Oportunidades Inmobiliarias Perú.
 */

$articulos = [
    [
        'id'             => 'protege-tu-hogar-lluvias',
        'slug'           => 'protege-tu-hogar-lluvias',
        'titulo'         => 'Protege tu hogar ante la llegada de lluvias en Arequipa',
        'categoria'      => 'Calidad de vida',
        'categoria_slug' => 'calidad-de-vida',
        'fecha'          => '20 de Enero, 2026',
        'fecha_iso'      => '2026-01-20',
        'tiempo_lectura' => '4 min',
        'autor'          => 'Equipo Oportunidades',
        'autor_cargo'    => 'Especialistas en Urbanismo',
        'imagen'         => 'img/sections/bg_about_alt.webp',
        'destacado'      => true,
        'resumen'        => 'Conoce las recomendaciones clave para preparar techos, muros y drenajes antes de la temporada de precipitaciones en la Ciudad Blanca.',
        'contenido'      => '
            <p class="article-lead">Cada año, la temporada de lluvias en Arequipa pone a prueba la solidez y el mantenimiento de nuestras viviendas. Tanto si ya vives en tu casa propia como si estás planificando la construcción en tu lote, tomar medidas preventivas a tiempo te ahorrará costosas reparaciones y protegerá el bienestar de tu familia.</p>

            <h2>1. Impermeabilización de techos y azoteas</h2>
            <p>La radiación solar intensa de Arequipa durante el año suele resecar las capas impermeabilizantes tradicionales. Antes de que inicien las lluvias más fuertes entre enero y marzo, es fundamental inspeccionar la superficie de tu techo:</p>
            <ul>
                <li>Limpia a fondo polvo, hojas y sedimentos acumulados.</li>
                <li>Identifica grietas o fisuras y séllalas con masilla elastomérica o brea especial para construcción.</li>
                <li>Aplica una capa de pintura impermeabilizante reflectiva para prolongar la durabilidad del sellado.</li>
            </ul>

            <div class="callout-tip">
                <i class="ri-lightbulb-line"></i>
                <div>
                    <strong>Consejo de obra:</strong> Asegúrate de que las pendientes hacia los sumideros tengan un mínimo del 1.5% de inclinación para evitar el empozamiento de agua, la causa número uno de filtraciones.
                </div>
            </div>

            <h2>2. Limpieza de canaletas y bajantes pluviales</h2>
            <p>Las canaletas obstruidas pueden provocar desbordamientos hacia las paredes exteriores, deteriorando el enlucido y provocando humedades por capilaridad en el interior del inmueble.</p>
            <p>Revisa que las abrazaderas de las tuberías PVC de desagüe pluvial estén firmes y no presenten fisuras. Si tu lote está ubicado en zonas campestres como Chiguata o La Joya, limpia con mayor frecuencia debido al polvo y hojas secas arrastradas por el viento.</p>

            <h2>3. Pendientes perimetrales en terrenos y patios</h2>
            <p>Si adquiriste un lote y aún no construyes, o tienes patios amplios de tierra o gravilla, verifica que el terreno circundante tenga una ligera caída hacia las vías públicas o drenajes naturales. Esto evita que el agua se acumule cerca de las cimentaciones o muros medianeros.</p>

            <blockquote>
                "La prevención estructural cuesta hasta un 80% menos que reparar daños provocados por humedad y filtraciones en cimientos."
            </blockquote>

            <h2>4. Protección del sistema eléctrico exterior</h2>
            <p>Verifica que los tomacorrientes y luminarias de patios, jardines y fachadas cuenten con protección estanca (clasificación IP65 o superior). Los cables expuestos o cajas de pase sin tapa hermética representan un grave riesgo de cortocircuito durante tormentas eléctricas.</p>

            <h2>¿Estás buscando un lote en una urbanización segura?</h2>
            <p>En <strong>Oportunidades Inmobiliarias Perú</strong> desarrollamos proyectos con habilitación urbana planificada, que incluyen pistas asfaltadas, canalizaciones pluviales y redes de desagüe aprobadas para garantizar tu tranquilidad en cualquier época del año.</p>
        ',
        'tags'           => ['Mantenimiento', 'Lluvias Arequipa', 'Construcción', 'Consejos'],
    ],
    [
        'id'             => 'mejores-zonas-aire-puro-arequipa',
        'slug'           => 'mejores-zonas-aire-puro-arequipa',
        'titulo'         => 'Las mejores zonas para comprar terrenos y respirar aire puro en Arequipa',
        'categoria'      => 'Inversión',
        'categoria_slug' => 'inversion',
        'fecha'          => '12 de Febrero, 2026',
        'fecha_iso'      => '2026-02-12',
        'tiempo_lectura' => '5 min',
        'autor'          => 'Carlos Mamani',
        'autor_cargo'    => 'Asesor Comercial Senior',
        'imagen'         => 'img/proyectos/villa.webp',
        'destacado'      => false,
        'resumen'        => 'Descubre por qué distritos como Chiguata, La Joya y Sachaca se han convertido en los polos favoritos de familias que buscan tranquilidad y alta plusvalía.',
        'contenido'      => '
            <p class="article-lead">El crecimiento urbano del centro de Arequipa ha llevado a muchas familias e inversionistas a mirar hacia la periferia natural. Respirar aire puro, disfrutar de amplios cielos despejados y contar con espacio verde se ha convertido en la máxima prioridad residencial.</p>

            <h2>1. Chiguata: El encanto andino a minutos de la ciudad</h2>
            <p>Ubicada a las faldas del volcán Pichu Pichu y a tan solo 30 minutos del Cercado, Chiguata combina una atmósfera campestre inigualable con un microclima fresco y saludable. Proyectos residenciales como <strong>Villa Victoria</strong> ofrecen lotes planos con acceso vehicular directo, agua, luz y vistas privilegiadas al valle.</p>
            <ul>
                <li>Excelente calidad de aire libre de polución vehicular.</li>
                <li>Plusvalía proyectada superior al 18% anual.</li>
                <li>Ideal para casas de campo o primera vivienda de descanso.</li>
            </ul>

            <h2>2. La Joya: Sol todo el año y proyección económica</h2>
            <p>La Joya se consolida como el eje de expansión agroindustrial y residencial más dinámico del sur del Perú. Con más de 300 días de sol al año y temperaturas cálidas constantes, zonas como San Isidro albergan desarrollos como <strong>Valle Sol</strong> y <strong>Portales La Joya</strong>.</p>

            <div class="callout-tip">
                <i class="ri-sun-line"></i>
                <div>
                    <strong>Ventaja climática:</strong> La Joya es perfecta para familias que buscan alejarse del frío invierno arequipeño y disfrutar de piscinas, jardines frutales y actividades al aire libre.
                </div>
            </div>

            <h2>3. Sachaca y Cerro Colorado: Conectividad y servicios</h2>
            <p>Para quienes necesitan estar a corta distancia de colegios, centros comerciales y clínicas, Sachaca y las partes altas de Cerro Colorado representan el equilibrio ideal entre vegetación tradicional y servicios modernos de primer nivel.</p>

            <h2>Conclusión: ¿Cuál es la mejor opción para ti?</h2>
            <p>Si priorizas sol y calidez, La Joya es insuperable. Si buscas naturaleza andina, tranquilidad y cercanía, Chiguata es tu mejor alternativa. En cualquiera de los casos, adquirir tu terreno en una etapa temprana de preventa maximiza el retorno de tu inversión.</p>
        ',
        'tags'           => ['Chiguata', 'La Joya', 'Terrenos Arequipa', 'Plusvalía'],
    ],
    [
        'id'             => 'donde-comprar-futuro-hogar',
        'slug'           => 'donde-comprar-futuro-hogar',
        'titulo'         => '¿Dónde comprar mi futuro hogar? Guía práctica para elegir entre lote o casa construida',
        'categoria'      => 'Guía de compra',
        'categoria_slug' => 'guia-de-compra',
        'fecha'          => '28 de Febrero, 2026',
        'fecha_iso'      => '2026-02-28',
        'tiempo_lectura' => '6 min',
        'autor'          => 'María Elena Quispe',
        'autor_cargo'    => 'Coordinadora de Proyectos',
        'imagen'         => 'img/sections/bg_about_new.webp',
        'destacado'      => false,
        'resumen'        => 'Analizamos costos, tiempos de entrega, libertad de diseño y opciones de financiamiento para tomar la decisión correcta para tu familia.',
        'contenido'      => '
            <p class="article-lead">Elegir entre comprar un terreno para edificar a tu propio ritmo o adquirir una casa ya construida lista para mudarse es una de las decisiones financieras más importantes de tu vida. Aquí desglosamos las ventajas y consideraciones de cada alternativa.</p>

            <h2>Ventajas de comprar un lote de terreno</h2>
            <p>Adquirir un lote en una urbanización planificada te otorga máxima flexibilidad financiera y arquitectónica:</p>
            <ul>
                <li><strong>Menor inversión inicial:</strong> Puedes iniciar con una cuota inicial accesible (desde S/ 250 a S/ 500) y pagar cuotas mensuales fijas sin intereses bancarios abusivos.</li>
                <li><strong>Diseño 100% personalizado:</strong> Tú decides el número de pisos, la distribución de los dormitorios, el jardín y los acabados según el crecimiento de tu familia.</li>
                <li><strong>Construcción por etapas:</strong> Construye el primer piso cuando tu presupuesto lo permita, sin la presión de un crédito hipotecario a 20 o 30 años.</li>
            </ul>

            <h2>Ventajas de adquirir una casa terminada</h2>
            <p>Si la prioridad inmediata es mudarse sin lidiar con trámites municipales de construcción, licencias ni albañilería, una casa lista como las de <strong>Las Lomas I</strong> o <strong>Praderas El Olivar</strong> ofrece:</p>
            <ul>
                <li>Disponibilidad inmediata para habitar.</li>
                <li>Ahorro inmediato en pago de alquileres mensuales.</li>
                <li>Acabados completos y garantía de la empresa constructora.</li>
            </ul>

            <blockquote>
                "El 65% de las familias en Arequipa prefieren iniciar comprando un terreno con financiamiento directo para luego construir a su propio gusto y ritmo."
            </blockquote>

            <h2>Tabla comparativa de decisión</h2>
            <p>Evalúa estos factores clave antes de decidir:</p>
            <ul>
                <li><strong>Presupuesto inicial:</strong> Terreno (Bajo) vs Casa (Medio/Alto).</li>
                <li><strong>Tiempo hasta mudanza:</strong> Terreno (6 a 24 meses) vs Casa (Inmediato o entrega programada).</li>
                <li><strong>Flexibilidad de financiamiento:</strong> Con Oportunidades Inmobiliarias accedes a crédito directo sin evaluación crediticia en bancos.</li>
            </ul>
        ',
        'tags'           => ['Guía de compra', 'Casa vs Terreno', 'Financiamiento', 'Hogar'],
    ],
    [
        'id'             => 'invertir-bienes-raices-2026',
        'slug'           => 'invertir-bienes-raices-2026',
        'titulo'         => 'Cuida el futuro de tu familia: Beneficios de invertir en bienes raíces este 2026',
        'categoria'      => 'Inversión',
        'categoria_slug' => 'inversion',
        'fecha'          => '10 de Marzo, 2026',
        'fecha_iso'      => '2026-03-10',
        'tiempo_lectura' => '5 min',
        'autor'          => 'Carlos Mamani',
        'autor_cargo'    => 'Asesor Comercial Senior',
        'imagen'         => 'img/proyectos/vallesol.webp',
        'destacado'      => false,
        'resumen'        => 'Por qué la tierra y la propiedad inmobiliaria continúan siendo el activo refugio más seguro frente a la volatilidad económica y la inflación.',
        'contenido'      => '
            <p class="article-lead">En épocas de incertidumbre económica global o fluctuaciones en la moneda, el ladrillo y la tierra han demostrado históricamente ser el mejor escudo patrimonial para las familias peruanas.</p>

            <h2>1. Protección real contra la inflación</h2>
            <p>El dinero en una cuenta bancaria pierde poder adquisitivo año tras año debido al incremento en el costo de vida. En contraste, los bienes inmuebles en zonas en desarrollo en Arequipa tienden a revalorizarse por encima de la tasa de inflación anual promedio.</p>

            <h2>2. La tierra es un recurso finito</h2>
            <p>No se puede fabricar más tierra. Conforme la población de Arequipa y sus distritos continúa en ascenso, los terrenos bien ubicados con acceso a vías principales se vuelven cada vez más escasos y cotizados.</p>

            <div class="callout-tip">
                <i class="ri-shield-check-line"></i>
                <div>
                    <strong>Patrimonio heredable:</strong> Una propiedad inmobiliaria inscrita con documentación clara es el legado más sólido y seguro que puedes dejar a tus hijos.
                </div>
            </div>

            <h2>3. Rentabilidad dual: Plusvalía y renta</h2>
            <p>Invertir en una propiedad te permite ganar por dos vías simultáneas:</p>
            <ul>
                <li><strong>Apreciación del valor:</strong> Conforme la urbanización madura y se asfaltan las vías, el precio por metro cuadrado sube.</li>
                <li><strong>Generación de ingresos:</strong> Puedes construir módulos para alquiler, negocio local o alquiler vacacional en plataformas digitales.</li>
            </ul>

            <h2>Comienza hoy mismo con cuotas desde S/ 120 al mes</h2>
            <p>No necesitas ser un gran empresario para ser dueño de una propiedad. Nuestros planes de pago están diseñados para adaptarse a la economía familiar peruana, con cuotas fijas y facilidades reales.</p>
        ',
        'tags'           => ['Inversión', 'Finanzas Familiares', 'Patrimonio', 'Arequipa'],
    ],
    [
        'id'             => 'habilitacion-urbana-titulo-propiedad',
        'slug'           => 'habilitacion-urbana-titulo-propiedad',
        'titulo'         => 'Habilitación urbana y título en SUNARP: Lo que debes revisar antes de comprar un lote',
        'categoria'      => 'Legal y seguridad',
        'categoria_slug' => 'legal-y-seguridad',
        'fecha'          => '25 de Marzo, 2026',
        'fecha_iso'      => '2026-03-25',
        'tiempo_lectura' => '7 min',
        'autor'          => 'Equipo Oportunidades',
        'autor_cargo'    => 'Área Legal y Notarial',
        'imagen'         => 'img/sections/bg_about.webp',
        'destacado'      => false,
        'resumen'        => 'Guía paso a paso para verificar la legalidad de un proyecto inmobiliario, la partida registral en SUNARP y evitar estafas en la compra de terrenos.',
        'contenido'      => '
            <p class="article-lead">Comprar un terreno es una inversión emocionante, pero exige prudencia y verificación legal rigurosa. A continuación, te compartimos los documentos indispensables que toda empresa formal debe poner a tu disposición antes de concretar una compra.</p>

            <h2>1. ¿Qué es la Habilitación Urbana?</h2>
            <p>La Habilitación Urbana es el proceso técnico y legal mediante el cual un terreno rústico o eriazo se convierte en suelo urbano apto para vivienda. Implica la aprobación de:</p>
            <ul>
                <li>Trazado de vías públicas, pistas y veredas según el plan director municipal.</li>
                <li>Aportes reglamentarios para parques, colegios y otros servicios públicos.</li>
                <li>Factibilidad de servicios básicos: agua potable, red de alcantarillado y energía eléctrica domiciliaria.</li>
            </ul>

            <h2>2. La Partida Registral en SUNARP</h2>
            <p>La Partida Electrónica es el "DNI" del inmueble en la Superintendencia Nacional de los Registros Públicos (SUNARP). Antes de entregar cualquier pago:</p>
            <ul>
                <li>Solicita una Copia Literal o Certificado de Búsqueda Catastral actualizado.</li>
                <li>Verifica quién es el titular registral y confirma que no existan gravámenes, embargos o procesos judiciales pendientes.</li>
                <li>Constata que quien te vende cuente con facultades notariales vigentes inscritas en el Registro de Personas Jurídicas.</li>
            </ul>

            <div class="callout-tip">
                <i class="ri-file-shield-line"></i>
                <div>
                    <strong>Transparencia total:</strong> En Oportunidades Inmobiliarias Perú entregamos a cada cliente el expediente legal completo y asesoría notarial durante todo el proceso de firma de contrato.
                </div>
            </div>

            <h2>3. El contrato de compraventa y formalización notarial</h2>
            <p>Todo acuerdo debe quedar plasmado en un contrato claro donde se especifique el lote exacto, manzana, metraje perimétrico, precio total pactado, cronograma de cuotas y plazos de entrega de las obras de urbanización.</p>

            <blockquote>
                "Comprar formalmente garantiza que el patrimonio de tu familia esté legalmente blindado desde el primer día."
            </blockquote>

            <h2>¿Quieres asesoría gratuita para revisar un proyecto?</h2>
            <p>Nuestros asesores están disponibles para resolver cualquier duda legal o técnica sobre nuestros proyectos en Chiguata, La Joya o Cerro Colorado. Contáctanos sin compromiso.</p>
        ',
        'tags'           => ['SUNARP', 'Habilitación Urbana', 'Seguridad Jurídica', 'Trámites'],
    ],
];

/**
 * Busca un artículo por su slug.
 */
function findArticle(string $slug): ?array {
    global $articulos;
    foreach ($articulos as $art) {
        if ($art['slug'] === $slug) {
            return $art;
        }
    }
    return null;
}

/**
 * Retorna los artículos más recientes excluyendo el actual.
 */
function recentArticles(string $currentSlug = '', int $limit = 3): array {
    global $articulos;
    $filtered = array_filter($articulos, fn($art) => $art['slug'] !== $currentSlug);
    return array_slice($filtered, 0, $limit);
}

/**
 * Retorna artículos filtrados opcionalmente por categoría.
 */
function getArticlesByCategory(?string $categoria = null): array {
    global $articulos;
    if (!$categoria || $categoria === 'todos') {
        return $articulos;
    }
    return array_values(array_filter($articulos, fn($art) => $art['categoria_slug'] === $categoria));
}
