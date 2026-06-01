<?php
session_start();
include '../conexion_DB/conexion.php';

// Verifica si hay carrito válido
if (!isset($_SESSION['carrito_valido']) || empty($_SESSION['carrito_valido'])) {
    echo "<script>
        alert('No hay información de pedido.');
        window.location.href='/tienda_hoodhigh/base.php';
    </script>";
    exit;
}

$carrito = $_SESSION['carrito_valido'];
$total = $_SESSION['total_carrito'] ?? 0;

// Limpiar carrito después del pago (opcional)
unset($_SESSION['carrito']);
unset($_SESSION['carrito_valido']);
unset($_SESSION['total_carrito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pago Exitoso - Hood&High</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/success.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <i class="fas fa-check-circle icon-success"></i>
    <h1>¡Pago Completado!</h1>
    <p>Gracias por tu compra. Tu pedido se ha procesado correctamente.</p>

    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($carrito as $item): ?>
            <tr>
                <td><img src="<?php echo '/tienda_hoodhigh/img/' . htmlspecialchars(basename($item['imagen'])); ?>" 
                         alt="<?php echo htmlspecialchars($item['nombre']); ?>"></td>
                <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                <td><?php echo htmlspecialchars($item['talla'] ?? 'N/A'); ?></td>
                <td><?php echo htmlspecialchars($item['cantidad']); ?></td>
                <td>$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">
        Total a pagar: $<?php echo number_format($total, 2); ?>
    </div>

    <a href="/tienda_hoodhigh/base.php" class="btn">Volver a la tienda</a>
</div>
</body>
</html>
