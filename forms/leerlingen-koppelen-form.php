<?php
//Sessie starten
session_start();
//Roep class bestand op
require_once '../src/dbclass.php';
//Pak sessie data uit
//Pass POST variable
$post = $_POST;
$begindatum = $post['begindatum'];
$bedrijfid = $post['bedrijfid'];
$einddatum = $post['einddatum'];
$id_gebruiker = $post['id_gebruiker'];
$stage = new Lbedrijf();
print_r($begindatum. "<br>" . $einddatum. "<br>" . $id_gebruiker. "<br>" .$bedrijfid);
//Zet sessie id in user id
// validatie checker

//check geboortedatum
if (empty($einddatum)) {
    $error[] = "Vul een Einddatum in.";
}
//check geboortedatum
if (empty($begindatum)) {
    $error[] = "Vul een Begindatum in.";
}
if (isset($_POST['submit'])) {

    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        var_dump($_SESSION['ERRORS']);
        
        header('Location:../stageap/leerlingen-koppelen.php');
    } else {
        $Lbedrijf = $stage->setLeerlingBedrijf($id_gebruiker, $bedrijfid, $begindatum, $einddatum);
        if (is_bool($Lbedrijf)) {
                // terug naar begin pagina
                header('Location: ../studentap/studentenoverzicht.php');
        } 
        elseif (is_string($Lbedrijf)) {
            $_SESSION['ERRORS'] = $Lbedrijf;
            // echo "verkeerd data ingevuld";
            echo $_SESSION['ERRORS'];

            // header('Location: ../studentap/leerlingen-koppelen.php');
        }
    }
}