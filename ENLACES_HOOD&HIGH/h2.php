<?php
session_start();

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

// Agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['cantidad'])) {
    $_SESSION['carrito'][] = [
        'id' => intval($_POST['id']),
        'nombre' => $_POST['nombre'],
        'precio' => floatval($_POST['precio']),
        'cantidad' => intval($_POST['cantidad'])
    ];
}

// Calcular total
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
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

<nav class="navbar">
   <!-- NAVBAR -->
    <nav class="navbar">
        <button class="icono_hamburgesa"><i class="bi bi-list"></i></button>
        <div class="logo">HOOD&HIGH</div>

        <ul class="nav-links">
            <li><a href="../ENLACES_HOOD&HIGH/hombre.php">HOMBRE</a></li>
            <li><a href="../ENLACES_HOOD&HIGH/mujer.php">MUJER</a></li>
            <li><a href="../ENLACES_HOOD&HIGH/verano.php">VERANO</a></li>
        </ul>

        <div class="search-container"><!--Contenedor de barra de busqueda-->
          <form action="../buscador/buscar.php" method="get">
            <input type="text" name="q" placeholder="Buscar..." class="search-input"><!--Barra de busqueda-->
            <button class="search-btn"><i class="fas fa-search"></i></button><!--Boton de busqueda-->
          </form>
        </div>

        <a href="../carrito/carritodecompras.php">
            <button class="carrito"><i class="bi bi-cart2"></i></button>
        </a>
         <a href="../base.php">                                                                                                  
        <button class="inicio"><i class="bi bi-house"></i></button>

          <div class="registro-contenedor">
    <?php if(isset($_SESSION['usuario'])): ?>
        <!-- Usuario logueado: botón redirige al perfil -->
        <a href="../perfil/perfil.php" class="registro-link">
            <button class="registro">
                <i class="fa-regular fa-user"></i>
                <?php echo " " . $_SESSION['usuario']; ?>
            </button>
        </a>
    <?php else: ?>
        <!-- Usuario no logueado: botón redirige a iniciar sesión -->
        <a href="../login/iniciar sesion.php" class="registro-link">
            <button class="registro">
                <i class="fa-regular fa-user"></i>
                Iniciar sesión
            </button>
        </a>
    <?php endif; ?>
</div> <!--Finaliza el icono de usuario con menu desplegable-->

        <!-- MENU LATERAL -->
        <div class="barra_lateral">
            <ul>
                <li><a href="../ENLACES_HOOD&HIGH/hombre.php">Hombre</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/mujer.php">Mujer</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/verano.php">Verano</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/Accesorios.php">Accesorios</a></li>
                <li><a href="#">Novedades</a></li>
                <li><a href="#">Lo más vendido</a></li>
                <li><a href="#">Ofertas</a></li>
            </ul>
        </div>
    </nav>
</nav>
         
<div class="carrito-pedidos-container">
  <div class="carrito-vacio">
    <?php if (!empty($_SESSION['carrito'])): ?>
      <h2 class="carrito-titulo">Productos en tu carrito:</h2>
      <?php foreach ($_SESSION['carrito'] as $indice => $item): ?>
        <div class="carrito-item">
          <img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="Producto" class="mini-imagen">
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
    <?php if (!empty($_SESSION['carrito'])): ?>
      <a href="../ENLACES_HOOD&HIGH/metodos_de_pago.php">
     <button id="checkout-button" class="btn-hacer-pedido">Hacer pedido</button>
      </a>
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
        <br>Utilizamos sistemas de pago protegidos para garantizar la seguridad de tu información.
      </p>
    </div>
  </div>
</div>
<!-- FOOTER -->
   <footer class="footer"><!--Inicia el pie de pagina-->
          <div class="footer-texto">
          <p>SUSCRIBETE A NUESTRAS PAGINAS Y SE EL PRIMERO EN DESCUBRIR SU ESTILO</p>
          </div>
          <div class="footer-contenido">
            <div class="social-column"><!--Inicio de nuestras redes sociales-->
          <a href="#" class="icon facebook">
      <div class="tooltip">Facebook</div>
      <span><i class="fab fa-facebook-f"></i></span>
    </a>
    <a href="https://x.com/Hoodandhigh" class="icon twitter">
      <div class="tooltip">Twitter</div>
      <span><i class="fab fa-twitter"></i></span>
    </a>
    <a href="https://www.instagram.com/hood_and_high/" class="icon instagram">
      <div class="tooltip">Instagram</div>
      <span><i class="fab fa-instagram"></i></span>
    </a>
    <a href="https://www.tiktok.com/@hoodandhigh_sv" class="icon tiktok">
      <div class="tooltip">TikTok</div>
      <span><i class="fab fa-tiktok"></i></span>
      </a>
      <a href="https://wa.me/50377509207"class="icon whatsap">
        <div class="tooltip">Whatsap</div>
        <span><i class="fab fa-whatsapp"></i></span>
      </a>
      </div>
      <div class="footer-columns"><!--apartado de sugerencias-->
  <div class="footer-column">
    <h3>¿Necesitas ayuda?</h3>
    <div class="footer-links">
    <a href="../consultas/enviar_email.php" class="email-link"> Enviar e-mail
      <span class="small-text">Te responderemos lo antes posible</span>
    </a>
  </div>
  </div>
  <div class="footer-column">
  <h3 class="footer-title">Que es HOOD&HIGH</h3>
  <div class="footer-links">
    <a href="../ENLACES_HOOD&HIGH/enlace_sobre nostros.html">Sobre Hood&high</a>
    <a href="../ENLACES_HOOD&HIGH/enlace_Ofertas.html">Ofertas</a>
    <a href="../ENLACES_HOOD&HIGH/enlace_Novedades.html">Novedades</a>
  </div>
</div>

<div class="footer-column">
  <h3 class="footer-title">Te puede interesar</h3>
  <div class="footer-links">
    <a href="../ENLACES_HOOD&HIGH/chaquetas.html">Chaquetas</a>
    <a href="../ENLACES_HOOD&HIGH/tops_boddies.html">Tops y crop tops</a>
    <a href="../ENLACES_HOOD&HIGH/jeans1_mujer.html">Jeans</a>
    <a href="../ENLACES_HOOD&HIGH/pantalones1.html">Pantalones</a>
    <a href="../ENLACES_HOOD&HIGH/hoddies.html">Camisetas y hoodies</a>
  </div>
</div>
  </div>
  </div>
  </footer>
  <div class="footer-legal">
  <div class="footer-legal-links">
    <a href="#">Terminos y condiciones</a>
    <a href="#">De #hood&high</a>
    <a href="#">Condiciones de uso</a>
    <a href="#">Politica de privacidad</a>
  </div>
  <span class="footer-legal-2025">© 2025 HOOD&HIGH</span>
</div><!--Aqui termina pie de pagina-->
 <!-- SCRIPTS -->
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
</body>
</html>
