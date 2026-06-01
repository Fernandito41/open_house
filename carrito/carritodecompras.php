<?php
session_start();
include './conexion_DB/conexion.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['id_registro'])) {
    echo "<script>
        alert('Para poder comprar, por favor inicia sesión');
        window.location.href='../login/iniciar sesion.php';
    </script>";
    exit;
}

// Inicializa carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Eliminar producto del carrito
if (isset($_POST['eliminar'])) {
    $indice = intval($_POST['eliminar']);
    unset($_SESSION['carrito'][$indice]);
    $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar
}

// Preparar total
$total = 0;
$carrito_valido = [];

// Recorre el carrito y obtiene info actualizada de cada producto
foreach ($_SESSION['carrito'] as $indice => $producto) {

    // Trae la información del producto y la primera imagen disponible (ignorando es_principal)
    $stmt = $conexion->prepare("
        SELECT p.precio, ip.url_imagen
        FROM productos p
        LEFT JOIN imagenes_productos ip 
            ON ip.id_producto = p.id_producto
        WHERE p.id_producto = ?
        ORDER BY ip.id_imagen ASC
        LIMIT 1
    ");
    $stmt->bind_param("i", $producto['id']);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        // Actualiza los datos del producto en el carrito
        $producto['precio'] = $row['precio'];
        $producto['imagen'] = $row['url_imagen'] ? '../img/' . $row['url_imagen'] : '../img/default.jpg';
        $total += $producto['precio'] * $producto['cantidad'];

        $_SESSION['carrito'][$indice]['precio'] = $producto['precio'];
        $_SESSION['carrito'][$indice]['imagen'] = $producto['imagen'];

        $carrito_valido[] = $producto;
    }
}

// Guardamos carrito válido y total en sesión
$_SESSION['carrito_valido'] = $carrito_valido;
$_SESSION['total_carrito'] = $total;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrito de Compras</title>
<link rel="stylesheet" href="../css/carritodecompras.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <button class="icono_hamburgesa"><i class="bi bi-list"></i></button>
    <div class="logo">HOOD&HIGH</div>

    <ul class="nav-links">
        <li><a href="../../ENLACES_HOOD&HIGH/hombre.php">HOMBRE</a></li>
        <li><a href="../../ENLACES_HOOD&HIGH/mujer.php">MUJER</a></li>
        <li><a href="../../ENLACES_HOOD&HIGH/verano.php">VERANO</a></li>
    </ul>

    <div class="search-container">
        <form action="../../buscador/buscar.php" method="get">
            <input type="text" name="q" placeholder="Buscar..." class="search-input">
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <a href="../../base.php"><button class="inicio"><i class="bi bi-house"></i></button></a>
    <a href="../../carrito/carritodecompras.php"><button class="carrito"><i class="bi bi-cart2"></i></button></a>

    <div class="registro-contenedor">
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="../../perfil/perfil.php" class="registro-link">
                <button class="registro">
                    <i class="fa-regular fa-user"></i> <?php echo " " . $_SESSION['usuario']; ?>
                </button>
            </a>
        <?php else: ?>
            <a href="../../login/iniciar sesion.php" class="registro-link">
                <button class="registro"><i class="fa-regular fa-user"></i> Iniciar sesión</button>
            </a>
        <?php endif; ?>
    </div>

    <div class="barra_lateral">
        <ul>
            <li><a href="../../ENLACES_HOOD&HIGH/hombre.php">Hombre</a></li>
            <li><a href="../../ENLACES_HOOD&HIGH/mujer.php">Mujer</a></li>
            <li><a href="../../ENLACES_HOOD&HIGH/verano.php">Verano</a></li>
            <li><a href="../../ENLACES_HOOD&HIGH/Accesorios.php">Accesorios</a></li>
            <li><a href="../../ENLACES_HOOD&HIGH/enlace_Novedades.html">Novedades</a></li>
            <li><a href="../../ENLACES_HOOD&HIGH/enlace_Ofertas.html">Ofertas</a></li>
        </ul>
    </div>
</nav>

<!-- CARRITO -->
<div class="carrito-pedidos-container">
  <div class="carrito-vacio">
    <?php if (!empty($carrito_valido)): ?>
      <h2 class="carrito-titulo">Productos en tu carrito:</h2>
      <?php foreach ($carrito_valido as $indice => $item): ?>
        <div class="carrito-item">
          <img src="<?php echo htmlspecialchars($item['imagen']); ?>" 
               alt="<?php echo htmlspecialchars($item['nombre']); ?>" 
               class="mini-imagen">
          <?php echo htmlspecialchars($item['nombre']); ?>  
          - Talla: <?php echo htmlspecialchars($item['talla']); ?>  
          - Cantidad: <?php echo $item['cantidad']; ?>  
          - Subtotal: $<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?>

          <form method="POST" style="display:inline;">
            <button type="submit" name="eliminar" value="<?php echo $indice; ?>" class="btn-eliminar">
              <i class="bi bi-trash"></i> Eliminar
            </button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <span class="carrito-titulo" id="carrito-vacio-texto">
        <i class="bi bi-cart-x icono-carrito-vacio"></i> El carrito está vacío
      </span>
      <a href="../base.php"><button class="btn-empezar">Empezar a comprar</button></a>
    <?php endif; ?>
  </div>

  <div class="hacer-pedidos">
    <div class="resumen-pedido">
      <span class="resumen-titulo">Resumen del pedido</span>
      <div class="resumen-total">
        Total: <span class="resumen-monto">$<?php echo number_format($total,2); ?></span>
      </div>
    </div>
    <?php if (!empty($carrito_valido)): ?>
      <form action="../carrito/hacer_pedido.php" method="POST">
    <button type="submit" class="btn-hacer-pedido">Hacer pedido</button>
</form>

    <?php endif; ?>
    <div class="descripcion-pago">
      <p class="descripcion-pago-texto">
        <strong>¡Tus datos están seguros!</strong><br>
        Los métodos de pago disponibles son:
        <span class="iconos-metodos-pago">
          <i class="fab fa-cc-paypal icono-paypal"></i> PayPal
          <i class="fab fa-cc-visa icono-visa"></i> Visa
          <i class="far fa-credit-card icono-tarjeta"></i> Crédito/Débito
        </span>
      </p>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-texto">
    <p>SUSCRÍBETE A NUESTRAS PÁGINAS Y SÉ EL PRIMERO EN DESCUBRIR SU ESTILO</p>
  </div>
  <div class="footer-contenido">
    <div class="social-column">
      <a href="#" class="icon facebook"><span><i class="fab fa-facebook-f"></i></span></a>
      <a href="https://x.com/Hoodandhigh" class="icon twitter"><span><i class="fab fa-twitter"></i></span></a>
      <a href="https://www.instagram.com/hood_and_high/" class="icon instagram"><span><i class="fab fa-instagram"></i></span></a>
      <a href="https://www.tiktok.com/@hoodandhigh_sv" class="icon tiktok"><span><i class="fab fa-tiktok"></i></span></a>
      <a href="https://wa.me/50377509207" class="icon whatsap"><span><i class="fab fa-whatsapp"></i></span></a>
    </div>
  </div>
  <div class="footer-legal">
    <span class="footer-legal-2025">© 2025 HOOD&HIGH</span>
  </div>
</footer>

<script>
const hamburguesa = document.querySelector('.icono_hamburgesa');
const barraLateral = document.querySelector('.barra_lateral');
hamburguesa.addEventListener('click', () => {
    barraLateral.classList.toggle('activa');
});
document.addEventListener('click', (e) => {
    if (barraLateral.classList.contains('activa') &&
        !barraLateral.contains(e.target) &&
        !hamburguesa.contains(e.target)) {
        barraLateral.classList.remove('activa');
    }
});
</script>
</body>
</html>
