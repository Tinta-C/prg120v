<?php
// slett-klasse.php
include("db.php");

// Sjekk om klassekode er sendt via URL
if (isset($_GET["klassekode"])) {
    $klassekode = $_GET["klassekode"];
    $sqlSetning = "DELETE FROM klasse WHERE klassekode = '$klassekode';";

    if (mysqli_query($conn, $sqlSetning)) {
        print("<p style='color:green;'>Klassen $klassekode er slettet!</p>");
    } else {
        print("<p style='color:red;'>Kan ikke slette klassen fordi det finnes studenter i den.</p>");
    }
}

$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat = mysqli_query($conn, $sqlSetning);

print("<table border='1'>");
print("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th><th>Slett</th></tr>");

while ($rad = mysqli_fetch_array($sqlResultat)) {
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    $studiumkode = $rad["studiumkode"];

    print("<tr>");
    print("<td>$klassekode</td>");
    print("<td>$klassenavn</td>");
    print("<td>$studiumkode</td>");
    print("<td><a href='slett-klasse.php?klassekode=$klassekode' onclick=\"return confirm('Er du sikker?');\">Slett</a></td>");
    print("</tr>");
}
print("</table>");
?>

<br />
<a href="index.php">Tilbake til hovedmenyen</a>






    




        

        


