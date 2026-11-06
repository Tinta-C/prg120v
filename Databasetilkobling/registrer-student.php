<?php
// registrer-student.php
?>
<h3>Registrere ny student</h3>

<form action="" method="post">
    Brukernavn: <input type="text" name="brukernavn" required /><br />
    Fornavn: <input type="text" name="fornavn" required /><br />
    Etternavn: <input type="text" name="etternavn" required /><br />
    Klassekode: <input type="text" name="klassekode" required /><br />
   <input type="submit" value="Registrer student" name="Registrer_student" />
</form>

<?php
if (isset($_POST["Registrer_student"])) {
    include("db.php");

    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    // SQL-setninh for å sette inn data i student-tabellen
    $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";

    if (mysqli_query($conn, $sqlSetning)) {
        print("Studenten ble registrert med suksess!");
    } else {
        print("Feil ved registrering: " . mysqli_error($conn));
    }
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>

