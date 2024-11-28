<!-- PHP para manejar los datos -->
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
$queryDesarrolladores = "SELECT id, nombre FROM desarrolladores";
$resultDesarrolladores = $conn->query($queryDesarrolladores);
if (!$resultDesarrolladores) {
    die("Error al obtener los desarrolladores: " . $conn->error);
}
// Agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo_producto'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $plataforma = $_POST['plataforma'];
    $fechaLanzamiento = $_POST['fecha_lanzamiento'];
    $desarrolladorId = intval($_POST['desarrollador_id']);
    $editor = $_POST['editor'];
    $modoJuego = $_POST['modo_juego'];
    $clasificacion = floatval($_POST['clasificacion']);
    $precio = floatval($_POST['precio']);
    $descripcion = $_POST['descripcion'];
    $fotos = $_POST['fotos'];
    $cantidadEnAlmacen = intval($_POST['cantidad_en_almacen']);
    $fabricante = $_POST['fabricante'];
    $origen = $_POST['origen'];
    $query = "INSERT INTO videojuegos (titulo, genero, plataforma, fecha_lanzamiento, desarrollador_id, editor, modo_juego, clasificacion, precio, descripcion, fotos, cantidad_en_almacen, fabricante, origen)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        "ssssisssdsisds",
        $titulo,
        $genero,
        $plataforma,
        $fechaLanzamiento,
        $desarrolladorId,
        $editor,
        $modoJuego,
        $clasificacion,
        $precio,
        $descripcion,
        $fotos,
        $cantidadEnAlmacen,
        $fabricante,
        $origen
    );
    if ($stmt->execute()) {
        echo "<script>alert('Producto agregado correctamente');</script>";
    } else {
        echo "<script>alert('Error al agregar el producto');</script>";
    }
}
// Modificar cantidad en almacén
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $id = intval($_POST['id']);
    $new_quantity = intval($_POST['cantidad_en_almacen']);
    $query = "UPDATE videojuegos SET cantidad_en_almacen = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ii", $new_quantity, $id);
        if ($stmt->execute()) {
            echo "<script>
                    alert('Cantidad actualizada correctamente.');
                    window.location.href = 'about.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al actualizar la cantidad.');
                    window.location.href = 'about.php';
                  </script>";
        }
    }
}
// Consultar productos existentes
$queryProductos = "SELECT id, titulo, cantidad_en_almacen FROM videojuegos";
$resultProductos = $conn->query($queryProductos);
if (!$resultProductos) {
    die("Error al obtener los productos: " . $conn->error);
}
// Consultar ventas
$queryVentas = "SELECT v.id AS venta_id, u.nombre_usuario, j.titulo, v.cantidad, v.fecha_compra, v.ingresos
                FROM ventas v
                JOIN usuarios u ON v.usuario_id = u.id
                JOIN videojuegos j ON v.videojuego_id = j.id";
$resultVentas = $conn->query($queryVentas);
?>
<!--HTML-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
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
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="../index.php">
                    <img src="../images/logo.jpg" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>
                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
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
                            <a class="nav-link" href="../index.php">Pagina principal</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Busqueda rapida</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="listing-page.php">Videojuegos</a></li>
                                <li><a class="dropdown-item" href="detail-page.php">Perfil del usuario</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ms-4">
                        <a href="contact.php" class="btn custom-btn custom-border-btn smoothscroll">Iniciar sesion</a>
                    </div>
                </div>
            </div>
        </nav>
<!--Bienvenida-->
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Bienvenido Administrador</h2>
                    </div>
                </div>
            </div>
        </header>
<!-- Tabla para modificar productos -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Cantidad en Almacén</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $resultProductos->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td>
                    <form action="about.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="number" name="cantidad_en_almacen" value="<?php echo $row['cantidad_en_almacen']; ?>" class="form-control">
                </td>
                <td>
                        <button type="submit" name="update_quantity" class="btn btn-primary">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<!--Agregar nuevo producto-->
<section class="contact-section section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Agregar Nuevo Producto</h4>
                </div>
                <form id="agregarProductoForm" action="" method="post" class="custom-form contact-form" role="form">
                    <input type="hidden" name="nuevo_producto" value="1">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" required="">
                                <label for="titulo">Título</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="genero" id="genero" class="form-control" placeholder="Género" required="">
                                <label for="genero">Género</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="plataforma" id="plataforma" class="form-control" placeholder="Plataforma" required="">
                                <label for="plataforma">Plataforma</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="form-control" placeholder="Fecha de Lanzamiento" required="">
                                <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <select name="desarrollador_id" id="desarrollador_id" class="form-control" required="">
                                    <option value="" disabled selected>Seleccione un desarrollador</option>
                                    <?php if ($resultDesarrolladores->num_rows > 0): ?>
                                        <?php while ($row = $resultDesarrolladores->fetch_assoc()): ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nombre']); ?></option>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <option value="">No hay desarrolladores disponibles</option>
                                    <?php endif; ?>
                                </select>
                                <label for="desarrollador_id">Desarrollador</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="editor" id="editor" class="form-control" placeholder="Editor" required="">
                                <label for="editor">Editor</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="modo_juego" id="modo_juego" class="form-control" placeholder="Modo de Juego" required="">
                                <label for="modo_juego">Modo de Juego</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="number" step="0.1" name="clasificacion" id="clasificacion" class="form-control" placeholder="Clasificación" required="">
                                <label for="clasificacion">Clasificación</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="number" step="0.01" name="precio" id="precio" class="form-control" placeholder="Precio" required="">
                                <label for="precio">Precio</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" required=""></textarea>
                                <label for="descripcion">Descripción</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="fotos" id="fotos" class="form-control" placeholder="Ruta de la Foto" required="">
                                <label for="fotos">Foto (Ruta)</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="number" name="cantidad_en_almacen" id="cantidad_en_almacen" class="form-control" placeholder="Cantidad en Almacén" required="">
                                <label for="cantidad_en_almacen">Cantidad en Almacén</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" name="fabricante" id="fabricante" class="form-control" placeholder="Fabricante" required="">
                                <label for="fabricante">Fabricante</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="origen" id="origen" class="form-control" placeholder="Origen" required="">
                                <label for="origen">Origen</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control">Agregar Producto</button>
                        </div>
                    </div>
                </form>                        
            </div>
        </div>
    </div>
</section>
    <hr>
<<!--Tabla de ventas-->
<section class="contact-section section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Tabla de Ventas</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID Venta</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Videojuego</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha de Compra</th>
                                <th scope="col">Ingresos</th>
                            </tr>
                        </thead>
                        <!--Despliegue de informacion de la base de datos, para la tabla ventas-->
                        <tbody>
                            <?php if ($resultVentas->num_rows > 0): ?>
                                <?php while ($row = $resultVentas->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['venta_id']); ?></td>
                                        <td><?php echo htmlspecialchars($row['nombre_usuario']); ?></td>
                                        <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                                        <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                        <td><?php echo htmlspecialchars($row['fecha_compra']); ?></td>
                                        <td>$<?php echo number_format($row['ingresos'], 2); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No hay ventas registradas</td>
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
    <?php
$conn->close();
?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>