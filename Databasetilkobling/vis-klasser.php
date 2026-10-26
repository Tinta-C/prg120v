<?php
// vis-klasser.php - Viser oversikt over alle registrerte klasser
include ("db.php"); // kobler til databasen
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Oversikt over klasser</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; color: #333;}
        .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
        h1 { color: #003366; font-size: 24px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f1f1f1; }
        .tilbake { display: block; margin-top: 20px; color: #0066cc; text-decoration: none; font-weight: bold; }
        .tilbake:hover { text-decoration: underline; }
    </style>                
</head>
<body>
<div class="container">
    <h1>Oversikt over registrerte klasser</h1>

    <?php
    // SQL-setning for å hente alle rader fra tabellen klasse
    $sqlSetning = "SELECT * FROM klasse;";
    $resultat = mysqli_query($conn, $sqlSetning);

    // Sjekk om spørringen returnerte noen rader
    if (mysqli_num_rows($resultat) > 0) {
        echo "<table>";
        echo "<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>";

        // loop gjennom hver rad i resultatet og skri ut i tabellen
        while ($rad = mysqli_fetch_assoc($sqlResultat)) {
          echo "<tr>";
            echo "<td>" . $rad["klassekode"] . "</td>";
            echo "<td>" . $rad["klassenavn"] . "</td>";
            echo "<td>" . $rad["studiumkode"] . "</td>";
            echo "</tr>";
        
        echo "</table>";
    } else {
        echo "<p class='melding'>Ingen klasser er registrert i databasen ennå.</p>";
    }
    ?>

    <a class="tilbake" href="registrer-klasse.php">Registrer ny klasse</a>
</div>
</body>
</html>
