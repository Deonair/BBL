<?php
require_once "src/dbclass.php";

$leerling = new coach;
$leerlingid = $_GET['leerlingenid'];
$rol = $_GET['rol'];
$leerling = $leerling->getLeerling($leerlingid, $rol);
$_SESSION['leerling_data'] = serialize($leerling);
// print_r($leerling);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/welkom.css">
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
                    <a class="nav-link  text-light" href="../index.php">Home </a>
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
    <div class="login-form">

        <div class="container">

            <h2 class="form-hoofdtekst">BBL werkopdracht programma</h2>
            <br>

            <form class="form-login" method="POST" id="login-form" action="../forms/updategebruiker-form.php">

                <h2 class="form-login-hoofdtekst">Bewerk</h2>
                <hr />

               

                <div class="form-group">
                    <label>geboortedatum</label>
                    <input type="date" class="form-control" name="geboortedatum" placeholder="<?php echo $leerling["geboortedatum"]; ?>">
                    <input type="hidden" class="form-control" name="rol" value="<?php echo $leerling["rol"]; ?>">
                    <input type="hidden" class="form-control" name="gebruikerid" value="<?php echo $leerling["id_gebruiker"]; ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="voornaam" placeholder="<?php echo $leerling["voornaam"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="tussenvoegsel" placeholder="<?php echo $leerling["tussenvoegsels"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="achternaam" placeholder="<?php echo $leerling["achternaam"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="straat" placeholder="<?php echo $leerling["straat"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="huisnummer" placeholder="<?php echo $leerling["huisnummer"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="huisnummertoevoeging" placeholder="<?php echo $leerling["huisnummertoevoeging"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="postcode" placeholder="<?php echo $leerling["postcode"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="plaats" placeholder="<?php echo $leerling["plaats"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="land" placeholder="<?php echo $leerling["land"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="telefoonnummer" placeholder="<?php echo $leerling["telefoonnummer"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="mobielnummer" placeholder="<?php echo $leerling["mobielnummer"]; ?>">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="<?php echo $leerling["email"]; ?>">

                </div>
                <hr />
                <div class="form-group flex">
                    <button type="submit" name="submit" class="btn btn-color">Bewerk</button>
                </div>
                <br>
                <?php

                if (isset($_SESSION['ERRORS'])) {
                    echo $_SESSION['ERRORS'];
                    // This is in the PHP file and sends a Javascript alert to the client
                    $bericht = "Check onderin wat er mis is gegaan";
                    echo "<script type='text/javascript'>alert('$bericht');</script>";
                    unset($_SESSION['ERRORS']);
                }
                ?>
                <br>
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
    <!-- Footer -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>