<?php
session_start();
include "crear_pedido.php"; // devuelve $id_pedido
include "detalle_pedido.php"; // usa $id_pedido y $productos

header("Location:../carrito/success.php"); // redirigir a página de éxito
exit;
?>
