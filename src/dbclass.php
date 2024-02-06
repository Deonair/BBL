<?php
//Klasse DB wordt aangemaakt

class DB
{
    //Conn kan alleen aangeroepen worden in de klasse
    protected $conn;

    //connectie funcie
    public function conn()
    {
        try {
            //DB Gebruiker
            $username = 'root';

            //DB Wachtwoord
            $wachtwoord = '';

            //PDO Configuratie
            $options = [
                PDO::ATTR_EMULATE_PREPARES => false, // Zet emulatie uit voor echte prepared statements
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //enables errors for debugging
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //Zet fetch automatisch op array
            ];
            //Host configuratie
            $dsn = "mysql:host=localhost;dbname=databasebbl;charset=utf8mb4";
            //Create PDO
            $this->conn = new PDO($dsn, $username, $wachtwoord, $options);

            return true;

            $this->conn = NULL;
        } catch (PDOException $e) {
            //Database connectie error
            exit('Er ging iets mis...');
            //stuurt variabel terug
            return $e;
        }
    }
}



class Leerlingen extends DB
{
    public $NPid;
    public $geslacht;
    public $titel;
    public $geboortedatum;
    public $rol;
    public $voornaam;
    public $tussenvoegsel;
    public $achternaam;
    public $straat;
    public $huisnummer;
    public $huisnummertoevoeging;
    public $postcode;
    public $plaats;
    public $land;
    public $email;
    public $telefoonnummer;
    public $mobielnummer;

    public function create($geslacht, $titel, $geboortedatum, $rol, $voornaam, $tussenvoegsel, $achternaam, $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats, $land, $email, $telefoonnummer, $mobielnummer, $wachtwoord)
    {
        $empty = " ";
        //Hash wachtwoord
        $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "INSERT INTO np (geslacht, titel, geboortedatum, rol, voornaam, tussenvoegsels, achternaam, straat, huisnummer, huisnummertoevoeging, postcode, plaats, land, email, telefoonnummer, mobielnummer, wachtwoord, kvknummer) VALUES (:geslacht, :titel, :geboortedatum, :rol, :voornaam, :tussenvoegsels, :achternaam, :straat, :huisnummer, :huisnummertoevoeging, :postcode, :plaats, :land, :email, :telefoonnummer, :mobielnummer, :wachtwoord, :kvknummer)";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":geslacht", $geslacht);
            $stmt->bindParam(":titel", $titel);
            $stmt->bindParam(":geboortedatum", $geboortedatum);
            $stmt->bindParam(":rol", $rol);
            $stmt->bindParam(":voornaam", $voornaam);
            $stmt->bindParam(":tussenvoegsels", $tussenvoegsel);
            $stmt->bindParam(":achternaam", $achternaam);
            $stmt->bindParam(":straat", $straat);
            $stmt->bindParam(":huisnummer", $huisnummer);
            $stmt->bindParam(":huisnummertoevoeging", $huisnummertoevoeging);
            $stmt->bindParam(":postcode", $postcode);
            $stmt->bindParam(":plaats", $plaats);
            $stmt->bindParam(":land", $land);
            $stmt->bindParam(":telefoonnummer", $telefoonnummer);
            $stmt->bindParam(":mobielnummer", $mobielnummer);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":wachtwoord", $hash);
            $stmt->bindParam(":kvknummer", $empty);
            //SQL query daadwerkelijk uitvoeren
            $stmt->execute();
            //Zet verbinding op NULL
            $this->conn = NULL;
        } catch (PDOException $e) {

            return $e;
        }
    }
    public function login($email, $wachtwoord, $rol)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE email = :email AND rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":rol", $rol);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();

            $this->conn = NULL;
            // controleren of het ingetypte wachtwoord overeenkomt met die in de database
            if (password_verify($wachtwoord, $data['wachtwoord']) && $rol = $data['rol']) {
                // class variabelen invullen
                $this->NPid = $data['id_gebruiker'];
                $this->geslacht = $data['geslacht'];
                $this->titel = $data['titel'];
                $this->geboortedatum = $data['geboortedatum'];
                $this->rol = $data['rol'];
                $this->voornaam = $data['voornaam'];
                $this->tussenvoegsel = $data['tussenvoegsels'];
                $this->achternaam = $data['achternaam'];
                $this->straat = $data['straat'];
                $this->huisnummer = $data['huisnummer'];
                $this->huisnummertoevoeging = $data['huisnummertoevoeging'];
                $this->postcode = $data['postcode'];
                $this->plaats = $data['plaats'];
                $this->land = $data['land'];
                $this->email = $data['email'];
                $this->telefoonnummer = $data['telefoonnummer'];
                $this->mobielnummer = $data['mobielnummer'];
                // status terugsturen
                return true;
            } else {

                return "Email of wachtwoord is fout";
            }
        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }
    public function update($gebruikerid, $rol, $voornaam, $tussenvoegsel, $achternaam, $straat, $huisnummer, $huisnummertoevoeging, $postcode, $plaats, $land, $email, $telefoonnummer, $mobielnummer)
    {
        
        try {
           
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "UPDATE `np` 
                    SET 
			voornaam=COALESCE(NULLIF(:voornaam, ''),voornaam),
			tussenvoegsels=COALESCE(NULLIF(:tussenvoegsels, ''),tussenvoegsels),
			achternaam=COALESCE(NULLIF(:achternaam, ''),achternaam),
			straat=COALESCE(NULLIF(:straat, ''),straat),
            huisnummer=COALESCE(NULLIF(:huisnummer, ''),huisnummer),
			huisnummertoevoeging=COALESCE(NULLIF(:huisnummertoevoeging, ''),huisnummertoevoeging),
			postcode=COALESCE(NULLIF(:postcode, ''),postcode),
			plaats=COALESCE(NULLIF(:plaats, ''),plaats),
            land=COALESCE(NULLIF(:land, ''),land),
			email=COALESCE(NULLIF(:email, ''),email),
            telefoonnummer=COALESCE(NULLIF(:telefoonnummer, ''),telefoonnummer),
			mobielnummer=COALESCE(NULLIF(:mobielnummer, ''),mobielnummer)		
                    WHERE id_gebruiker = :id_gebruiker and rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders	
            $stmt->bindParam(':id_gebruiker', $gebruikerid);
            $stmt->bindParam(':rol', $rol);
            $stmt->bindParam(':voornaam', $voornaam);
            $stmt->bindParam(':tussenvoegsels', $tussenvoegsel);
            $stmt->bindParam(':achternaam', $achternaam);
            $stmt->bindParam(':straat', $straat);
            $stmt->bindParam(':huisnummer', $huisnummer);
            $stmt->bindParam(':huisnummertoevoeging', $huisnummertoevoeging);
            $stmt->bindParam(':postcode', $postcode);
            $stmt->bindParam(':plaats', $plaats);
            $stmt->bindParam(':land', $land);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefoonnummer', $telefoonnummer);
            $stmt->bindParam(':mobielnummer', $mobielnummer);
           
            //sql uitvoeren
            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }
    public function is_loggedinLeerling()
    {
        if (isset($_SESSION['leerling_data'])) {
            return true;
        }
    }
    public function doLogout()
    {
        session_destroy();
        unset($_SESSION['leerling_data']);
        return true;
    }
    public function setMeetInstrument($gebruiker_id, $meetinstrument, $onderwerp, $datum)
    {
        // maak een connectie met de database
        $this->conn();
        // sql query defineren
        $sql = "INSERT INTO `meetinstrument` (id_gebruiker, meetinstrument, onderwerp, datum) VALUES (:id_gebruiker, :meetinstrument, :onderwerp, :datum)";
        // sql voorbereiden
        $stmt = $this->conn->prepare($sql);
        // waardes verbinden met de named placeholders	
        $stmt->bindParam(':meetinstrument', $meetinstrument);
        $stmt->bindParam(':datum', $datum);
        $stmt->bindParam(':onderwerp', $onderwerp);
        $stmt->bindParam(':id_gebruiker', $gebruiker_id);
        // sql query daadwerkelijk uitvoeren
        $stmt->execute();
        //sluit verbinding
        $this->conn = NULL;
    }
    public function getMeetInstrumenten($leerlingid)
    {
        //Pak sessie data uit
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM meetinstrument WHERE id_gebruiker = :leerlingid";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':leerlingid', $leerlingid);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
    public function getMeetInstrument($leerlingid, $meetinstrumentid)
    {
        //Pak sessie data uit
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM meetinstrument WHERE id_gebruiker = :leerlingid And id_meetinstrument = :meetinstrumentid";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':leerlingid', $leerlingid);
            $stmt->bindParam(':meetinstrumentid', $meetinstrumentid);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
}
class Bedrijf extends Leerlingen
{
    public $bedrijfid;
    public $bedrijfsnaam;
    public $kvknummer;
    public $straat;
    public $huisnummer;
    public $huisnummertoevoeging;
    public $postcode;
    public $plaats;
    public $land;

    public function is_loggedinBedrijf()
    {
        if (isset($_SESSION['bedrijf_data'])) {
            return true;
        }
    }

    public function MaakBedrijfBegeleider($geslacht, $titel, $geboortedatum, $rol, $voornaam, $tussenvoegsel, $achternaam, $email, $mobielnummer, $wachtwoord, $kvknummer)
    {
        $empty = " ";
        //Hash wachtwoord
        $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "INSERT INTO `np` (geslacht, titel, geboortedatum, rol, voornaam, tussenvoegsels, achternaam, straat, huisnummer, huisnummertoevoeging, postcode, plaats, land, email, telefoonnummer, mobielnummer, wachtwoord, kvknummer) VALUES (:geslacht, :titel, :geboortedatum, :rol, :voornaam, :tussenvoegsels, :achternaam, :straat, :huisnummer, :huisnummertoevoeging, :postcode, :plaats, :land, :email, :mobielnummer, :telefoonnummer, :wachtwoord, :kvknummer)";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":geslacht", $geslacht);
            $stmt->bindParam(":titel", $titel);
            $stmt->bindParam(":geboortedatum", $geboortedatum);
            $stmt->bindParam(":rol", $rol);
            $stmt->bindParam(":voornaam", $voornaam);
            $stmt->bindParam(":tussenvoegsels", $tussenvoegsel);
            $stmt->bindParam(":achternaam", $achternaam);
            $stmt->bindParam(":straat", $empty);
            $stmt->bindParam(":huisnummer", $empty);
            $stmt->bindParam(":huisnummertoevoeging", $empty);
            $stmt->bindParam(":postcode", $empty);
            $stmt->bindParam(":plaats", $empty);
            $stmt->bindParam(":land", $empty);
            $stmt->bindParam(":telefoonnummer", $empty);
            $stmt->bindParam(":mobielnummer", $mobielnummer);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":wachtwoord", $hash);
            $stmt->bindParam(":kvknummer", $kvknummer);
            //SQL query daadwerkelijk uitvoeren
            $stmt->execute();
            //Zet verbinding op NULL
            $last_id = $this->conn->lastInsertId();
            $this->conn = NULL;
            return $last_id;
        } catch (PDOException $e) {

            return $e;
        }
    }
    public function MaakBedrijf($id, $bedrijfsnaam, $kvknummer, $telefoonnummer, $huisnummer, $huisnummertoevoeging, $postcode, $straat, $land, $plaats)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "INSERT INTO `bedrijf` (id_gebruiker, bedrijfsnaam, kvknummer, straat, huisnummer, huisnummertoevoeging, postcode, plaats, land, telefoonnummer) VALUES (:id_gebruiker, :bedrijfsnaam, :kvknummer, :straat, :huisnummer, :huisnummertoevoeging, :postcode, :plaats, :land, :telefoonnummer)";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders	
            $stmt->bindParam(':id_gebruiker', $id);
            $stmt->bindParam(':bedrijfsnaam', $bedrijfsnaam);
            $stmt->bindParam(':kvknummer', $kvknummer);
            $stmt->bindParam(':huisnummer', $huisnummer);
            $stmt->bindParam(':huisnummertoevoeging', $huisnummertoevoeging);
            $stmt->bindParam(':postcode', $postcode);
            $stmt->bindParam(':plaats', $plaats);
            $stmt->bindParam(':straat', $straat);
            $stmt->bindParam(':land', $land);
            $stmt->bindParam(':telefoonnummer', $telefoonnummer);

            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            //Zet verbinding op NULL
            $this->conn = NULL;
        } catch (PDOException $e) {

            return $e;
        }
    }
    public function getBedrijven()
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM bedrijf";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);

            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
}
class coach extends Bedrijf
{

    public function is_loggedinCoach()
    {
        if (isset($_SESSION['coach_data'])) {
            return true;
        }
    }
    public function getLeerlingen()
    {
        try {
            $rol = "Leerling";
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':rol', $rol);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
    public function getLeerling($leerlingid, $rol)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE id_gebruiker = :id_gebruiker and rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":id_gebruiker", $leerlingid);
            $stmt->bindParam(":rol", $rol);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();

            $this->conn = NULL;

            // class variabelen invullen
            $this->NPid = $data['id_gebruiker'];
            $this->geslacht = $data['geslacht'];
            $this->titel = $data['titel'];
            $this->geboortedatum = $data['geboortedatum'];
            $this->rol = $data['rol'];
            $this->voornaam = $data['voornaam'];
            $this->tussenvoegsel = $data['tussenvoegsels'];
            $this->achternaam = $data['achternaam'];
            $this->straat = $data['straat'];
            $this->huisnummer = $data['huisnummer'];
            $this->huisnummertoevoeging = $data['huisnummertoevoeging'];
            $this->postcode = $data['postcode'];
            $this->plaats = $data['plaats'];
            $this->land = $data['land'];
            $this->email = $data['email'];
            $this->telefoonnummer = $data['telefoonnummer'];
            $this->mobielnummer = $data['mobielnummer'];
            return $data;
        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }
    public function getCoaches()
    {
        try {
            $rol = "coach";
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':rol', $rol);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
    public function getCoach($leerlingid, $rol)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE id_gebruiker = :id_gebruiker and rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":id_gebruiker", $leerlingid);
            $stmt->bindParam(":rol", $rol);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();

            $this->conn = NULL;

            // class variabelen invullen
            $this->NPid = $data['id_gebruiker'];
            $this->geslacht = $data['geslacht'];
            $this->titel = $data['titel'];
            $this->geboortedatum = $data['geboortedatum'];
            $this->rol = $data['rol'];
            $this->voornaam = $data['voornaam'];
            $this->tussenvoegsel = $data['tussenvoegsels'];
            $this->achternaam = $data['achternaam'];
            $this->straat = $data['straat'];
            $this->huisnummer = $data['huisnummer'];
            $this->huisnummertoevoeging = $data['huisnummertoevoeging'];
            $this->postcode = $data['postcode'];
            $this->plaats = $data['plaats'];
            $this->land = $data['land'];
            $this->email = $data['email'];
            $this->telefoonnummer = $data['telefoonnummer'];
            $this->mobielnummer = $data['mobielnummer'];
            return $data;
        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }
}
class Lbedrijf extends DB
{
    public function setLeerlingBedrijf($id_gebruiker, $bedrijfid, $begindatum, $einddatum)
    {
        $this->conn();
        $sql2 = "SELECT id_bedrijf FROM bedrijf";
        // sql voorbereiden
        $stmt2 = $this->conn->prepare($sql2);
        // sql query daadwerkelijk uitvoeren
        $stmt2->execute();
        // data ophalen
        $data = $stmt2->fetch();

        // maak een connectie met de database
        if ($bedrijfid !== $data) {
            // sql query defineren
            $sql = "INSERT INTO `stage` (id_gebruiker, id_bedrijf, begindatum, einddatum) VALUES (:id_gebruiker, :id_bedrijf, :begindatum, :einddatum)";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders	
            $stmt->bindParam(':id_gebruiker', $id_gebruiker);
            $stmt->bindParam(':id_bedrijf', $bedrijfid);
            $stmt->bindParam(':begindatum', $begindatum);
            $stmt->bindParam(':einddatum', $einddatum);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            //sluit verbinding
            $this->conn = NULL;
            return true;
        } else {
            return "De jongere staat al ingeschreven voor het stage bedrijf";
        }
    }
    public function getLeerlingbedrijf($leerlingid)
    {

        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM stage WHERE id_gebruiker = :id";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':id', $leerlingid);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
    public function getLBedrijf($bedrijfid)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM bedrijf WHERE id_bedrijf = :id_bedrijf";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":id_bedrijf", $bedrijfid);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();

            $this->conn = NULL;
            return $data;
        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }
    public function getBedrijfbegeileiders()
    {
        try {
            $rol = "bedrijf begeleider";
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':rol', $rol);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
    public function getBedrijfbegeileider($leerlingid, $rol)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM np WHERE id_gebruiker = :id_gebruiker and rol = :rol";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":id_gebruiker", $leerlingid);
            $stmt->bindParam(":rol", $rol);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();

            $this->conn = NULL;

            // class variabelen invullen
            $this->NPid = $data['id_gebruiker'];
            $this->geslacht = $data['geslacht'];
            $this->titel = $data['titel'];
            $this->geboortedatum = $data['geboortedatum'];
            $this->rol = $data['rol'];
            $this->voornaam = $data['voornaam'];
            $this->tussenvoegsel = $data['tussenvoegsels'];
            $this->achternaam = $data['achternaam'];
            $this->straat = $data['straat'];
            $this->huisnummer = $data['huisnummer'];
            $this->huisnummertoevoeging = $data['huisnummertoevoeging'];
            $this->postcode = $data['postcode'];
            $this->plaats = $data['plaats'];
            $this->land = $data['land'];
            $this->email = $data['email'];
            $this->telefoonnummer = $data['telefoonnummer'];
            $this->mobielnummer = $data['mobielnummer'];
            return $data;
        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }
}
class admin extends coach
{
    public function is_loggedinAdmin()
    {
        if (isset($_SESSION['admin_data'])) {
            return true;
        }
    }
}
