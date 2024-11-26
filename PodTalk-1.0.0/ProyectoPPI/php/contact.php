<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cuentas</title>
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
<!--Inicio de la pagina-->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.php">
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
<!--Menu principal -->
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
                                <li><a class="dropdown-item" href="detail-page.html">Consolas</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ms-4">
                        <a href="listing-page.php" class="btn custom-btn custom-border-btn smoothscroll">Empezar a comprar</a>
                    </div>
                </div>
            </div>
        </nav>
<!--Titulo-->
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">INICIA SESION</h2>
                    </div>
                </div>
            </div>
        </header>

<!--Inicio de sesion-->
<section class="login-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Iniciar Sesión</h4>
                    </div>
                    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'credenciales_invalidas') : ?>
                        <div class="alert alert-danger">
                            Credenciales inválidas. Por favor, inténtalo de nuevo.
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'debes_iniciar_sesion') : ?>
                        <div class="alert alert-warning">
                            Debes iniciar sesión para continuar.
                        </div>
                    <?php endif; ?>
                    <form id="loginForm" action="login.php" method="post" class="custom-form contact-form" role="form">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" required>
                            <label for="email">Correo Electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>
                            <label for="contrasena">Contraseña</label>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!--Formulario para creacion de cuenta-->
<section class="contact-section section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Creacion de cuenta</h4>
                </div>
                        <form id="crearCuentaForm" action="crear_cuenta.php" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                        <label for="floatingInput">Nombre completo</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required="">
                                        <label for="floatingInput">Contraseña</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="edad" id="edad" class="form-control" placeholder="Edad" required="">
                                        <label for="floatingInput">Edad</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="number" name="codigo_postal" id="codigo_postal" class="form-control" placeholder="Código Postal" required="">
                                        <label for="floatingInput">Código Postal</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <select name="pais" id="pais" class="form-control" required="">
                                            <option value="" disabled selected>Seleccione un país</option>
                                            <option value="Mexico">México</option>
                                            <option value="Estados Unidos">Estados Unidos</option>
                                            <option value="Canada">Canadá</option>
                                        </select>
                                        <label for="floatingInput">País</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento" required="">
                                        <label for="floatingInput">Fecha de Nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Crear</button>
                                </div>
                            </div>
                        </form>                        
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
                    <a class="navbar-brand" href="about.php">
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
<!--Para el formulario-->
<script>
    document.getElementById('crearCuentaForm').addEventListener('submit', function(event) {
        event.preventDefault(); 
        const formData = new FormData(this);
        fetch('php/crear_cuenta.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) 
        .then(data => {
            if (data.status === 'success') {
                alert(data.message); 
                this.reset(); 
            } else {
                alert(data.message); 
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un problema al procesar la solicitud.');
        });
    });
</script>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>