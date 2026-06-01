<?php
session_start();
include './conexion_DB/conexion.php';
date_default_timezone_set('America/El_Salvador'); // hora correcta

if (!isset($_SESSION['id_registro'])) {
    header("Location: /tienda_hoodhigh/login/iniciar sesion.php");
    exit;
}

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header("Location: /tienda_hoodhigh/base.php");
    exit;
}

$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}

$fecha = date('Y-m-d H:i:s');
$estado = "pendiente";

$stmt = $conexion->prepare("INSERT INTO pedidos (id_registro, fecha_pedido, total, estado) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isds", $_SESSION['id_registro'], $fecha, $total, $estado);
$stmt->execute();

$id_pedido = $stmt->insert_id;
$_SESSION['id_pedido'] = $id_pedido;


foreach ($_SESSION['carrito'] as $item) {
    $stmt_det = $conexion->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
    $stmt_det->bind_param("iiid", $id_pedido, $item['id'], $item['cantidad'], $item['precio']);
    $stmt_det->execute();
}

// Redirigir a elegir método de pago
header("Location: /tienda_hoodhigh/carrito/metodos_de_pago.php");
exit;
