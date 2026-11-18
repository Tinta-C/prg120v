







    
<?php
include("db.php");
$kobling = $conn ?? ($db ?? ($tilkobling ?? null));

// Sletter klasse hvis klassekode er sendt med i URL-en
if (!empty($_GET["klassekode"])) {
    $klassekode = mysqli_real_escape_string($kobling, $_GET["klassekode"]);
    $sqlSetning = "DELETE FROM klasse WHERE klassekode = '$klassekode';";

    if (mysqli_query($kobling, $sqlSetning)) {
        print("<p style='color:green; font-weight:bold;'>Klassen $klassekode er slettet!</p>");
    } else {
        print("<p style='color:red; font-weight:bold;'>Feil ved sletting: " . mysqli_error($kobling) . "</p>");
    }
}

// Henter og viser tabellen med klasser
$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat = mysqli_query($kobling, $sqlSetning);

if ($sqlResultat) {
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
} else {
    print("<p style='color:red;'>Kunne ikke hente klasser: " . mysqli_error($kobling) . "</p>");
}
?>
<br />
<a href="index.php">Tilbake til hovedmenyen</a>