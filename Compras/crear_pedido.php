<?php
session_start();
include "../conexion_DB/conexion.php"; // ruta a tu conexión

// Suponiendo que el usuario está logueado
$id_usuario = $_SESSION['id_registro']; 
$total = $_POST['total']; // total de la compra
$metodo_pago = $_POST['metodo_pago']; // 'stripe', 'paypal', etc.
$referencia_pago = $_POST['referencia_pago'] ?? null; // opcional

// Insertar pedido
$sql = "INSERT INTO pedidos (id_usuario, total, metodo_pago, referencia_pago) 
        VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("idss", $id_usuario, $total, $metodo_pago, $referencia_pago);
$stmt->execute();

// Obtener el ID del pedido recién creado
$id_pedido = $stmt->insert_id;

$stmt->close();
$conexion->close();

echo $id_pedido; // devolver el ID del pedido para usarlo en detalle_pedido
?>
