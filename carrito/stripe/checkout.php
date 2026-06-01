

<?php
session_start();
require '../../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51SAc8SE52twEqTtELGc0m3VzjIhvE3TkCOaF2CVoJijMeZTKQrjOuoeyGbUwRFaMguAqXE3jHnOCWJzdAKcPl5Tq00QH8FOji9'); 

if (!isset($_SESSION['id_pedido'])) exit;

$id_pedido = $_SESSION['id_pedido'];
$total = $_SESSION['total_carrito'] * 100; // en centavos
$YOUR_DOMAIN = 'http://localhost/tienda_hoodhigh';

$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => ['name' => 'Pedido #' . $id_pedido],
            'unit_amount' => $total,
        ],
        'quantity' => 1,
    ]],
    'metadata' => ['pedido' => $id_pedido],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/carrito/stripe/success.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url'  => $YOUR_DOMAIN . '/carrito/carritodecompras.php',
]);

header("Location: " . $checkout_session->url);
