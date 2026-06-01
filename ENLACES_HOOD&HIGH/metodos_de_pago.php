<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si hay productos en el carrito
if (empty($_SESSION['carrito'])) {
    echo "<h2>El carrito está vacío</h2>";
    echo "<a href='../base.php'>Volver a comprar</a>";
    exit;
}

// Calcular total del carrito
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elegir método de pago</title>
    <link rel="stylesheet" href="../css/metodos_de_pago.css">
</head>
<body>

<h1 class="titulo-pago">Selecciona tu método de pago</h1>
<p>Total a pagar: <strong>$<?php echo number_format($total, 2); ?></strong></p>

<div class="contenedor-botones">
    <!-- Botón Stripe (Visa/MC) -->
    <form action="../stripe/checkout.php" method="POST">
        <button type="submit" class="boton-pago stripe">
            <img src="../img/visa.jpg" alt="VISA">
        </button>
    </form>

    <!-- Botón PayPal -->
    <form action="../paypal/paypal_pago.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <button type="submit" class="boton-pago paypal">
            <img src="../img/paypal.jpg" alt="PayPal">
        </button>
    </form>
</div>

</body>
</html>
