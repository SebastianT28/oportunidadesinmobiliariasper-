<?php
/**
 * Data layer — Alojamientos Airbnb · Arequipa, Perú.
 * Oportunidades Inmobiliarias Perú.
 */

$alojamientos = [
    [
        'id'               => 'depa-misti-yanahuara',
        'slug'             => 'depa-misti-yanahuara',
        'nombre'           => 'Depa con vista al Misti · Yanahuara',
        'tipo'             => 'departamento',
        'distrito'         => 'yanahuara',
        'direccion'        => 'Yanahuara, Arequipa',
        'precio_noche'     => 180,
        'moneda'           => 'S/',
        'rating'           => 4.9,
        'reviews'          => 47,
        'capacidad'        => 4,
        'dormitorios'      => 2,
        'banos'            => 1,
        'favorito'         => true,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/depa-yanahuara.webp',
        'imagenes'         => ['img/airbnb/depa-yanahuara.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/suite-miraflores.webp'],
        'descripcion'      => 'Luminoso departamento con terraza privada y vista directa al volcán Misti en el corazón de Yanahuara.',
        'descripcion_larga'=> 'Disfruta de una estadía única en este moderno departamento ubicado en Yanahuara, uno de los distritos más exclusivos de Arequipa. La terraza privada ofrece una vista panorámica inigualable al volcán Misti. El espacio cuenta con sala amoblada, cocina equipada, dos dormitorios cómodos y baño privado. A solo 10 minutos del centro histórico.',
        'amenidades'       => ['Wi-Fi 100 Mbps', 'Cocina equipada', 'TV Cable', 'Terraza privada', 'Agua caliente 24h', 'Seguridad'],
        'lat'              => -16.3950,
        'lng'              => -71.5400,
        'anfitrion'        => 'Carlos M.',
    ],
    [
        'id'               => 'suite-boutique-miraflores',
        'slug'             => 'suite-boutique-miraflores',
        'nombre'           => 'Suite Boutique Centro · Miraflores',
        'tipo'             => 'suite',
        'distrito'         => 'miraflores',
        'direccion'        => 'Miraflores, Arequipa',
        'precio_noche'     => 220,
        'moneda'           => 'S/',
        'rating'           => 4.8,
        'reviews'          => 62,
        'capacidad'        => 2,
        'dormitorios'      => 1,
        'banos'            => 1,
        'favorito'         => true,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/suite-miraflores.webp',
        'imagenes'         => ['img/airbnb/suite-miraflores.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/depa-yanahuara.webp'],
        'descripcion'      => 'Suite de diseño boutique en Miraflores. Perfecta para parejas o viajeros de negocios que buscan confort y elegancia.',
        'descripcion_larga'=> 'Una suite premium diseñada con atención al detalle en el bullicioso distrito de Miraflores. Incluye cama king size, baño de lujo con ducha italiana, minibar, escritorio de trabajo y una pequeña sala de estar. Desayuno disponible a pedido.',
        'amenidades'       => ['Wi-Fi de alta velocidad', 'Cama King', 'Desayuno opcional', 'Minibar', 'Escritorio trabajo', 'Ducha italiana'],
        'lat'              => -16.4100,
        'lng'              => -71.5300,
        'anfitrion'        => 'Ana R.',
    ],
    [
        'id'               => 'casa-familiar-cayma',
        'slug'             => 'casa-familiar-cayma',
        'nombre'           => 'Casa familiar con jardín · Cayma',
        'tipo'             => 'casa',
        'distrito'         => 'cayma',
        'direccion'        => 'Cayma, Arequipa',
        'precio_noche'     => 280,
        'moneda'           => 'S/',
        'rating'           => 4.7,
        'reviews'          => 29,
        'capacidad'        => 8,
        'dormitorios'      => 3,
        'banos'            => 2,
        'favorito'         => true,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/casa-cayma.webp',
        'imagenes'         => ['img/airbnb/casa-cayma.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/depa-yanahuara.webp'],
        'descripcion'      => 'Amplia casa con jardín y zona de parrilla en Cayma. Ideal para grupos familiares o reuniones de amigos.',
        'descripcion_larga'=> 'Casa de 3 dormitorios con amplio jardín privado y zona de parrilla. Perfecta para familias o grupos que visitan Arequipa. Cuenta con sala de estar grande, comedor para 8 personas, cocina completamente equipada y 2 baños. Estacionamiento incluido.',
        'amenidades'       => ['Wi-Fi', 'Jardín privado', 'Parrilla/BBQ', 'Estacionamiento', 'Cocina completa', 'Smart TV'],
        'lat'              => -16.3800,
        'lng'              => -71.5350,
        'anfitrion'        => 'Roberto H.',
    ],
    [
        'id'               => 'habitacion-privada-cercado',
        'slug'             => 'habitacion-privada-cercado',
        'nombre'           => 'Habitación privada · Centro Histórico',
        'tipo'             => 'habitacion',
        'distrito'         => 'cercado',
        'direccion'        => 'Cercado, Arequipa',
        'precio_noche'     => 95,
        'moneda'           => 'S/',
        'rating'           => 4.6,
        'reviews'          => 88,
        'capacidad'        => 2,
        'dormitorios'      => 1,
        'banos'            => 1,
        'favorito'         => false,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/suite-miraflores.webp',
        'imagenes'         => ['img/airbnb/suite-miraflores.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/depa-yanahuara.webp'],
        'descripcion'      => 'Habitación privada en el corazón del Centro Histórico de Arequipa. A pasos de la Plaza de Armas.',
        'descripcion_larga'=> 'Habitación privada y silenciosa a 3 cuadras de la Plaza de Armas. Ideal para viajeros que quieren explorar el centro a pie. Baño compartido de uso exclusivo. El anfitrión vive en el mismo inmueble y está disponible para orientarte.',
        'amenidades'       => ['Wi-Fi', 'Baño privado', 'Desayuno incluido', 'Ubicación céntrica', 'Agua caliente'],
        'lat'              => -16.4090,
        'lng'              => -71.5375,
        'anfitrion'        => 'María Q.',
    ],
    [
        'id'               => 'depa-moderno-sachaca',
        'slug'             => 'depa-moderno-sachaca',
        'nombre'           => 'Depa moderno tranquilo · Sachaca',
        'tipo'             => 'departamento',
        'distrito'         => 'sachaca',
        'direccion'        => 'Sachaca, Arequipa',
        'precio_noche'     => 150,
        'moneda'           => 'S/',
        'rating'           => 4.8,
        'reviews'          => 41,
        'capacidad'        => 4,
        'dormitorios'      => 2,
        'banos'            => 1,
        'favorito'         => true,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/depa-yanahuara.webp',
        'imagenes'         => ['img/airbnb/depa-yanahuara.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/casa-cayma.webp'],
        'descripcion'      => 'Departamento moderno en el tranquilo distrito de Sachaca, rodeado de vegetación y cerca a centros comerciales.',
        'descripcion_larga'=> 'Espacio ideal para descansar lejos del ruido de la ciudad. Sachaca es conocido por su vegetación y ambiente familiar. El departamento tiene 2 dormitorios, sala con Smart TV, cocina equipada y baño completo. Áreas verdes del edificio disponibles.',
        'amenidades'       => ['Wi-Fi', 'Smart TV', 'Cocina equipada', 'Áreas verdes', 'Parqueo', 'Lavandería'],
        'lat'              => -16.4250,
        'lng'              => -71.5600,
        'anfitrion'        => 'Luis P.',
    ],
    [
        'id'               => 'depa-ejecutivo-jose-bustamante',
        'slug'             => 'depa-ejecutivo-jose-bustamante',
        'nombre'           => 'Depa ejecutivo · José L. Bustamante',
        'tipo'             => 'departamento',
        'distrito'         => 'jose-bustamante',
        'direccion'        => 'J.L.B y Rivero, Arequipa',
        'precio_noche'     => 130,
        'moneda'           => 'S/',
        'rating'           => 4.5,
        'reviews'          => 33,
        'capacidad'        => 2,
        'dormitorios'      => 1,
        'banos'            => 1,
        'favorito'         => false,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/suite-miraflores.webp',
        'imagenes'         => ['img/airbnb/suite-miraflores.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/depa-yanahuara.webp'],
        'descripcion'      => 'Departamento ejecutivo bien ubicado para viajeros de negocios. Acceso rápido a centros comerciales y oficinas.',
        'descripcion_larga'=> 'Moderno y funcional, este departamento está pensado para el viajero de negocios. Escritorio de trabajo, conexión Wi-Fi de alta velocidad, cocina equipada y cama de calidad. Ubicado a 5 minutos del Real Plaza y de diversas empresas.',
        'amenidades'       => ['Wi-Fi 200 Mbps', 'Escritorio trabajo', 'Cocina', 'Estacionamiento', 'Seguridad 24h', 'Ascensor'],
        'lat'              => -16.4400,
        'lng'              => -71.5350,
        'anfitrion'        => 'Sofía V.',
    ],
    [
        'id'               => 'casa-campo-chiguata',
        'slug'             => 'casa-campo-chiguata',
        'nombre'           => 'Casa de campo · Chiguata',
        'tipo'             => 'casa',
        'distrito'         => 'chiguata',
        'direccion'        => 'Chiguata, Arequipa',
        'precio_noche'     => 320,
        'moneda'           => 'S/',
        'rating'           => 4.9,
        'reviews'          => 19,
        'capacidad'        => 10,
        'dormitorios'      => 4,
        'banos'            => 2,
        'favorito'         => true,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/casa-cayma.webp',
        'imagenes'         => ['img/airbnb/casa-cayma.webp', 'img/airbnb/hero-arequipa.webp', 'img/airbnb/depa-yanahuara.webp'],
        'descripcion'      => 'Espectacular casa de campo en Chiguata con vista andina, jardín amplio y parrilla. Ideal para retiros o eventos familiares.',
        'descripcion_larga'=> 'Una experiencia única en los alrededores de Arequipa. La casa se encuentra en Chiguata, a 30 minutos del centro, rodeada de naturaleza andina. 4 dormitorios, sala y comedor amplio, cocina rústica equipada, 2 baños y jardín de 500m². Perfecta para celebraciones o escapadas largas.',
        'amenidades'       => ['Wi-Fi', 'Jardín 500m²', 'Parrilla/Fogata', 'Cocina rústica', 'Estacionamiento amplio', 'Área de juegos'],
        'lat'              => -16.4090,
        'lng'              => -71.3500,
        'anfitrion'        => 'Jorge M.',
    ],
    [
        'id'               => 'depa-cerro-colorado',
        'slug'             => 'depa-cerro-colorado',
        'nombre'           => 'Depa acogedor · Cerro Colorado',
        'tipo'             => 'departamento',
        'distrito'         => 'cerro-colorado',
        'direccion'        => 'Cerro Colorado, Arequipa',
        'precio_noche'     => 120,
        'moneda'           => 'S/',
        'rating'           => 4.5,
        'reviews'          => 55,
        'capacidad'        => 3,
        'dormitorios'      => 1,
        'banos'            => 1,
        'favorito'         => false,
        'disponible'       => true,
        'imagen'           => 'img/airbnb/depa-yanahuara.webp',
        'imagenes'         => ['img/airbnb/depa-yanahuara.webp', 'img/airbnb/suite-miraflores.webp', 'img/airbnb/hero-arequipa.webp'],
        'descripcion'      => 'Acogedor departamento en Cerro Colorado. Cerca a colegios, mercados y la avenida principal de acceso a la ciudad.',
        'descripcion_larga'=> 'Espacio cómodo para familias pequeñas o grupos de hasta 3 personas. Ubicado en Cerro Colorado con acceso fácil a transporte público. Incluye sala, comedor, cocina equipada y dormitorio con cama matrimonial + cama individual.',
        'amenidades'       => ['Wi-Fi', 'Cocina equipada', 'Agua caliente', 'Smart TV', 'Lavandería compartida'],
        'lat'              => -16.3700,
        'lng'              => -71.5100,
        'anfitrion'        => 'Elena C.',
    ],
];

/**
 * Busca un alojamiento por slug.
 */
function findAlojamiento(string $slug): ?array {
    global $alojamientos;
    foreach ($alojamientos as $a) {
        if ($a['slug'] === $slug) return $a;
    }
    return null;
}

/**
 * Retorna alojamientos filtrados opcionalmente por tipo o distrito.
 */
function getAlojamientos(?string $tipo = null, ?string $distrito = null, int $limit = 0): array {
    global $alojamientos;
    $result = $alojamientos;
    if ($tipo && $tipo !== 'todos') {
        $result = array_values(array_filter($result, fn($a) => $a['tipo'] === $tipo));
    }
    if ($distrito && $distrito !== 'todos') {
        $result = array_values(array_filter($result, fn($a) => $a['distrito'] === $distrito));
    }
    return $limit > 0 ? array_slice($result, 0, $limit) : $result;
}

/**
 * Retorna los alojamientos favoritos.
 */
function getFavoritos(int $limit = 4): array {
    global $alojamientos;
    return array_slice(
        array_values(array_filter($alojamientos, fn($a) => $a['favorito'])),
        0, $limit
    );
}

/**
 * Retorna alojamientos relacionados excluyendo el actual.
 */
function relatedAlojamientos(string $currentSlug, int $limit = 3): array {
    global $alojamientos;
    return array_slice(
        array_values(array_filter($alojamientos, fn($a) => $a['slug'] !== $currentSlug)),
        0, $limit
    );
}
