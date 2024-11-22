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

$totalCarrito = 0;
$itemsCarrito = [];

if (isset($_SESSION['usuario_id'])) {
    $usuarioId = $_SESSION['usuario_id'];

    $query = "
        SELECT v.titulo, v.precio, c.cantidad 
        FROM carrito c 
        JOIN videojuegos v ON c.videojuego_id = v.id 
        WHERE c.usuario_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $itemsCarrito[] = $row;
        $totalCarrito += $row['precio'] * $row['cantidad'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

<section class="purchase-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h1 class="mb-4">Resumen de Compra</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <?php if (!empty($itemsCarrito)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itemsCarrito as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['titulo']); ?></td>
                                    <td>$<?php echo number_format($item['precio'], 2); ?></td>
                                    <td><?php echo $item['cantidad']; ?></td>
                                    <td>$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th>$<?php echo number_format($totalCarrito, 2); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                <?php else: ?>
                    <p class="text-center">Tu carrito está vacío.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12 text-center mt-4">
                <a href="php/procesar_compra.php" class="btn btn-success btn-lg">Confirmar Compra</a>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
