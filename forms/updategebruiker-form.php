<?php
session_start();

require_once '../src/dbclass.php';
$Leerlingen = new Leerlingen();
$post = $_POST;
$voornaam = $post['voornaam'];
$tussenvoegsel = $post['tussenvoegsel'];
$achternaam = $post['achternaam'];
$straat = $post['straat'];
$huisnummer = $post['huisnummer'];
$huisnummertoevoeging = $post['huisnummertoevoeging'];
$postcode = $post['postcode'];
$plaats = $post['plaats'];
$land = $post['land'];
$email = $post['email'];
$telefoonnummer = $post['telefoonnummer'];
$mobielnummer = $post['mobielnummer'];

$rol = $post['rol'];
$gebruikerid = $post['gebruikerid'];
// validatie checker
if (isset($_POST['submit'])) {



    //check voornaam
    if (!empty($voornaam)) {
        $firstname_subject = $voornaam;
        $firstname_pattern = '/^[a-zA-Z ]*$/';
        $firstname_match = preg_match($firstname_pattern, $firstname_subject);
        if ($firstname_match !== 1) {
            $error[] = "Voornaam mag alleen alfabetisch letters bevatten";
        }
    } 

    //check achternaam
    if (!empty($achternaam)) {
        $lastname_subject = $achternaam;
        $lastname_pattern = '/^[a-zA-Z ]*$/';
        $lastname_match = preg_match($lastname_pattern, $lastname_subject);
        if ($lastname_match !== 1) {
            $error[] = "Achternaam mag alleen alfabetische letters bevatten";
        }
    } 

    //check straat
    if (!empty($straat)) {
        $straat_subject = $straat;
        $straat_pattern = '/^[a-zA-Z ]*$/';
        $straat_match = preg_match($straat_pattern, $straat_subject);
        if ($straat_match !== 1) {
            $error[] = "Straat mag alleen alfabetische letters bevatten";
        }
    } 

    //check huisnummer
    if (!empty($huisnummer)) {
        $huisnummer_subject = $huisnummer;
        $huisnummer_pattern = '/^[0-9]*$/';
        $huisnummer_match = preg_match($huisnummer_pattern, $huisnummer_subject);
        if ($huisnummer_match !== 1) {
            $error[] = "Huisnummer mag alleen nummers bevatten";
        }
    } 

    //check postcode
    if (!empty($postcode)) {
        $postcode_subject = $postcode;
        $postcode_pattern = '/^[0-9A-Za-z]*$/';
        $postcode_match = preg_match($postcode_pattern, $postcode_subject);
        if ($postcode_match !== 1) {
            $error[] = "Postcode mag alleen alfabetische letters en nummers bevatten";
        }
    } 
    //check plaats
    if (!empty($plaats)) {
        $plaats_subject = $plaats;
        $plaats_pattern = '/^[a-zA-Z ]*$/';
        $plaats_match = preg_match($plaats_pattern, $plaats_subject);
        if ($plaats_match !== 1) {
            $error[] = "Plaats mag alleen alfabetisch, steepjes en of spaties bevatten";
        }
    } 

    //check land
    if (!empty($land)) {
        $land_subject = $land;
        $land_pattern = '/^[a-zA-Z ]*$/';
        $land_match = preg_match($land_pattern, $land_subject);
        if ($land_match !== 1) {
            $error[] = "Land mag alleen alfabetisch, steepjes en of spaties bevatten";
        }
    } 

    //check email
    if (!empty($email)) {
        $email_subject = $email;
        $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        $email_match = preg_match($email_pattern, $email_subject);
        if ($email_match !== 1) {
            $error[] = "Email moet een @ bevatten dus: voorbeeld@vo.com";
        }
    } 

    //check telefoonnummer
    if (!empty($telefoonnummer)) {
        $telefoonnummer_subject = $telefoonnummer;
        $telefoonnummer_pattern = '/^[0-9]*$/';
        $telefoonnummer_match = preg_match($telefoonnummer_pattern, $telefoonnummer_subject);
        if ($telefoonnummer_match !== 1) {
            $error[] = "Telefoonnummer mag alleen nummersbevatten";
        }
    } 
    //check mobielnummer
    if (!empty($mobielnummer)) {
        $mobielnummer_subject = $mobielnummer;
        $mobielnummer_pattern = '/^[0-9]*$/';
        $mobielnummer_match = preg_match($mobielnummer_pattern, $mobielnummer_subject);
        if ($mobielnummer_match !== 1) {
            $error[] = "Mobielnummer mag alleen nummers bevatten";
        }
    } 


    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../studentenap/gebruikerwijzigen.php');
    } else {
        $update = $Leerlingen->update($gebruikerid, $rol, $voornaam, $tussenvoegsel, $achternaam, $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats, $land, $email, $telefoonnummer, $mobielnummer);
        if (is_bool($update)) {
            //Voer ook uit als geen nieuw wachtwoord of email zijn ingevoerd
            $update = $Leerlingen->update($gebruikerid, $rol, $voornaam, $tussenvoegsel, $achternaam, $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats, $land, $email, $telefoonnummer, $mobielnummer);
            //Volgende locatie
            header('Location: ../studentap/studentenoverzicht2.php');
        } elseif (is_string($update)) {
            $_SESSION['ERRORS'] = $update;
            header('Location: ../studentapgebruikerwijzigen.php');
        }
    }
        // print_r(
        
        //         $rol . "<br>" .
        //         $voornaam . "<br>" .
        //         $tussenvoegsel . "<br>" .
        //         $achternaam . "<br>" .
        //         $straat . "<br>" .
        //         $huisnummer . "<br>" .
        //         $huisnummertoevoeging . "<br>" .
        //         $postcode . "<br>" .
        //         $plaats . "<br>" .
        //         $land . "<br>" .
        //         $email . "<br>" .
        //         $telefoonnummer . "<br>" .
        //         $mobielnummer . "<br>" .
        //         $gebruikerid . "<br>"

        // );
    
    }
