<?php
// slett-klasse.php
include("db.php")

// Sjekk om klassekode er sendt via URL for å slette
if (isset($_GET["klassekode"])) {
    $klassekode = mysqli_real_escape_string($conn, $_GET["klassekode"] ?? $_GET["klassekode"]);
    $sqlSetning = "DELETE FROM klasse WHERE klassekode = '$klassekode';";

    if (mysqli_query($conn, $sqlSetning)) {
        print("<p style='color:green; font-weight:bold;'>Klassen <strong>$klassekode</strong> er slettet!</p><br />");
    } else {
        print("<p style='color:red; font-weight:bold;'>Kan ikke slette klasse <strong>$klassekode</strong> fordi det finnes studenter registrert i denne klassen.</p><br />");
    }
}
?>

<h3>Slette klasse</h3>

<?php
$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat = mysqli_query($conn, $sqlSetning);

if ($sqlResultat) {
    $antallRader = msqli_num_rows($sqlResultat);

    if ($antallRader > 0) {
        print("<table border='1'>");
        print("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th><th>Slett</th></tr>");

        while ($rad = mysqli_fetch_array($sqlResultat)) {
            $klassekode = $rad["klassekode"];
            $klassenavn = $rad["klassenavn"];
            $studiumkode = $rad["studiumkode"];

            print("<tr>");
            print("<td>" . $klassekode . "</td>");
            print("<td>" . $klassenavn . "</td>");
            print("<td>" . $studiumkode . "</td>");
            print("<td><a href='slett-klasse.php?klassekode=" . urlenkode($klassekode) . "' onclick=\"return confirm('Er du sikker på at du vil slette denne klassen?');\">Slett</a></td>");
            print("</tr>");
        }
    
 print("</table>");
    } else {
        print("<p>Ingen klasser å slette i tabellen.</p>");
    }
} else {
    print("<p style='color:red;'>Kunne ikke hente klasser: " . mysqli_error($conn) . "</p>");
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>




    




        

        


