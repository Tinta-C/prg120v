<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("db.php");
$kobling = $conn ?? ($db ?? ($tilkobling ?? ($con ?? null)));

if (!$kobling) {
    die("<p style='color:red; font-weight:bold;'>Feil: Fant ikke databasetilkoblingen fra db.php!</p>");
}

// Sletter student via POST (fungerer selv om serveren fjerner ? i URL)
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["brukernavn"])) {
    $brukernavn = mysqli_real_escape_string($kobling, $_POST["brukernavn"]);
    $sqlSlett = "DELETE FROM student WHERE brukernavn = '$brukernavn'";

    if (mysqli_query($kobling, $sqlSlett)) {
        if (mysqli_affected_rows($kobling) > 0) {
            print("<p style='color:green; font-weight:bold;'>Studenten $brukernavn er slettet!</p>");
        } else {
            print("<p style='color:orange; font-weight:bold;'>Fant ikke studenten '$brukernavn' i databasen.</p>");
        }
    } else {
        print("<p style='color:red; font-weight:bold;'>Feil ved sletting: " . mysqli_error($kobling) . "</p>");
    }
}

// Henter og viser tabellen
$sqlVis = "SELECT * FROM student ORDER BY brukernavn";
$sqlResultat = mysqli_query($kobling, $sqlVis);

if ($sqlResultat) {
    print("<table border='1'>");
    print("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th><th>Slett (v2)</th></tr>");

    while ($rad = mysqli_fetch_array($sqlResultat)) {
        $brukernavn = $rad["brukernavn"];
        $fornavn = $rad["fornavn"];
        $etternavn = $rad["etternavn"];
        $klassekode = $rad["klassekode"];

        print("<tr>");
        print("<td>$brukernavn</td>");
        print("<td>$fornavn</td>");
        print("<td>$etternavn</td>");
        print("<td>$klassekode</td>");
        print("<td>
            <form method='post' style='margin:0;' onsubmit=\"return confirm('Er du sikker?');\">
                <input type='hidden' name='brukernavn' value='$brukernavn'>
                <button type='submit'>Slett</button>
            </form>
        </td>");
        print("</tr>");
    }
    print("</table>");
}
?>
<br />
<a href="index.php">Tilbake til hovedmenyen</a>


