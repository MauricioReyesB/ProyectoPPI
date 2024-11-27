<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<script>alert('Error de conexión a la base de datos'); window.location.href='contact.php';</script>");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre_usuario']) ? trim($_POST['nombre_usuario']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $edad = isset($_POST['edad']) ? intval($_POST['edad']) : null;
    $pais = isset($_POST['pais']) ? trim($_POST['pais']) : null;
    $contrasena = isset($_POST['contraseña']) ? password_hash(trim($_POST['contraseña']), PASSWORD_DEFAULT) : null;
    $fecha_nacimiento = isset($_POST['fecha_de_nacimiento']) ? trim($_POST['fecha_de_nacimiento']) : null;
    $direccion_postal = isset($_POST['direccion_postal']) ? intval($_POST['direccion_postal']) : null;
    if (empty($nombre) || empty($email) || empty($edad) || empty($pais) || empty($contrasena) || empty($fecha_nacimiento) || empty($direccion_postal)) {
        echo "<script>alert('Por favor, complete todos los campos.'); window.location.href='contact.php';</script>";
        exit;
    }
    $sql = "INSERT INTO usuarios (nombre_usuario, email, edad, pais, contraseña, fecha_de_nacimiento, direccion_postal) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssisssi", $nombre, $email, $edad, $pais, $contrasena, $fecha_nacimiento, $direccion_postal);
        if ($stmt->execute()) {
            echo "<script>alert('Cuenta creada exitosamente'); window.location.href='contact.php';</script>";
        } else {
            if ($conn->errno === 1062) { 
                echo "<script>alert('El email ya está registrado.'); window.location.href='contact.php';</script>";
            } else {
                echo "<script>alert('Error al crear la cuenta: " . $stmt->error . "'); window.location.href='contact.php';</script>";
            }
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error al preparar la consulta: " . $conn->error . "'); window.location.href='contact.php';</script>";
    }
}
$conn->close();
?>
