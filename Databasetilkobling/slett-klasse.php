<?php
// slett-klasse.php
include("db.php");
?>
<h3>Slette klasse</h3>

<?php
// Sjekk om klassekode er sendt med URL-en for å slette
if (isset($_GET["klassekode"])) {
    $klassekode = $_GET["klassekode"];

    $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";

    if (mysqli_query($conn, $sqlSetning)) {
        print("Klassen med klassekode $klassekode ble slettet.<br /><br />");
    } else {
        print("Feil ved sletting: " . mysqli_error($conn) . "<br /><br />");
    }
}

// Henter ut alle klasser for å vise tabellen med slette-lenker
$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat = mysqli_query($conn, $sqlSetning);
$antallRader = mysqli_num_rows($sqlResultat);

if ($antallRader > 0) {
    print("<table border='1'>");
    print("<tr><th>klassekode</th><th>klassenavn</th><th>studiumkode</th><th>Slett</th></tr>");

    for ($r = 1; $r <= $antallRader; $r++) {
        $rad = mysqli_fetch_array($sqlResultat);
        $klassekode = $rad["klassekde"];
        $klassenavn = $rad["klassenavn"];
        $studiumkode = $rad["studiumkode"];

        print("<tr>");
        print("<td>$klassekode</td>");
        print("<td>$klassenavn</td>");
        print("<td>$studiumkode</td>");
        print("<td><a href='slett-klasse.php?klassekode=$klassekode'>Slett</a></td>");
        print("</tr>");
    }
    print("</table>");
} else {
    print("Ingen klasser å slette.");
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>

