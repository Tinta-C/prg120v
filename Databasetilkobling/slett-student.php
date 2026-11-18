<?php
// slett-student.php
include("db.php");
?>

<h3>Slette student</h3>

<?php
// Sjekk om brukernavn er sendt via URL
if (isset($_GET["brukernavn"]) && !empty($_GET["brukernavn"])) {
    $brukernavn = trim($_GET["brukernavn"]);

    //SQL-setning for sletting (prøver med liten 'student')
    $sqlSetning = "DELETE FROM student WHERE brukernavn = '$brukernavn'";

    if (mysqli_query($conn, $sqlSetning)) {
        print("<p style='color:green; font-weight:bold;'>Suksess! Studenten med brukernavn '$brukernavn' er slettet.</p>");
    } else {
        print("<p style='color:red; font-weight:bold;'>DATABASEFEIL: " . mysqli_error($conn) . "</p>");
    }
} else {
    // Viser om skriptet i det hele tatt mottar parameteren
    if (isset($_GET["brukernavn"])) {
        print("<p style='color:orange;'>Mottok tom variabel for brukernavn.</p>");
    }
}

// Hent ut alle studenter til tabellen
$sqlSetning = "SELECT * FROM student ORDER BY brukernavn;";
$sqlResultat = mysqli_query($conn, $sqlSetning);

if ($sqlResultat) {
    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader > 0) {
        print("<table border='1' cellpadding='5'>");
        print("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th><th>Slett</th></tr>");

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
            print("td><a href=' slett-student.php?brukernavn=" .urlencode($brukernavn) . "' onclick=\"return confirm('Er du sikker?');\">Slett</a></td>");
            print("</tr>");
        }
        print("</table>");
   } else {
    print("<p>Ingen studenter å slette i tabellen.</p>");
   }
} else {
    print("<p style='color:red;'>Kunne ikke hente studenter fra databasen: " . mysqli_error($conn) . "</p>");
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>


