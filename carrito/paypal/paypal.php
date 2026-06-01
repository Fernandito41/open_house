<?php
session_start();
include './conexion_DB/conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Credenciales sandbox PayPal
$clientId = 'Ab9DNN81gyqZscV2GllCnnnrECykW4QKTjCr7oazm2C0bgUBaUP3n_tviy6T10jC_YJWlpUHAg2QzGzK';
$secret   = 'EL_9mowXkycmJ5X4m9WfkmBEbWcY6pva7CjAX6oxaSEKDxx21CV921LemskDpyh_Kl8XCgmNVjVKu-19';
$baseUrl  = 'https://api-m.sandbox.paypal.com';

// Verificar usuario y carrito
if (!isset($_SESSION['id_registro'])) die("Debes iniciar sesión.");
if (empty($_SESSION['carrito'])) die("El carrito está vacío.");

// Calcular total
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
$total_str = number_format($total, 2, '.', '');

// Obtener token de acceso
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseUrl . '/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $clientId . ':' . $secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Accept-Language: en_US']);
$result = curl_exec($ch);
if (!$result) die("Error al obtener token: ".curl_error($ch));
curl_close($ch);
$tokenData = json_decode($result, true);
$accessToken = $tokenData['access_token'] ?? null;
if (!$accessToken) die('No se pudo obtener el token de acceso.');

// Crear orden
$domain = "https://tienda_hoodhigh/base.php"; // Cambiar por tu dominio real o ngrok HTTPS
$orderData = [
    'intent' => 'CAPTURE',
    'purchase_units' => [[
        'amount' => [
            'currency_code' => 'USD',
            'value' => $total_str
        ]
    ]],
    'application_context' => [
        'return_url' => $domain . '/tienda_hoodhigh/carrito/paypal_success.php',
        'cancel_url' => $domain . '/tienda_hoodhigh/carrito/paypal_cancel.php'
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseUrl . '/v2/checkout/orders');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer {$accessToken}"
]);
$result = curl_exec($ch);
if (!$result) die("Error al crear la orden: " . curl_error($ch));
curl_close($ch);

$order = json_decode($result, true);
$approvalUrl = null;
foreach ($order['links'] as $link) {
    if ($link['rel'] === 'approve') {
        $approvalUrl = $link['href'];
        break;
    }
}
if (!$approvalUrl) die('No se pudo obtener la URL de aprobación de PayPal.');

header('Location: ' . $approvalUrl);
exit;
