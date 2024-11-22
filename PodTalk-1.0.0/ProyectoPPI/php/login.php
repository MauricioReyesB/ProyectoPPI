<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
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
            header('Location:../index.php?mensaje=sesion_iniciada'); 
        } else {
            header('Location:contact.php?mensaje=credenciales_invalidas');
        }
    } else {
        header('Location:contact.php?mensaje=credenciales_invalidas');
    }
    $stmt->close();
}

$conn->close();
?>
