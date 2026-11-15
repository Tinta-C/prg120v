<?php
// registrer-student.php
include("db.php");
?>
<h3>Registrere ny student</h3>

<form action="registrer-student.php" method="post">
    Brukernavn: <input type="text" name="brukernavn" required /><br />
    Fornavn: <input type="text" name="fornavn" required /><br />
    Etternavn: <input type="text" name="etternavn" required /><br />
    Klassekode: 
   <select name="klassekode" required>
        <option value="">-- Velg klassekode --</option>
        <?php
        $sqlKlasse = "SELECT klassekode, klassenavn FROM klasse ORDER BY klassekode;";
        $resklasse = mysqli_query($conn, $sqlKlasse);
        while ($rad = mysqli_fetch_array($resKlasse)) {
            $kode = $rad["klassekode"];
            $navn = $rad["klassenavn"];
            print("<option value='$kode'>$kode - $navn</option>");
        }
        ?>
        </select><br />
        <input type="submit" value="Registrer student" name="registrer" />
</form>

<?php
if (isset($_POST["registrer"])) {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    // Sjekker forst om brukernavnet finnes før
    $sjekkSql = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $sjekkRes = mysqli_query($conn, $sjekkSql);
    
   if (mysqli_num_rows($sjekkRes) > 0) {
        print("<p>student med brukernavn <strong>$brukernavn</strong> er registrert fra før.</p>");
   } else {
       $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
       if (mysqli_query($conn, $sqlSetning)) {
        print("<p>Studenten <strong>$fornavn $etternavn</strong> ($brukernavn) er nå registrert i klasse $klassekode.</p>");
   } else {
        print("<p>Det oppstod en feil ved registrering."</p>");
    }
  }
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>

