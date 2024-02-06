<?php
require_once("src/leerlingsession.php");
    require_once("src/dbclass.php");
    $gebruiker = unserialize($_SESSION['leerling_data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="css/contact.css">
    <title>Contact</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php"><img src="img/logo2.png"></a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link  text-light" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="meetinstrument.php">Meetinstrument</a>
                </li>
                <li class="nav-item ml-auto"><?php

                              if (isset($_SESSION['leerling_data'])) {
                                echo ' <a class="nav-link text-light" href="src/logout.php?logout=true">Loguit</a>';
                              } else {
                                echo '<a class="nav-link text-light" href="login.php">Login</a>';
                              } ?>

        </li>


            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row text-center">
            <h2 class="display-4 mb-4">Meetinstrument</h2>
            <form name="contact" action="forms/meetinstrument-form.php" method="post">
                <label><?php  echo $gebruiker->rol . " " . $gebruiker->voornaam. " " . $gebruiker->tussenvoegsel.  " " . $gebruiker->achternaam;?></label>
                <br>
                <br>


                <label>Onderwerp</label>
                <input type="text" class="form-control mb-4 text-center" name="onderwerp" placeholder="Vul uw onderwerp in...">


                <label>Vul hier in wat jij je in wilt verdiepen</label>
                <textarea name="posts" class="form-control mb-4" rows="7" cols="130%"></textarea>
                <button class="btn btn-lg btn-color btn-block mt-3" type="submit">Verstuur</button>
            </form>
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
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>