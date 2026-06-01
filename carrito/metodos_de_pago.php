<?php
session_start();

// Verificar usuario
if (!isset($_SESSION['id_registro'])) {
    echo "<script>
        alert('Debes iniciar sesión para continuar con la compra');
        window.location.href='/tienda_hoodhigh/login/iniciar sesion.php';
    </script>";
    exit;
}

// Verificar carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<script>
        alert('Tu carrito está vacío');
        window.location.href='/tienda_hoodhigh/base.php';
    </script>";
    exit;
}

$carrito = $_SESSION['carrito'];
$total = $_SESSION['total_carrito'] ?? 0;
$id_pedido = $_SESSION['id_pedido'] ?? 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Métodos de Pago - Hood&High</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="metodos_de_pago.css">
</head>
<body>
<div class="container">
  <h2>Resumen de tu Pedido</h2>

  <table class="table">
    <tr>
      <th>Imagen</th>
      <th>Producto</th>
      <th>Talla</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Subtotal</th>
    </tr>
    <?php foreach ($carrito as $item): ?>
    <tr>
      <td><img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt=""></td>
      <td><?php echo htmlspecialchars($item['nombre']); ?></td>
      <td><?php echo htmlspecialchars($item['talla']); ?></td>
      <td><?php echo htmlspecialchars($item['cantidad']); ?></td>
      <td>$<?php echo number_format($item['precio'], 2); ?></td>
      <td>$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <div class="total">
    Total a pagar: $<?php echo number_format($total, 2); ?>
  </div>

  <div class="payment-options">
    <h3>Elige tu método de pago</h3>
    <a href="/tienda_hoodhigh/carrito/stripe/checkout.php?id_pedido=<?php echo $id_pedido; ?>&total=<?php echo ($total*100); ?>" class="btn btn-stripe"> Pagar con Stripe</a>
    <a href="/tienda_hoodhigh/carrito/paypal/paypal.php?id_pedido=<?php echo $id_pedido; ?>&total=<?php echo $total; ?>" class="btn btn-paypal">Pagar con PayPal</a>

  </div>

  <a href="/tienda_hoodhigh/carrito/carritodecompras.php" class="volver">← Volver al carrito</a>
</div>
</body>
</html>
