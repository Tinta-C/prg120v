<?php
// slett-student.php
include("db.php");
?>

<h3>Slette student</h3>

<?php
// Hvis en student er valgt for sletting via URL
if (isset($_GET["brukernavn"])) {
    $brukernavn = $_GET["brukernavn"];
    $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";

    if (mysqli_query($conn, $sqlSetning)) {
        print("Studenten med brukernavn <strong>$brukernavn</strong> er slettet.<br /><br />");
    } else {
        print("Feil ved sletting: " . mysqli_error($conn) . "<br /><br />");
    }
}

// Henter ut alle studenter for å vise tabellen med slette-lenker
$sqlSetning = "SELECT * FROM student ORDER BY brukernavn;";
$sqlResultat = mysqli_query($conn, $sqlSetning);
$antallRader = mysqli_num_rows($sqlResultat);

if ($antallRader > 0) {
    print("<table border='1'>");
    print("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th><th>Slett</th></tr>");

    for ($r =1; $r <= $antallRader; $r++) {
        $rad = mysqli_fetch_array($sqlRestultat);
        $brukernavn = $rad["brukernavn"];
        $fornavn = $rad["fornavn"];
        $etternavn = $rad["etternavn"];
        $klassekode = $rad["klassekode"];

        print("<tr>");
        print("<td>$brukernavn</td>");
        print("<td>$fornavn</td>");
        print("<td>$etternavn</td>");
        print("<td>$klassekode</td>");
        print("<td><a href='slett-student.php?brukernavn=$brukernavn'>Slett</a></td>");
        print("</tr>");
    }
    
    print("</table>");
} else {
    print("Ingen studenter å slette.");
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>             

