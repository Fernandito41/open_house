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

// Recibir datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'], $_POST['nombre_producto'], $_POST['precio'], $_POST['cantidad'])) {
    $_SESSION['carrito'][] = [
        'id' => intval($_POST['id_producto']),
        'nombre' => $_POST['nombre_producto'],
        'precio' => floatval($_POST['precio']),
        'cantidad' => intval($_POST['cantidad']),
        'talla' => $_POST['talla'] ?? 'N/A',
        'imagen' => $_POST['imagen'] ?? ''
    ];
}

// Redirige de vuelta al producto o página anterior
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
