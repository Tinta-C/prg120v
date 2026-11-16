<?php
include("db.php");
?>

<h3>Slette student</h3>

<?php
if (isset($_GET["brukernavn"])) {
    $brukernavn = $_GET["brukernavn"];
    $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
    mysqli_query($conn, $sqlSetning);
    header("Location: slett-student.php")
    exit();
}

$sqlSetning = "SELECT *FROM student ORDER BY brukernavn;";
$sqlResultat = mysqli_query($conn, $sqlSetning);

    if ($sqlResultat) {
        $antallRader = mysqli_num_rows($sqlResultat);
        
        if ($antallRader > 0) {
            print("table border='1'>");
            print("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th>Slett</th></tr>")
    
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
        print("<td><a href='slett-student.php?brukernavn=$brukernavn' onclick=\"return confirm('er du sikker?');\">Slett</a></td>");
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

