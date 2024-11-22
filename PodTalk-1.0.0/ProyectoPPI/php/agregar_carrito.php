<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {

    header('Location:contact.php?mensaje=debes_iniciar_sesion');
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$id_videojuego = isset($_GET['id_videojuego']) ? intval($_GET['id_videojuego']) : 0;

if ($id_videojuego <= 0) {
    echo "ID de videojuego no válido.";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql_check = "SELECT * FROM carrito WHERE usuario_id = ? AND videojuego_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $usuario_id, $id_videojuego);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {

    $sql_update = "UPDATE carrito SET cantidad = cantidad + 1 WHERE usuario_id = ? AND videojuego_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ii", $usuario_id, $id_videojuego);
    $stmt_update->execute();
} else {
 
    $sql_insert = "INSERT INTO carrito (usuario_id, videojuego_id, cantidad, fecha_agregado) VALUES (?, ?, 1, NOW())";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ii", $usuario_id, $id_videojuego);
    $stmt_insert->execute();
}

$conn->close();

header('Location:listing-page.php');
exit;
?>
