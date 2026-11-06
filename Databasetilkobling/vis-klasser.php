<?php
// vis-klasser.php
include("db.php");
?>

<h3>Oversikt over klasser</h3>

<?php
//Henter alle klasser fra databasen sortert etter klassekode
$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat = mysqli_query($conn, $sqlSetning);
$antallRader = mysqli_num_rows($sqlResultat);

print("<table border='1'>");
print("<tr><th>klassekode</th><th>klassenavn</th><th>studiumkode</th></tr>");

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlResultat);
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    $studiumkode = $rad["studiumkode"];

    print("<tr><td>$klassekode</td><td>$klassenavn</td><td>$studiumkode</td></tr>");
}

print("</table>");
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>

