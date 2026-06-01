<?php
// login.php
session_start();

// Cargar librería de Google
require_once __DIR__ . '/../vendor/autoload.php';

// Configurar cliente de Google
$client = new Google_Client();
$client->setClientId('683562172311-gjjdf4fpfffd3ja7q4n9f77k4f1b04i9.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/tienda_hoodhigh/login/google_callback.php');
$client->addScope('email');
$client->addScope('profile');

// Generar URL de autorización
$auth_url = $client->createAuthUrl();

// Redirigir al usuario a Google
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
exit();

