<?php
include("db.php");
?>

<h3>Slette klasse</h3>

<?php
if (isset($_GET["klassekode"])) {
    $klassekode = $_GET["klassekode"];
    $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";

    if (mysqli_query($conn, $sqlSetning)) {
        print("<p style='color:green;'>Klassen <strong>$klassekode</strong> er slettet!</p><br />");
    } else {
        print("<p style='color:red;'>Kan ikke slette klasse <strong>$klassekode</strong> fordi det finnes studenter registrert i denne klassen.</p><br />");
    }
}

$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat = mysqli_query($conn, $sqlSetning);

if ($sqlResultat) {
    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader > 0) {
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
            print("<td><a href='slett-klasse.php?klassekode=$klassekode' onclick=\"return confirm('Er du sikker på at du vil slette denne klassen?');\">Slett</a></td>");
            print("</tr>");
        }
    
 print("</table>");
    } else {
        print("<p>Ingen klasser å slette.</p>");
    }
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>




    




        

        


