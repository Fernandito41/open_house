<?php
session_start();
include './conexion_DB/conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Credenciales sandbox PayPal
$clientId = 'Ab9DNN81gyqZscV2GllCnnnrECykW4QKTjCr7oazm2C0bgUBaUP3n_tviy6T10jC_YJWlpUHAg2QzGzK';
$secret   = 'EL_9mowXkycmJ5X4m9WfkmBEbWcY6pva7CjAX6oxaSEKDxx21CV921LemskDpyh_Kl8XCgmNVjVKu-19';
$baseUrl  = 'https://api-m.sandbox.paypal.com';

// Verificar token de PayPal
if (!isset($_GET['token'])) die("Token de PayPal no recibido.");
$paypalToken = $_GET['token'];

// Obtener access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseUrl . '/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $clientId . ':' . $secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Accept-Language: en_US']);
$result = curl_exec($ch);
curl_close($ch);
$tokenData = json_decode($result, true);
$accessToken = $tokenData['access_token'] ?? null;
if (!$accessToken) die('No se pudo obtener el token.');

// Capturar pago
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseUrl . "/v2/checkout/orders/{$paypalToken}/capture");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer {$accessToken}"
]);
$result = curl_exec($ch);
curl_close($ch);

$captureData = json_decode($result, true);
if (isset($captureData['status']) && $captureData['status'] === 'COMPLETED') {

    // Guardar pedido en DB
    $id_registro = $_SESSION['id_registro'];
    $total = $_SESSION['total_carrito'];
    $fecha = date('Y-m-d H:i:s');

    $stmt = $conexion->prepare("INSERT INTO pedidos (id_registro, fecha_pedido, total, estado, metodo_pago, referencia_pago) VALUES (?, ?, ?, ?, ?, ?)");
    $estado = "COMPLETADO";
    $metodo_pago = "PayPal";
    $referencia = $paypalToken;
    $stmt->bind_param("isdsss", $id_registro, $fecha, $total, $estado, $metodo_pago, $referencia);
    $stmt->execute();
    $id_pedido = $stmt->insert_id;
    $stmt->close();

    // Guardar detalle de cada producto
    foreach ($_SESSION['carrito'] as $item) {
        $stmt = $conexion->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $id_pedido, $item['id'], $item['cantidad'], $item['precio']);
        $stmt->execute();
        $stmt->close();
    }

    // Guardar en tabla pagos
    $stmt = $conexion->prepare("INSERT INTO pagos (id_pedido, metodo, monto, fecha, referencia, estado) VALUES (?, ?, ?, ?, ?, ?)");
    $fecha_pago = date('Y-m-d H:i:s');
    $stmt->bind_param("isdsss", $id_pedido, $metodo_pago, $total, $fecha_pago, $referencia, $estado);
    $stmt->execute();
    $stmt->close();

    // Limpiar carrito
    unset($_SESSION['carrito']);
    unset($_SESSION['carrito_valido']);
    unset($_SESSION['total_carrito']);

    echo "<h2>¡Pago completado con éxito!</h2>";
    echo "<p>Referencia: $referencia</p>";
    echo "<a href='/tienda_hoodhigh/base.php'>Volver al inicio</a>";

} else {
    echo "<h2>Error al procesar el pago de PayPal.</h2>";
    echo "<pre>".htmlspecialchars(json_encode($captureData, JSON_PRETTY_PRINT))."</pre>";
}
