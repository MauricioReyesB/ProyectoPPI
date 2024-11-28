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
if (isset($_GET['videojuego_id']) && isset($_SESSION['usuario_id'])) {
    $videojuegoId = intval($_GET['videojuego_id']);
    $usuarioId = intval($_SESSION['usuario_id']);
    $query = "SELECT cantidad FROM carrito WHERE videojuego_id = ? AND usuario_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $videojuegoId, $usuarioId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['cantidad'] > 1) {
            $query = "UPDATE carrito SET cantidad = cantidad - 1 WHERE videojuego_id = ? AND usuario_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $videojuegoId, $usuarioId);
        } else {
            $query = "DELETE FROM carrito WHERE videojuego_id = ? AND usuario_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $videojuegoId, $usuarioId);
        }
        if ($stmt->execute()) {
            header("Location:listing-page.php");
            exit;
        }
    } else {
        echo "Producto no encontrado en el carrito.";
    }
} else {
    header("Location:contact.php");
    exit;
}
?>
