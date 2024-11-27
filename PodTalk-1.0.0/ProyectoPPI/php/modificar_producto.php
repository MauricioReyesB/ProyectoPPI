<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] != 6) {
    echo "<script>
            alert('No tienes permiso para acceder a esta página.');
            window.location.href = 'listing-page.php';
          </script>";
    exit;
}
$host = 'localhost';
$dbname = 'juegos';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['cantidad_en_almacen'])) {
    $id = intval($_POST['id']);
    $cantidadEnAlmacen = intval($_POST['cantidad_en_almacen']);
    $query = "UPDATE videojuegos SET cantidad_en_almacen = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ii", $cantidadEnAlmacen, $id);
        if ($stmt->execute()) {
            echo "<script>
                    alert('Producto actualizado correctamente.');
                    window.location.href = 'modificar_productos.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al actualizar el producto.');
                    window.location.href = 'modificar_productos.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error al preparar la consulta.');
                window.location.href = 'modificar_productos.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Datos no válidos o incompletos.');
            window.location.href = 'modificar_productos.php';
          </script>";
}
$conn->close();
?>
