<?php
// slett-student.php
include("db.php");
?>

<h3>Slette student</h3>

<?php
// Sjekk om brukernavn er sendt via URL
if (isset($_GET["brukernavn"]) && !empty($_GET["brukernavn"])) {
    $brukernavn = trim($_GET["brukernavn"]);

    
    $sqlSetning = "DELETE FROM student WHERE brukernavn = '$brukernavn'";

    if (mysqli_query($conn, $sqlSetning)) {
        print("<p style='color:green;'>Studenten med brukernavn <strong>$brukernavn</strong> er slettet!</p><br />");
    } else {
        print("<p style='color:red;'>FEIL ved sletting: " . mysqli_error($conn) . "</p><br />");
    }
} 

$sqlSetning = "SELECT * FROM student ORDER BY brukernavn;";
$sqlResultat = mysqli_query($conn, $sqlSetning);

if ($sqlResultat) {
    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader > 0) {
        print("<table border='1'>");
        print("<tr>");
        print("<th>Brukernavn</th>");
        print("<th>Fornavn</th>");
        print("<th>Etternavn</th>");
        print("<th>Klassekode</th>");
        print("<th>Slett</th>");
        print("</tr>");

        while ($rad = mysqli_fetch_array($sqlResultat)) {
            $brukernavn = $rad["brukernavn"];
            $fornavn = $rad["fornavn"];
            $etternavn = $rad["etternavn"];
            $klassekode = $rad["klassekode"];

            print("<tr>");
            print("<td>" . $brukernavn . "</td>");
            print("<td>" . $fornavn . "</td>");
            print("<td>" . $etternavn . "</td>");
            print("<td>" . $klassekode . "</td>");
            print("<td><a href='slett-student.php?brukernavn=" .urlencode($brukernavn) . "' onclick=\"return confirm('Er du sikker?');\">Slett</a></td>");
            print("</tr>");
        }
        print("</table>");
   } else {
    print("<p>Ingen studenter å slette.</p>");
   }
}
?>

<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>


