<?php
session_start();
$host = 'localhost';
$dbname = 'juegos';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: contact.php");
    exit;
}
$usuarioId = $_SESSION['usuario_id'];
$queryUsuario = "SELECT * FROM usuarios WHERE id = ?";
$stmtUsuario = $conn->prepare($queryUsuario);
$stmtUsuario->bind_param("i", $usuarioId);
$stmtUsuario->execute();
$resultUsuario = $stmtUsuario->get_result();

if ($resultUsuario->num_rows > 0) {
    $usuario = $resultUsuario->fetch_assoc();
} else {
    echo "<script>alert('Usuario no encontrado.');</script>";
    header("Location: listing-page.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar_usuario'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $pais = $_POST['pais'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion_postal'];
    $queryActualizar = "UPDATE usuarios SET nombre_usuario = ?, email = ?, edad = ?, pais = ?, fecha_de_nacimiento = ?, direccion_postal = ? WHERE id = ?";
    $stmtActualizar = $conn->prepare($queryActualizar);
    $stmtActualizar->bind_param("ssisssi", $nombre, $email, $edad, $pais, $fechaNacimiento, $direccion, $usuarioId);
    if ($stmtActualizar->execute()) {
        echo "<script>alert('Información actualizada correctamente');</script>";
        header("Location: detail-page.php");
        exit;
    } else {
        echo "<script>alert('Error al actualizar la información');</script>";
    }
}
$queryCompras = "SELECT v.id AS venta_id, j.titulo, v.cantidad, v.fecha_compra, v.ingresos
                 FROM ventas v
                 JOIN videojuegos j ON v.videojuego_id = j.id
                 WHERE v.usuario_id = ?";
$stmtCompras = $conn->prepare($queryCompras);
$stmtCompras->bind_param("i", $usuarioId);
$stmtCompras->execute();
$resultCompras = $stmtCompras->get_result();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perfil de usuario</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href="../css/templatemo-pod-talk.css" rel="stylesheet">
</head>
<body>
<!--Menu-->
<?php include 'menu.php'; ?>
    <main>
    <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="../index.php">
                    <img src="../images/logo.jpg" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>
                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Buscar Videojuego"
                            aria-label="Search">
                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
<!--Menu principal-->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php">Pagina principal</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Busqueda rapida</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="listing-page.php">Videjuegos</a></li>
                                <li><a class="dropdown-item" href="detail-page.php">Perfil de Usuario</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ms-4">
                        <a href="contact.php" class="btn custom-btn custom-border-btn smoothscroll">Iniciar sesion</a>
                    </div>
                </div>
            </div>
        </nav>
<!--Titulo-->
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">

                        <h2 class="mb-0">Perfil</h2>
                    </div>

                </div>
            </div>
        </header>
<!--Modificar informacion-->
<section class="contact-section section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Actualizar Información</h4>
                </div>
                <form id="actualizarUsuarioForm" action="" method="post" class="custom-form contact-form" role="form">
                    <input type="hidden" name="actualizar_usuario" value="1">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" required="">
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required="">
                                <label for="email">Correo Electrónico</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="number" name="edad" id="edad" class="form-control" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required="">
                                <label for="edad">Edad</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <select name="pais" id="pais" class="form-control" required="">
                                    <option value="México" <?php echo $usuario['pais'] === "México" ? "selected" : ""; ?>>México</option>
                                    <option value="Estados Unidos" <?php echo $usuario['pais'] === "Estados Unidos" ? "selected" : ""; ?>>Estados Unidos</option>
                                    <option value="Canadá" <?php echo $usuario['pais'] === "Canadá" ? "selected" : ""; ?>>Canadá</option>
                                </select>
                                <label for="pais">País</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="<?php echo htmlspecialchars($usuario['fecha_de_nacimiento']); ?>" required="">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" name="direccion_postal" id="direccion_postal" class="form-control" value="<?php echo htmlspecialchars($usuario['direccion_postal']); ?>" required="">
                                <label for="direccion_postal">Dirección Postal</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
 <!-- Tabla de Compras -->
            <div class="col-lg-12 col-12 mt-5">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Mis Compras</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Compra</th>
                                <th scope="col">Título</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultCompras->num_rows > 0): ?>
                                <?php while ($row = $resultCompras->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['venta_id']); ?></td>
                                        <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                                        <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                        <td><?php echo htmlspecialchars($row['fecha_compra']); ?></td>
                                        <td>$<?php echo number_format($row['ingresos'], 2); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No se encontraron compras.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
    </main>

<!--Footer-->
<footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="subscribe-form-wrap">
                        <h6>Suscribete para recibir ofertas</h6>
                        <form class="custom-form subscribe-form" action="#" method="get" role="form">
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Tu correo electronico" required="">

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control" id="submit">Suscribirme</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contacto</h6>
                    <p class="mb-2"><strong class="d-inline me-2">Telefono:</strong> 010-020-0340</p>
                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="#">videjueogs@anahuac.com</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <h6 class="site-footer-title mb-3">Baja nuestra app</h6>
                    <div class="site-footer-thumb mb-4 pb-2">
                        <div class="d-flex flex-wrap">
                            <a href="#">
                                <img src="../images/app-store.png" class="me-3 mb-2 mb-lg-0 img-fluid" alt="">
                            </a>
                            <a href="#">
                                <img src="../images/play-store.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <h6 class="site-footer-title mb-3">Redes sociales</h6>
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="https://www.instagram.com" target="_blank" class="social-icon-link bi-instagram"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="https://www.twitter.com" target="_blank" class="social-icon-link bi-twitter"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="https://wa.me/1234567890" target="_blank" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-12">
                    <a class="navbar-brand" href="../index.php">
                        <img src="../images/logo.jpg" class="logo-image img-fluid" alt="templatemo pod talk">
                    </a>
                </div>
                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright © 2036 Mauricio Reyes Company
                        <br><br>
                        Design: <a rel="nofollow" href="#" target="_parent">Mauricio Reyes B</a>
                    </p> Distribution: <a rel="nofollow" href="#" target="_blank">Anahuac Norte</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>