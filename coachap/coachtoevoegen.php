<html>
<?php require_once "../src/adminsession.php";?>

<head>
    <meta content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login BBL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/coach.css" type="text/css" />

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
                if (isset($_SESSION['coach_data'])) {
                                                    echo ' <a class="nav-link text-light" href="../coachusers.php">UserPanel</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['bedrijf_data'])) {
                                                    echo ' <a class="nav-link text-light" href="../bedrijfusers.php">BedrijfUserPanel</a>';
                                                }?>
                                                <?php
                if (isset($_SESSION['admin_data'])) {
                                                    echo ' <a class="nav-link text-light" href="../users.php">UserPanel</a>';
                                                }?>
                </li>
                <li class="nav-item">
                <?php

if (isset($_SESSION['leerling_data']) || isset($_SESSION['coach_data'])|| isset($_SESSION['admin_data']) || isset($_SESSION['bedrijf_data']) ) {
    echo ' <a class="nav-link text-light" href="../src/logout.php?logout=true">Loguit</a>';
}?>
                </li>

            </ul>
        </div>
    </nav>
    <div class="login-form">

        <div class="container">

            <h2 class="form-hoofdtekst">BBL werkopdracht programma</h2>
            <br>

            <form class="form-login" method="POST" id="login-form" action="../forms/Coachregistratie-form.php">

                <h2 class="form-login-hoofdtekst">Registreer</h2>
                <hr />

                <div class="form-group">
                    <label>Geslacht</label>
                    <select class="form-control" name="geslacht">
                        <option>Man</option>
                        <option>Vrouw</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Titel</label>
                    <select class="form-control" name="titel">
                        <option>Mr.</option>
                        <option>Mrs.</option>
                    </select>

                </div>

                <div class="form-group">
                    <label>geboortedatum</label>
                    <input type="date" class="form-control" name="geboortedatum" placeholder="Geboortedatum">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="voornaam" placeholder="Voornaam">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="tussenvoegsel" placeholder="Tussenvoegsel">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="achternaam" placeholder="Achternaam">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="straat" placeholder="Straat">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="huisnummer" placeholder="Huisnummer">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="huisnummertoevoeging" placeholder="Huisnummertoevoeging">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="postcode" placeholder="Postcode">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="plaats" placeholder="Plaats">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="land" placeholder="Land">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="telefoonnummer" placeholder="Telefoonnummer">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="mobielnummer" placeholder="Mobielnummer">

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">

                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="wachtwoord" placeholder="Wachtwoord">

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="wachtwoord2" placeholder="Bevestig je wachtwoord">

                </div>
                <hr />
                <div class="form-group flex text-center">
                    <button type="submit" name="submit" class="btn btn-color">Registreer</button>
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
                    <h5 class=" text-white mb-1">Login</h5>
                </li>
                <li class="list-inline-item">
                    <a href="Login" class="btn btn-outline-light btn-rounded">Inloggen</a>
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

</html>