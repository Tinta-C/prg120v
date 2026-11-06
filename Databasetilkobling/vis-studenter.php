<?php
// vis-studenter.php
include("db.php");
?>

<h3>Oversikt over studenter</h3>

<?php
// Henter alle studenter fra databasen
$sqlSetning = "SELECT * FROM student ORDER By brukernavn;";
$sqlResultat = mysqli_query($conn, $sqlSetning);
$antallRader = mysqli_num_rows($sqlResultat);

if ($antallRader > 0) {
    print("<table border='1'>");
    print("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>");

    for ($r = 1; $r <= $antallRader; $r++) {
        $rad = mysqli_fetch_array($sqlResultat);
        $brukernavn = $rad["brukernavn"];
        $fornavn = $rad["fornavn"];
        $etternavn = $rad["etternavn"];
        $klassekode = $rad["klassekode"];
        print("<tr><td>$brukernavn</td><td>$fornavn</td><td>$etternavn</td><td>$klassekode</td></tr>");
    }
    
    print("</table>");
} else {
    print("Ingen studenter registrert.");
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>









