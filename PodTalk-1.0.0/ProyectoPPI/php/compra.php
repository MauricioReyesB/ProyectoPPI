<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$success = isset($_GET['success']) && $_GET['success'] == 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa</title>
</head>
<body>
    <h1>Compra Exitosa</h1>
    <?php if ($success): ?>
        <p>¡Gracias por tu compra! Tu pedido ha sido procesado exitosamente.</p>
    <?php else: ?>
        <p>Hubo un problema con tu compra. Por favor, intenta nuevamente.</p>
    <?php endif; ?>
    <a href="listing-page.php">Regresar a la tienda</a>
</body>
</html>
