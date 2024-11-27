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
$carritoItems = [];
$totalCarrito = 0;
if (isset($_SESSION['usuario_id'])) {
    $usuarioId = $_SESSION['usuario_id'];
    $usuarioNombre = $_SESSION['usuario_nombre'];
    $query = "
        SELECT c.id AS carrito_id, v.id AS videojuego_id, v.titulo, v.precio, c.cantidad 
        FROM carrito c 
        JOIN videojuegos v ON c.videojuego_id = v.id 
        WHERE c.usuario_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $carritoItems[] = $row;
        $totalCarrito += $row['precio'] * $row['cantidad'];
    }
}
?>
<div id="menuCarrito" style="position: fixed; top: 0; right: 0; width: 300px; height: 100%; background-color: #003366; color: white; display: none; z-index: 1000; overflow-y: auto;">
    <div style="padding: 20px;">
        <h4 style="color: white;">Carrito</h4>
        <p style="color: white;"><?php echo htmlspecialchars($usuarioNombre); ?></p>
        <hr style="border-color: white;">
        <?php if (!empty($carritoItems)): ?>
            <ul class="list-group" style="background: none; border: none;">
                <?php foreach ($carritoItems as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background: none; border: none; color: white;">
                        <span><?php echo htmlspecialchars($item['titulo']); ?> (<?php echo $item['cantidad']; ?>)</span>
                        <span>$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></span>
                        <a href="eliminar_producto.php?videojuego_id=<?= $item['videojuego_id'] ?>&cantidad=1" class="btn btn-danger btn-sm">Eliminar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="mt-3 text-end">
                <strong>Total: $<?php echo number_format($totalCarrito, 2); ?></strong>
            </div>
            <div class="mt-3">
                <button class="btn btn-danger form-control mb-3" onclick="location.href='vaciar_carrito.php';">Vaciar Carrito</button>
            </div>
        <?php else: ?>
            <p class="text-center my-3">El carrito está vacío.</p>
        <?php endif; ?>
        <hr style="border-color: white;">
        <button class="btn btn-primary form-control mb-3" onclick="location.href='finalizar_compra.php';">Finalizar Compra</button>
        <button class="btn btn-light form-control" onclick="toggleMenu();">Cerrar</button>
        <hr>
        <div class="d-flex justify-content-between mt-3">
            <button class="btn btn-danger" onclick="location.href='logout.php';">Cerrar Sesión</button>
        </div>
    </div>
</div>
<button onclick="toggleMenu()" style="position: fixed; top: 20px; right: 20px; z-index: 1001; background: #003366; color: white; border: none; padding: 10px 20px; border-radius: 5px;">
    Ver Carrito
</button>
<script>
    function toggleMenu() {
        const menu = document.getElementById('menuCarrito');
        menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'block' : 'none';
    }
</script>
