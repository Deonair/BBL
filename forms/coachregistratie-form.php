<?php
session_start();

require_once '../src/dbclass.php';
$coach = new coach();
$post = $_POST;
$geslacht = $post['geslacht'];
$titel = $post['titel'];
$geboortedatum = $post['geboortedatum'];
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
$wachtwoord = $post['wachtwoord'];
$wachtwoord2 = $post['wachtwoord2'];
$rol = "coach";
// validatie checker
if (isset($_POST['submit'])) {


    //check geslacht
    if (empty($geslacht)) {
        $error[] = "Kies een geslacht.";
    }

    //check titel
    if (empty($titel)) {
        $error[] = "Hoe wilt u benoemd worden.";
    }

    //check geboortedatum
    if (empty($geboortedatum)) {
        $error[] = "Vul uw geboortedatum in.";
    }

    //check voornaam
    if (!empty($voornaam)) {
        $firstname_subject = $voornaam;
        $firstname_pattern = '/^[a-zA-Z ]*$/';
        $firstname_match = preg_match($firstname_pattern, $firstname_subject);
        if ($firstname_match !== 1) {
            $error[] = "Voornaam mag alleen alfabetisch letters bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Voornaam mag niet leeg zijn.";
    }

    //check achternaam
    if (!empty($achternaam)) {
        $lastname_subject = $achternaam;
        $lastname_pattern = '/^[a-zA-Z ]*$/';
        $lastname_match = preg_match($lastname_pattern, $lastname_subject);
        if ($lastname_match !== 1) {
            $error[] = "Achternaam mag alleen alfabetische letters bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Achternaam mag niet leeg zijn.";
    }

    //check straat
    if (!empty($straat)) {
        $straat_subject = $straat;
        $straat_pattern = '/^[a-zA-Z ]*$/';
        $straat_match = preg_match($straat_pattern, $straat_subject);
        if ($straat_match !== 1) {
            $error[] = "Straat mag alleen alfabetische letters bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Straat mag niet leeg zijn.";
    }

    //check huisnummer
    if (!empty($huisnummer)) {
        $huisnummer_subject = $huisnummer;
        $huisnummer_pattern = '/^[0-9]*$/';
        $huisnummer_match = preg_match($huisnummer_pattern, $huisnummer_subject);
        if ($huisnummer_match !== 1) {
            $error[] = "Huisnummer mag alleen nummers bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Huisnummer mag niet leeg zijn.";
    }

    //check postcode
    if (!empty($postcode)) {
        $postcode_subject = $postcode;
        $postcode_pattern = '/^[0-9A-Za-z]*$/';
        $postcode_match = preg_match($postcode_pattern, $postcode_subject);
        if ($postcode_match !== 1) {
            $error[] = "Postcode mag alleen alfabetische letters en nummers bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Postcode mag niet leeg zijn.";
    }
    //check plaats
    if (!empty($plaats)) {
        $plaats_subject = $plaats;
        $plaats_pattern = '/^[a-zA-Z ]*$/';
        $plaats_match = preg_match($plaats_pattern, $plaats_subject);
        if ($plaats_match !== 1) {
            $error[] = "Plaats mag alleen alfabetisch, steepjes en of spaties bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Plaats mag niet leeg zijn.";
    }

    //check land
    if (!empty($land)) {
        $land_subject = $land;
        $land_pattern = '/^[a-zA-Z ]*$/';
        $land_match = preg_match($land_pattern, $land_subject);
        if ($land_match !== 1) {
            $error[] = "Land mag alleen alfabetisch, steepjes en of spaties bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Land mag niet leeg zijn.";
    }

    //check email
    if (!empty($email)) {
        $email_subject = $email;
        $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        $email_match = preg_match($email_pattern, $email_subject);
        if ($email_match !== 1) {
            $error[] = "Email moet een @ bevatten dus: voorbeeld@vo.com";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Email mag niet leeg zijn.";
    }

    //check telefoonnummer
    if (!empty($telefoonnummer)) {
        $telefoonnummer_subject = $telefoonnummer;
        $telefoonnummer_pattern = '/^[0-9]*$/';
        $telefoonnummer_match = preg_match($telefoonnummer_pattern, $telefoonnummer_subject);
        if ($telefoonnummer_match !== 1) {
            $error[] = "Telefoonnummer mag alleen nummersbevatten";
        }
    } else {
        // mag niet leeg zjn
        $error[] = "Telefoonnummer mag niet leeg zijn.";
    }

    //check mobielnummer
    if (!empty($mobielnummer)) {
        $mobielnummer_subject = $mobielnummer;
        $mobielnummer_pattern = '/^[0-9]*$/';
        $mobielnummer_match = preg_match($mobielnummer_pattern, $mobielnummer_subject);
        if ($mobielnummer_match !== 1) {
            $error[] = "Mobielnummer mag alleen nummers bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Mobielnummer mag niet leeg zijn.";
    }

    // wachtwoord validatie
    if (!empty($wachtwoord)) {
        $uppercase = preg_match('@[A-Z]@', $wachtwoord);
        $lowercase = preg_match('@[a-z]@', $wachtwoord);
        $number    = preg_match('@[0-9]@', $wachtwoord);
        $specialChars = preg_match('@[^\w]@', $wachtwoord);
    } else {
        // mag niet leeg zijn
        $error[] = "Wachtwoord mag niet leeg.";
    }

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($wachtwoord) < 8) {
        $error[] = 'Wachtwoord moet ten minste 8 tekens lang zijn en moet ten minste één hoofdletter, één cijfer en één speciaal teken bevatten.';
    }
    if ($wachtwoord !== $wachtwoord2) {
        $error[] = "De wachtwoorden komen niet overeen.";
    }

    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../coachap/coachtoevoegen.php');
    } else {

        $coach->create($geslacht, $titel, $geboortedatum, $rol, $voornaam, $tussenvoegsel, $achternaam, $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats, $land, $email, $telefoonnummer, $mobielnummer, $wachtwoord);
        header('Location:../login.php');
        // print_r(
        //     $geslacht . "<br>" .
        //         $titel . "<br>" .
        //         $geboortedatum . "<br>" .
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
        //         $wachtwoord . "<br>"

        // );
    }
}
