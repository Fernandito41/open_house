<?php
include __DIR__ . '/conexion_DB/conexion.php';

$busqueda = isset($_GET['q']) ? trim(strtolower($conexion->real_escape_string($_GET['q']))) : '';

// --- Sinónimos completos para todas las categorías ---
$sinonimos = [
    // Camisas y camisetas
    'camisa' => ['camiseta', 'camisas', 'camisetas', 'shirt', 'tee'],
    'camiseta' => ['camisa', 'camisas', 'camisetas', 'shirt', 'tee'],

    // Pantalones / Jeans
    'pantalon' => ['pantalones', 'jean', 'jeans', 'trousers', 'denim'],
    'pantalones' => ['pantalon', 'jean', 'jeans', 'trousers', 'denim'],
    'jean' => ['jeans', 'pantalón', 'pantalones', 'denim'],

    // Chaquetas / Abrigos
    'chaqueta' => ['abrigo', 'bomber', 'jacket', 'coat'],
    'abrigo' => ['chaqueta', 'bomber', 'jacket', 'coat'],

    // Sudaderas / Hoodies / Sweaters
    'sudadera' => ['hoodie', 'sueter', 'sweater', 'pull'],
    'hoodie' => ['sudadera', 'sueter', 'sweater', 'pull'],
    'sueter' => ['sudadera', 'hoodie', 'sweater', 'pull'],
    'sweater' => ['sudadera', 'hoodie', 'suéter', 'pull'],

    // Bermudas / Shorts
    'bermuda' => ['short', 'bermudas', 'shorts', 'boardshort'],
    'short' => ['bermuda', 'bermudas', 'shorts', 'boardshort'],
    'shorts' => ['bermuda', 'bermudas', 'short', 'boardshort'],

    // Accesorios
    'accesorio' => ['accesorios', 'gafas', 'collar', 'hat', 'sombrero', 'belt'],
    'accesorios' => ['accesorio', 'gafas', 'collar', 'hat', 'sombrero', 'belt'],

    // Vestidos y faldas (mujer)
    'vestido' => ['vestidos', 'dress', 'gown'],
    'falda' => ['faldas', 'skirt']
];

// --- Convertimos la búsqueda en palabras individuales ---
$palabras = explode(' ', $busqueda);
$filtros = [];
$esMujer = in_array('mujer', $palabras);
$esHombre = in_array('hombre', $palabras);

// --- Construimos filtros SQL dinámicos ---
foreach ($palabras as $palabra) {
    $filtros[] = "p.nombre_producto LIKE '%$palabra%'";
    $filtros[] = "c.nombre_categoria LIKE '%$palabra%'";
    $filtros[] = "p.descripcion LIKE '%$palabra%'";
    $filtros[] = "p.ruta_detalle LIKE '%$palabra%'";

    if (array_key_exists($palabra, $sinonimos)) {
        foreach ($sinonimos[$palabra] as $sin) {
            $filtros[] = "p.nombre_producto LIKE '%$sin%'";
            $filtros[] = "c.nombre_categoria LIKE '%$sin%'";
        }
    }
}

// --- Consulta principal ---
$sql = "SELECT DISTINCT p.*, c.nombre_categoria, i.url_imagen
        FROM productos p
        INNER JOIN categorias c ON p.id_categoria = c.id_categoria
        LEFT JOIN imagenes_productos i 
            ON p.id_producto = i.id_producto AND i.es_principal = 1
        WHERE " . implode(' OR ', $filtros);

// --- Filtrado por género ---
if ($esMujer) {
    $sql .= " AND c.nombre_categoria LIKE '%mujer%'";
} elseif ($esHombre) {
    $sql .= " AND c.nombre_categoria LIKE '%hombre%'";
}

$resultado = $busqueda !== '' ? $conexion->query($sql) : null;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador - Hood&High</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./buscar.css">
</head>
<body>
    <div class="overlay">
        <!-- Botón Cerrar -->
        <a href="../base.php" class="cerrar">✕ Cerrar</a>

        <div class="buscador-header">
            <h1>Escribe aquí</h1>
            <form action="buscar.php" method="GET" class="buscador">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Buscar..." 
                    value="<?php echo htmlspecialchars($busqueda); ?>"
                >
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <?php if ($busqueda == ''): ?>
            <h2>TE PUEDE INTERESAR</h2>
            <div class="contenedor">
                <!-- Productos sugeridos -->
                <div class="Cajas">
                    <a href="../catalogo nuevo/nuevo8.php">
                        <div class="contenido">
                            <img src="../img/new18.jpg" alt="Camisa oversize">
                        </div>
                    </a>
                    <div class="informacion">
                        <p class="nombre">PANTALON BAGGY PRINT</p>
                        <p class="precio">$30.00</p>
                    </div>
                </div>

                <div class="Cajas">
                    <a href="../catalogo nuevo/new12.php">
                        <div class="contenido">
                            <img src="../img/new11.jpg" alt="Pañolete Red">
                        </div>
                    </a>
                    <div class="informacion">
                        <p class="nombre">PAÑOLETA RED</p>
                        <p class="precio">$8.00</p>
                    </div>
                </div>

                <div class="Cajas">
                    <a href="../catalogo nuevo/nuevo7.php">
                        <div class="contenido">
                            <img src="../img/new17.jpg" alt="Jeans Baggy Parche">
                        </div>
                    </a>
                    <div class="informacion">
                        <p class="nombre">JEANS BAGGY PARCHE</p>
                        <p class="precio">$27.00</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Resultados de búsqueda -->
        <?php if ($busqueda != ''): ?>
            <h2>Resultados para "<?php echo htmlspecialchars($busqueda); ?>"</h2>
            <div class="contenedor">
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        // Si no hay ruta, evita el enlace
                        $ruta = !empty($row['ruta_detalle']) ? $row['ruta_detalle'] : '#';
                        $imagen = !empty($row['url_imagen']) ? $row['url_imagen'] : 'placeholder.jpg';

                        echo "
                            <div class='Cajas'>
                                <a href='{$ruta}'>
                                    <div class='contenido'>
                                        <img src='../img/{$imagen}' alt='{$row['nombre_producto']}'>
                                    </div>
                                </a>
                                <div class='informacion'>
                                    <p class='nombre'>{$row['nombre_producto']}</p>
                                    <p class='precio'>\${$row['precio']}</p>
                                </div>
                            </div>
                        ";
                    }
                } else {
                    echo "<p style='color:white;'>No se encontraron resultados.</p>";
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
