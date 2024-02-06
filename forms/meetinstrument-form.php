<?php
//Sessie starten
session_start();
//Roep class bestand op
require_once '../src/dbclass.php';
//Pak sessie data uit
$gebruiker = unserialize($_SESSION['leerling_data']);
//Pass POST variable
$meetinstrument = $_POST['posts'];
$onderwerp = $_POST['onderwerp'];

//Zet sessie id in user id
$gebruiker_id = $gebruiker->NPid;

if (isset($meetinstrument, $meetinstrument, $gebruiker_id)) {
  //Roep nieuwe gebruikers class op
  $setMeetinstrument = new Leerlingen();
  //Zet datum
  $datum = date('Y-m-d');
  //Voer verhaal functie uit
  $setMeetinstrument->setMeetInstrument($gebruiker_id,$meetinstrument, $onderwerp, $datum);
  // stuurt je naar bibliotheek
  header('Location: ../bibliotheek.php');
}
