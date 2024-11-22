

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Videojuegos</title>

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
    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

       <!--Menu-->
<?php include 'menu.php'; ?>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="../index.html">
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

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php">Pagina principal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Busqueda rapida</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="listing-page.php">Videjuegos</a></li>

                                <li><a class="dropdown-item" href="detail-page.html">Consolas</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contacto</a>
                        </li>
                    </ul>

                    <div class="ms-4">
                        <a href="contact.php" class="btn custom-btn custom-border-btn smoothscroll">Iniciar sesion</a>
                    </div>
                </div>
            </div>
        </nav>


        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">

                        <h2 class="mb-0">Videojuegos</h2>
                    </div>

                </div>
            </div>
        </header>


        <section class="latest-podcast-section section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Algunos Nuevos</h4>
                        </div>
                    </div>

                    <!--Juego 1-->
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="https://www.youtube.com/watch?v=U7Z3cu7TWKo" class="custom-block-image-wrap">
                                        <img src="../images/juegos/CODBO6xBOX.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="agregar_carrito.php?id_videojuego=1" class="btn custom-btn">Comprar</a>
                                </div>
                                
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        
                                        $1,599
                                    </small>

                                    <small>PS5/XBOX/PC <span class="badge">3</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        COD BO6
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="../images/consolas/XboxSeries.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        Recomendado con Xbox
                                        <img src="../images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>HD4K</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Clasificacion: Adultos (Mayores de 18 años)</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                    <a href="#" class="bi-heart me-1">
                                        <span>42.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>11k</span>
                                    </a>

                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Juego 2-->
                    <div class="col-lg-6 col-12">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="https://www.youtube.com/watch?v=CMvrMTmuJuA" class="custom-block-image-wrap">
                                        <img src="../images/juegos/SH.jpg" class="custom-block-image img-fluid"
                                            alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="agregar_carrito.php?id_videojuego=2" class="btn custom-btn">Comprar</a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <i class="bi-clock-fill custom-icon"></i>
                                        $1,479
                                    </small>

                                    <small>PS5,PC<span class="badge">2</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Silent Hill
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="../images/consolas/PS5.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>Recomendado para PS5
                                        <img src="../images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>HD4K</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Clasificacion: Adultos (Mayores de 18 años)</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                    <a href="#" class="bi-heart me-1">
                                        <span>22.4k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>16k</span>
                                    </a>

                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Juego 3-->
                    <div class="col-lg-6 col-12">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="https://www.youtube.com/watch?v=5yFdfcsMqjw" class="custom-block-image-wrap">
                                        <img src="../images/juegos/MarioAndLuigiBrothers.jpg" class="custom-block-image img-fluid"
                                            alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn custom-btn">
                                        Comprar
                                    </a>
                                </div>
                            </div>
                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <i class="bi-clock-fill custom-icon"></i>
                                        $1,399.99
                                    </small>

                                    <small>Nintendo Switch<span class="badge">1</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Mario And Luigi Brothership
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="../images/consolas/Ns.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>Recomendado para Nintendo Switch
                                        <img src="../images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>HD4K</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Clasificacion: Para toda la familia</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                    <a href="#" class="bi-heart me-1">
                                        <span>10.1k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>2k</span>
                                    </a>

                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Juego 4-->
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="https://www.youtube.com/watch?v=1ltsk99E-RY" class="custom-block-image-wrap">
                                        <img src="../images/juegos/DragonQuest.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn custom-btn">
                                        Comprar
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        
                                        $1,249.99
                                    </small>

                                    <small>PS5/XBOX/NS <span class="badge">3</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Dragon Quest 3 Remake
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="../images/consolas/Ns.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        Recomendado con Nintendo Switch
                                        <img src="../images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>HD4K</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Clasificacion: Para toda la familia</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                    <a href="#" class="bi-heart me-1">
                                        <span>22k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>6.4k</span>
                                    </a>

                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Juego 5-->
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="https://www.youtube.com/watch?v=u83VdXAVq08" class="custom-block-image-wrap">
                                        <img src="../images/juegos/BlackMyth.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn custom-btn">
                                        Comprar
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        
                                        $1,699.99
                                    </small>

                                    <small>PS5 <span class="badge">1</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Black Myth Wukong
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="../images/consolas/PS5.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        Recomendado con PS5
                                        <img src="../images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>HD4K</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Clasificacion: Adultos (Mayores de 18 años)</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">

                                    <a href="#" class="bi-heart me-1">
                                        <span>89.2k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>35k</span>
                                    </a>

                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

                    <div class="col-lg-4 col-12 mx-auto">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center mt-5">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <li class="page-item active"><a class="page-link" href="#">1</a></li>

                                <li class="page-item"><a class="page-link" href="#">2</a></li>

                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </section>


        <section class="trending-podcast-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Trending episodes</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-page.html">
                                    <img src="images/podcast/27376480_7326766.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Vintage Show
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/woman-posing-black-dress-medium-shot.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>Elsa
                                        <strong>Influencer</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-page.html">
                                    <img src="images/podcast/27670664_7369753.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Vintage Show
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/cute-smiling-woman-outdoor-portrait.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        Taylor
                                        <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>Creator</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-page.html">
                                    <img src="images/podcast/12577967_02.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Daily Talk
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        William
                                        <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>Vlogger</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="subscribe-form-wrap">
                        <h6>Subscribe. Every weekly.</h6>

                        <form class="custom-form subscribe-form" action="#" method="get" role="form">
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Email Address" required="">

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control" id="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>

                    <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> 010-020-0340</p>

                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="#">inquiry@pod.co</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <h6 class="site-footer-title mb-3">Download Mobile</h6>

                    <div class="site-footer-thumb mb-4 pb-2">
                        <div class="d-flex flex-wrap">
                            <a href="#">
                                <img src="images/app-store.png" class="me-3 mb-2 mb-lg-0 img-fluid" alt="">
                            </a>

                            <a href="#">
                                <img src="images/play-store.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <h6 class="site-footer-title mb-3">Social</h6>

                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container pt-5">
            <div class="row align-items-center">

                <div class="col-lg-2 col-md-3 col-12">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                    </a>
                </div>

                <div class="col-lg-7 col-md-9 col-12">
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Homepage</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Browse episodes</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Help Center</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright © 2036 Talk Pod Company
                        <br><br>
                        Design: <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">TemplateMo</a>
                    </p> Distribution: <a rel="nofollow" href="https://themewagon.com" target="_blank">ThemeWagon</a>
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