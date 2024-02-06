<?php
require_once "../src/dbclass.php";
// require_once "../src/iedereensession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/student.css">
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
                    if (isset($_SESSION['coach_data'])) {
                        echo ' <a class="nav-link text-light" href="../coachusers.php">UserPanel</a>';
                    } ?>
                    <?php
                    if (isset($_SESSION['bedrijf_data'])) {
                        echo ' <a class="nav-link text-light" href="../bedrijfusers.php">BedrijfUserPanel</a>';
                    } ?>
                    <?php
                    if (isset($_SESSION['admin_data'])) {
                        echo ' <a class="nav-link text-light" href="../users.php">UserPanel</a>';
                    } ?>
                </li>
                <li class="nav-item">
                    <?php

                    if (isset($_SESSION['leerling_data']) || isset($_SESSION['coach_data']) || isset($_SESSION['admin_data']) || isset($_SESSION['bedrijf_data'])) {
                        echo ' <a class="nav-link text-light" href="../src/logout.php?logout=true">Loguit</a>';
                    } ?>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>

    <div class="container-fluid">
        <div class="row content">
            <div class="row text-center">
                <h1 class="text-center my-3">Studentenoverzicht</h1>
                <hr>

                <div class="table-responsive">

                    <div class="row">

                        <div class="col">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Meetinstrument</th>

                                        <th scope="col">datum</th>

                                        <th scope="col">Bekijken</th>


                                    </tr>

                                </thead>

                                <tbody>

                                    <?php



                                    //zet variable $a op 1 (zodat hij later kan optellen)

                                    $a = 1;

                                    //Foreach om door alle rows een loop te doen
                                    $Leerlingen = new Leerlingen;
                                    //Pass POST variable
                                    $leerlingid = $_GET['leerlingenid'];
                                    $meetinstrumenten_data = $Leerlingen->getMeetinstrumenten($leerlingid);
                                    foreach ($meetinstrumenten_data as $meetinstrument_data) {

                                    ?>

                                        <tr>

                                            <td class="bold"><?php echo $a ?></td>

                                            <td><?php echo $meetinstrument_data['onderwerp'] ?></td>

                                            <td><?php echo $meetinstrument_data['datum'] ?></td>

                                            <td>

                                                <form method="get" action="meetinstrument.php">

                                                    <input type="hidden" name="leerlingenid" value="<?php echo $meetinstrument_data['id_gebruiker'] ?>">

                                                    <input type="hidden" name="id_meetinstrument" value="<?php echo $meetinstrument_data['id_meetinstrument'] ?>">

                                                    <button class="btn btn-color nav-kleur">Bekijk</button>

                                                </form>

                                            </td>




                                        </tr>

                                    <?php

                                        $a++;
                                    }

                                    ?>

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>


    </tbody>
    </table>
    </div>
    </div>
    <hr>


    <br>

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