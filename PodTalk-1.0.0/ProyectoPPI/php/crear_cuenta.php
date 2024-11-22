<?php
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
    $nombre = isset($_POST['full-name']) ? $_POST['full-name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
    $pais = isset($_POST['pais']) ? $_POST['pais'] : '';
    $contrasena = isset($_POST['contrasena']) ? password_hash($_POST['contrasena'], PASSWORD_DEFAULT) : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $direccion_postal = isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : '';

    $sql = "INSERT INTO usuarios (nombre_usuario, email, edad, pais, contraseña, fecha_de_nacimiento, direccion_postal) 
            VALUES ('$nombre', '$email', '$edad', '$pais', '$contrasena', '$fecha_nacimiento', '$direccion_postal')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Cuenta creada exitosamente']);
    } else {
        if ($conn->errno === 1062) { 
            echo json_encode(['status' => 'error', 'message' => 'El email ya está registrado.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la cuenta: ' . $conn->error]);
        }
    }
}

$conn->close();
?>
