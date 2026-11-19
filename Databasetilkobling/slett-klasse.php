<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("db.php");
$kobling = $conn ?? ($db ?? ($tilkobling ?? ($con ?? null)));

if (!$kobling) {
    die("<p style='color:red; font-weight:bold;'>Feil: Fant ikke databasetilkoblingen fra db.php!</p>");
}

// Sletter klasse via POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["klassekode"])) {
    $klassekode = mysqli_real_escape_string($kobling, $_POST["klassekode"]);
    $sqlSlett = "DELETE FROM klasse WHERE klassekode = '$klassekode'";

    try {
        if (mysqli_query($kobling, $sqlSlett)) {
            if (mysqli_affected_rows($kobling) > 0) {
                $_SESSION["melding"] = "<div style='background-color:#d4edda; color:#155724; padding:10px; border:1px solid #c3e6cb; margin-bottom:15px; font-weight:bold;'>Klassen '$klassekode' er nå slettet!</div>";
            } else {
                $_SESSION["melding"] = "<div style='background-color:#fff3cd; color:#856404; padding:10px; border:1px solid #ffeeba; margin-bottom:15px; font-weight:bold;'>Fant ikke klassen '$klassekode' i databasen.</div>";
            }
        } else {
            $_SESSION["melding"] = "<div style='background-color:#f8d7da; color:#721c24; padding:10px; border:1px solid #f5c6cb; margin-bottom:15px; font-weight:bold;'>Feil ved sletting (sjekk om det finnes studenter knyttet til klassen): " . mysqli_error($kobling) . "</div>";
        }
    } catch (mysqli_sql_exception $e) {
        $_SESSION["melding"] = "<div style='background-color:#f8d7da; color:#721c24; padding:10px; border:1px solid #f5c6cb; margin-bottom:15px; font-weight:bold;'>Kan ikke slette klassen '$klassekode' fordi det finnes studenter registrert i denne klassen!</div>";
    }

    header("Location: slett-klasse.php");
    exit();
}

// Viser eventuell melding fra forrige handling
if (isset($_SESSION["melding"])) {
    print($_SESSION["melding"]);
    unset($_SESSION["melding"]);
}

// Henter og viser tabellen
$sqlVis = "SELECT * FROM klasse ORDER BY klassekode";
$sqlResultat = mysqli_query($kobling, $sqlVis);

if ($sqlResultat) {
    print("<table border='1' cellpadding='5'>");
    print("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th><th>Slett</th></tr>");

    while ($rad = mysqli_fetch_array($sqlResultat)) {
        $klassekode = $rad["klassekode"];
        $klassenavn = $rad["klassenavn"];
        $studiumkode = $rad["studiumkode"];

        print("<tr>");
        print("<td>$klassekode</td>");
        print("<td>$klassenavn</td>");
        print("<td>$studiumkode</td>");
        print("<td>
            <form method='post' style='margin:0;' onsubmit=\"return confirm('Er du sikker på at du vil slette klassen $klassekode?');\">
                <input type='hidden' name='klassekode' value='$klassekode'>
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





