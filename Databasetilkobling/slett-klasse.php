<?php
// slett-klasse.php - sletting av en klasse
include ("db.php"); // kobler til databasen
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Slett klasse</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; color: #333;}
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
        h1 { color: #003366; font-size: 24px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { margin-top: 20px; padding: 10px 20px; background-color: #0066cc; color: white; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #004080; }
        .melding { margin-top: 15px; font-weight: bold; padding: 10px; border-radius: 4px; }
        .tilbake { display: block; margin-top: 20px; color: #0066cc; text-decoration: none; font-weight: bold;}
        .tilbake:hover { text-decoration: underline;}
    </style>
</head>
<body>

<div class="container">
    <h1>Slett klasse</h1>

    <!-- Skjema med nedtrekksmeny for å velg klasse som skal slettes -->
    <form action="" method="POST">
        <label for="klassekode">Velg klasse:</label>
        <select name="klassekode" id="klassekode" required>
            <?php
            // Hent alle klasser fra databasen for å fylle nedtrekksmenyen
            $sql = "SELECT klassekode, klassenavn FROM klasse;";
            $resultat = mysqli_query($conn, $sql);
            while ($rad = mysqli_fetch_assoc($resultat)) {
                echo "<option value='" . $rad['klassekode'] . "'>" . $rad['klassekode'] . "-" . $rad['klassenavn'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" name="Slett" value="Slett klasse">   
    </form>

    <?php
    // Sjekk om skjemaet er sendt inn
    if (isset($_POST['slett'])) {
        $klassekode = $_POST['klassekode'];

        // SQL-setning for å slette klassen basert på klassekode
        $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
        
        // Utfør spørringen mot databasen
        if (mysqli_query($conn, $sqlSetning)) {
            echo "<p class='melding' style='color: green;'>Klassen med kode '$klassekode' ble slettet med suksess!</p>";
        } else {
            echo "<p class='melding' style='color: red;'>Feil ved sletting (husk at klasser med tilhørende studenter kan gi feilmelding pga. fremmednøkkel): " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

    <a class="tilbake" href="vis-klasser.php">Tilbake til oversikt over klasser</a>
</div>
</body>
</html>

