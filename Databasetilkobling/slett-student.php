<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("db.php");
$kobling = $conn ?? ($db ?? ($tilkobling ?? ($con ?? null)));

if (!$kobling) {
    die("<p style='color:red; font-weight:bold;'>Feil: Fant ikke databasetilkoblingen fra db.php!</p>");
}

// Sletter student via POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["brukernavn"])) {
    $brukernavn = mysqli_real_escape_string($kobling, $_POST["brukernavn"]);
    $sqlSlett = "DELETE FROM student WHERE brukernavn = '$brukernavn'";

    if (mysqli_query($kobling, $sqlSlett)) {
        if (mysqli_affected_rows($kobling) > 0) {
            $_SESSION["melding"] = "<div style='background-color:#d4edda; color:#155724; padding:10px; border:1px solid #c3e6cb; margin-bottom:15px; font-weight:bold;'>Studenten '$brukernavn' er nå slettet!</div>";
        } else {
            $_SESSION["melding"] = "<div style='background-color:#fff3cd; color:#856404; padding:10px; border:1px solid #ffeeba; margin-bottom:15px; font-weight:bold;'>Fant ikke studenten '$brukernavn' i databasen.</div>";
        }
    } else {
        $_SESSION["melding"] = "<div style='background-color:#f8d7da; color:#721c24; padding:10px; border:1px solid #f5c6cb; margin-bottom:15px; font-weight:bold;'>Feil ved sletting: " . mysqli_error($kobling) . "</div>";
    }
    
    header("Location: slett-student.php");
    exit();
}

// Viser eventuell melding fra forrige handling
if (isset($_SESSION["melding"])) {
    print($_SESSION["melding"]);
    unset($_SESSION["melding"]);
}

// Henter og viser tabellen
$sqlVis = "SELECT * FROM student ORDER BY brukernavn";
$sqlResultat = mysqli_query($kobling, $sqlVis);

if ($sqlResultat) {
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
        print("<td>
            <form method='post' style='margin:0;' onsubmit=\"return confirm('Er du sikker på at du vil slette $brukernavn?');\">
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




