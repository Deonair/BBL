
<?php require_once "src/coachsession.php" ;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/users.css">
    <style>footer {
    position: relative;
    width: 100%;
    bottom: 0;
    background-color: black;
    margin-top: 10%
  }</style>
    <title>Welkom</title>
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
                <li class="nav-item">
                <?php
                if (isset($_SESSION['admin_data'])) {
                                                    echo ' <a class="nav-link text-light" href="users.php">UserPanel</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['coach_data'])) {
                                                    echo ' <a class="nav-link text-light" href="coachusers.php">UserPanel</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['bedrijf_data'])) {
                                                    echo ' <a class="nav-link text-light" href="bedrijfusers.php">BedrijfUserPanel</a>';
                                                }?>
                </li>
                <li class="nav-item">
                <?php

if (isset($_SESSION['leerling_data']) || isset($_SESSION['coach_data'])|| isset($_SESSION['admin_data']) || isset($_SESSION['bedrijf_data']) ) {
    echo ' <a class="nav-link text-light" href="src/logout.php?logout=true">Loguit</a>';
}?>
                </li>

            </ul>
        </div>
    </nav>
    <br>
    <br>

    <br><br><br>
    <h1>Welkom</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="studentap/studenten.php">
                    <img src="img/users.png" width="175px" height="175px"><br>
                    <button type="button" class="btn btn-color">Studenten</button>
                </a>
            </div>

            <div class="col-sm">
                <a href="stageap/stage.php">
                    <img src="img/users.png" width="175px" height="175px"><br>
                    <button type="button" class="btn btn-color">Stage</button>
                </a>
                </a>
            </div>

        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            
            <div class="col-sm">
                <a href="bedrijven/bedrijf.php">
                    <img src="img/users.png" width="175px" height="175px"><br>
                    <button type="button" class="btn btn-color">Bedrijven</button>
                </a>
                </a>
            </div>


            <div class="col-sm">
                <a href="Praktijkbegeleiderbedrijfap/praktijkbegeleiderbedrijf.php">
                    <img src="img/users.png" width="175px" height="175px"><br>
                    <button type="button" class="btn btn-color">Praktijkbegeleider bedrijf</button>
                </a>
                </a>
            </div>
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