<?php
session_start();
// require_once("src/iedereensession.php");

require_once("src/dbclass.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/test1.css">
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php"><img src="img/logo2.png"></a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link  text-light" href="index.php">Home </a>
                </li>
                <li class="nav-item"><?php
                if (isset($_SESSION['leerling_data']) ) {
                                                    echo ' <a class="nav-link text-light" href="meetinstrument.php">Meetinstrument</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['coach_data'])) {
                                                    echo ' <a class="nav-link text-light" href="coachusers.php">UserPanel</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['bedrijf_data'])) {
                                                    echo ' <a class="nav-link text-light" href="bedrijfusers.php">BedrijfUserPanel</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['admin_data'])) {
                                                    echo ' <a class="nav-link text-light" href="users.php">UserPanel</a>';
                                                }?>
                </li>
                <li class="nav-item ml-auto"><?php

                                                if (isset($_SESSION['leerling_data']) || isset($_SESSION['coach_data'])|| isset($_SESSION['admin_data']) || isset($_SESSION['bedrijf_data']) ) {
                                                    echo ' <a class="nav-link text-light" href="src/logout.php?logout=true">Loguit</a>';
                                                } else {
                                                    echo '<a class="nav-link text-light" href="login.php">Login</a>';
                                                } ?>

                </li>

            </ul>
        </div>
    </nav>

    <!-- <div class="hero-image">
        <div class="hero-text"> -->
    <div class="container">
        <header class="showcase">
            <div class="showcase-content">
                <div>
                    <h1>MAAK KENNIS MET BBL EDUCATOR
                        <?php
                        if (isset($_SESSION['leerling_data'])) {
                            $gebruiker = unserialize($_SESSION['leerling_data']);
                            echo $gebruiker->rol . " " . $gebruiker->voornaam . " " . $gebruiker->tussenvoegsel .  " " . $gebruiker->achternaam;
                        }
                        if (isset($_SESSION['coach_data'])) {
                            $coach = unserialize($_SESSION['coach_data']);
                            echo $coach->rol . " " . $coach->voornaam . " " . $coach->tussenvoegsel .  " " . $coach->achternaam;
                        } 
                        if (isset($_SESSION['bedrijf_data'])) {
                            $bedrijf = unserialize($_SESSION['bedrijf_data']);
                            echo $bedrijf->rol . " " . $bedrijf->voornaam . " " . $bedrijf->tussenvoegsel .  " " . $bedrijf->achternaam;
                        }
                        if (isset($_SESSION['admin_data'])) {
                            $admin = unserialize($_SESSION['admin_data']);
                            echo $admin->rol . " " . $admin->voornaam . " " . $admin->tussenvoegsel .  " " . $admin->achternaam;
                        }
                        ?> 

                    </h1>
                    <p class="my-1">
                        UW PARTNER IN ONDERWIJSINNOVATIE
                        Educator ontwikkelt softwaretoepassingen voor onderwijs en bedrijfsleven. Hiermee dragen we bij aan goed georganiseerd onderwijs en effectieve begeleiding.
                        Zo vergroten we de mogelijkheden voor persoonlijk onderwijs.
                    </p>
                    <a href="#" class="btn-secondary" width="500px">Learn More</a>
                    <a href="#" class="btn-danger">Sign Up</a>
                </div>
                <img src="https://themesbrand.com/zooki/layouts/images/home-2-img.png" />
            </div>
        </header>
    </div>
    <!-- </div>
    </div> -->

    <div class="container" id="bbl">

        <div class="row text-center">

            <hr>

            <div class="row text-center">
                <h2 class="display-4 mb-4">More Info</h2>
                <div class="col-md-4">
                    <img src="img/usp.jpg" width="250px" height="250px">
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium optio rerum et a vero iusto impedit. Dolorem fugit nisi sed? Iusto excepturi earum nobis sequi pariatur obcaecati quidem ullam incidunt!
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="img/usp.jpg" width="250px" height="250px">
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium optio rerum et a vero iusto impedit. Dolorem fugit nisi sed? Iusto excepturi earum nobis sequi pariatur obcaecati quidem ullam incidunt!
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="img/usp.jpg" width="250px" height="250px">
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium optio rerum et a vero iusto impedit. Dolorem fugit nisi sed? Iusto excepturi earum nobis sequi pariatur obcaecati quidem ullam incidunt!
                    </p>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small pt-4 text-center">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class=" text-white mb-1">Registreer gratis</h5>
                </li>
                <li class="list-inline-item">
                    <a href="registreer.php" class="btn btn-outline-light btn-rounded">Registreer!</a>
                </li>
            </ul>
            <!-- Call to action -->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-white text-center py-3">© 2020 Copyright:
            <a class="text-white" href="#"> RockIT</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>