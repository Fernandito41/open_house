<?php
include "../conexion_DB/conexion.php";

$id_pedido = $_POST['id_pedido']; // ID del pedido creado
$productos = $_POST['productos']; // arreglo con id_producto, cantidad y precio_unitario

foreach($productos as $item){
    $sql = "INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario)
            VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iiid", $id_pedido, $item['id_producto'], $item['cantidad'], $item['precio_unitario']);
    $stmt->execute();
    $stmt->close();
}

$conexion->close();
?>
