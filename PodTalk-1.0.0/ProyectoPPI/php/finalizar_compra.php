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
if (isset($_SESSION['usuario_id'])) {
    $usuarioId = $_SESSION['usuario_id'];
    $query = "
        SELECT c.videojuego_id, c.cantidad, v.precio, v.cantidad_en_almacen 
        FROM carrito c 
        JOIN videojuegos v ON c.videojuego_id = v.id 
        WHERE c.usuario_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->begin_transaction();
    try {
        while ($row = $result->fetch_assoc()) {
            $videojuegoId = $row['videojuego_id'];
            $cantidadComprada = $row['cantidad'];
            $cantidadDisponible = $row['cantidad_en_almacen'];
            $precio = $row['precio'];
            $ingreso = $cantidadComprada * $precio;
            if ($cantidadDisponible >= $cantidadComprada) {
                $updateStock = "UPDATE videojuegos SET cantidad_en_almacen = cantidad_en_almacen - ? WHERE id = ?";
                $stmtUpdate = $conn->prepare($updateStock);
                $stmtUpdate->bind_param("ii", $cantidadComprada, $videojuegoId);
                $stmtUpdate->execute();

                $insertVenta = "INSERT INTO ventas (usuario_id, videojuego_id, cantidad, fecha_compra, ingresos) VALUES (?, ?, ?, NOW(), ?)";
                $stmtVenta = $conn->prepare($insertVenta);
                $stmtVenta->bind_param("iiid", $usuarioId, $videojuegoId, $cantidadComprada, $ingreso);
                $stmtVenta->execute();
            } else {
                throw new Exception("Stock insuficiente para el videojuego ID $videojuegoId.");
            }
        }
        $deleteCarrito = "DELETE FROM carrito WHERE usuario_id = ?";
        $stmtDelete = $conn->prepare($deleteCarrito);
        $stmtDelete->bind_param("i", $usuarioId);
        $stmtDelete->execute();
        $conn->commit();
        header("Location:listing-page.php?status=success");
        exit;
    } catch (Exception $e) {
        $conn->rollback();
        header("Location:listing-page.php?status=error");
        exit;
    }
} else {
    header("Location:contact.php");
    exit;
}
?>
