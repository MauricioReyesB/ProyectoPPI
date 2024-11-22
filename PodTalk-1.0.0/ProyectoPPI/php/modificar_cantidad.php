<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = 'localhost';
$dbname = 'juegos';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['carrito_id']) && isset($_POST['cantidad']) && isset($_SESSION['usuario_id'])) {
    $carritoId = intval($_POST['carrito_id']);
    $cantidad = intval($_POST['cantidad']);
    $usuarioId = $_SESSION['usuario_id'];

    if ($cantidad > 0) {
        $query = "UPDATE carrito SET cantidad = ? WHERE id = ? AND usuario_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $cantidad, $carritoId, $usuarioId);
        $stmt->execute();
    }
}

header("Location:listing-page.php");
exit;
?>
