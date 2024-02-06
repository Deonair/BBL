<?php
session_start();

require_once '../src/dbclass.php';
$Leerlingen = new Leerlingen();
$bedrijf = new Bedrijf();
$coach = new coach();
$admin = new admin();
$post = $_POST;
$email = $post['email'];
$wachtwoord = $post['wachtwoord'];


// validatie checker
if (isset($_POST['submit'])) {

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

    // wachtwoord validatie
    if (!empty($wachtwoord)) {
        $uppercase = preg_match('@[A-Z]@', $wachtwoord);
        $lowercase = preg_match('@[a-z]@', $wachtwoord);
        $number    = preg_match('@[0-9]@', $wachtwoord);
        $specialChars = preg_match('@[^\w]@', $wachtwoord);
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($wachtwoord) < 8) {
            $error[] = 'Wachtwoord moet ten minste 8 tekens lang zijn en moet ten minste één hoofdletter, één cijfer en één speciaal teken bevatten.';
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Wachtwoord mag niet leeg.";
    }



    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../login.php');
    } else {
        $rol = "leerling";
        $loggedin = $Leerlingen->login($email, $wachtwoord, $rol);
        if (is_bool($loggedin)) {
            //Zet user values in sessie
            $_SESSION['leerling_data'] = serialize($Leerlingen);
            header('Location: ../index.php');
        } elseif (is_string($loggedin)) {
            $rol = "coach";
            $loggedinCoach = $coach->login($email, $wachtwoord, $rol);
            if (is_bool($loggedinCoach)) {
                //Zet user values in sessie
                $_SESSION['coach_data'] = serialize($coach);
                header('Location: ../index.php');
            } elseif (is_string($loggedinCoach)) {
                $_SESSION['ERRORS'] = $loggedinCoach;
                header('Location: ../login.php');
                $rol = "bedrijf begeleider";
                $loggedinBedrijf = $bedrijf->login($email, $wachtwoord, $rol);
                if (is_bool($loggedinBedrijf)) {
                    //Zet user values in sessie
                    $_SESSION['bedrijf_data'] = serialize($bedrijf);
                    header('Location: ../index.php');
                } elseif (is_string($loggedinBedrijf)) {
                    $_SESSION['ERRORS'] = $loggedinBedrijf;
                    header('Location: ../login.php');
                    $rol = "admin";
                    $loggedinAdmin = $admin->login($email, $wachtwoord, $rol);
                    if (is_bool($loggedinAdmin)) {
                        //Zet user values in sessie
                        $_SESSION['admin_data'] = serialize($admin);
                        header('Location: ../index.php');
                    } elseif (is_string($loggedinAdmin)) {
                        $_SESSION['ERRORS'] = $loggedinAdmin;
                        header('Location: ../login.php');
                    }
                }

            }
        } else {
            header('Location: ../login.php');
        }




        // if (isset($error)) {
        //     $_SESSION['ERRORS'] = implode('<br> ', $error);
        //     header('Location:../registreer.php');
        // } else {
        //     $Leerlingen->create($geslacht, $titel, $geboortedatum, $voornaam, $tussenvoegsel, $achternaam, $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats, $land, $email, $telefoonnummer, $mobielnummer, $wachtwoord);
        //     header('Location:../login.php');
        // }
    }
}
