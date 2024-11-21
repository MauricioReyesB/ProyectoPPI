<?php
session_start();

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión a la base de datos']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($contrasena, $user['contraseña'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre_usuario'];

            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Contraseña incorrecta']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Usuario no encontrado']);
    }
    $stmt->close();
}

$conn->close();
?>
