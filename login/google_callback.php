
<?php
session_start();

// Incluir la conexión a la base de datos
include __DIR__ . '../conexion_DB/conexion.php';

// Cargar librerías de Google
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $client = new Google_Client();
    $client->setClientId('683562172311-gjjdf4fpfffd3ja7q4n9f77k4f1b04i9.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://localhost/tienda_hoodhigh/login/google_callback.php');
    $client->addScope('email');
    $client->addScope('profile');

    if (!isset($_GET['code'])) {
        // Si no hay código, redirigir a Google
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        exit();
    } else {
        // Intercambiar el código por un token
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (isset($token['error'])) {
            throw new Exception(join(', ', $token));
        }

        $client->setAccessToken($token['access_token']);

        // Obtener información del usuario
        $oauth = new Google_Service_Oauth2($client);
        $google_user = $oauth->userinfo->get();

        $email = $google_user->email;
        $nombre = $google_user->name;
        $google_id = $google_user->id;

        // Verificar si el usuario ya existe en la base
        $stmt = $conexion->prepare("SELECT * FROM registro WHERE correo = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Usuario existente
            $usuario = $resultado->fetch_assoc();
        } else {
            // Crear nuevo usuario automáticamente
            $stmt = $conexion->prepare("INSERT INTO registro (usuario, correo, password) VALUES (?, ?, ?)");
            $user_name = explode('@', $email)[0]; // nombre antes de @
            $stmt->bind_param("sss", $user_name, $email, $google_id); // password se puede guardar como google_id temporal
            $stmt->execute();

            $usuario_id = $stmt->insert_id;

            $usuario = [
                'id_registro' => $usuario_id,
                'usuario' => $user_name,
                'correo' => $email
            ];
        }

        // Crear sesión
        $_SESSION['id_registro'] = $usuario['id_registro'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['correo'] = $usuario['correo'];

        // Redirigir al inicio o carrito
        header('Location: /tienda_hoodhigh/base.php');
        exit();
    }

} catch (Exception $e) {
    echo "Error al autenticar con Google: " . $e->getMessage();
    exit;
}
