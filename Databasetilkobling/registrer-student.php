<?php
// registrer-student.php - Registrerer en ny student i databasen
include ("db.php"); // kobler til databasen
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrer ny student</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; color: #333;}
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
        h1 { color: #003366; font-size: 24px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;
         border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { margin-top: 20px; padding: 10px 20px; background-color: #0066cc; color: white; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #004080; }
        .melding { margin-top: 15px; font-weight: bold; padding: 10px; border-radius: 4px; }
        .tilbake { display: block; margin-top: 20px; color: #0066cc; text-decoration: none; font-weight: bold;}
        .tilbake:hover { text-decoration: underline;}
    </style>
    </head>
<body>
<div class="container">
    <h1>Registrer ny student</h1>

    <!-- Skjema for å fylle inn studentnummer, fornavn, etternavn og klassekode -->
    <form action="registrer-student.php" method="post">
        <label for="studentnummer">Studentnummer:</label>
        <input type="text" id="studentnummer" name="studentnummer" required>

        <label for="fornavn">Fornavn:</label>
        <input type="text" id="fornavn" name="fornavn" required>

        <label for="etternavn">Etternavn:</label>
        <input type="text" id="etternavn" name="etternavn" required>

        <label for="klassekode">Klassekode:</label>
        <input type="text" id="klassekode" name="klassekode" required>

        <input type="submit" name="Registrer_student" value="Registrer student">
    </form>

    <?php
    // Sjekk om skjemaet er sendt inn
    if (isset($_POST['Registrer_student'])) {
        $studentnummer = $_POST['studentnummer'];
        $fornavn = $_POST['fornavn'];
        $etternavn = $_POST['etternavn'];
        $klassekode = $_POST['klassekode'];

        // SQL-setning for å sette inn data (direkte med variabler)
        $sqlSetning = "INSERT INTO student (studentnummer, fornavn, etternavn, klassekode) VALUES ('$studentnummer','$fornavn','$etternavn','$klassekode');";
        
       // Utfør spørringen mot databasen
        if (mysqli_query($conn, $sqlSetning)) {
            echo "<p class='melding' style='color: green;'>Studenten ble registrert med suksess!</p>";
        } else {
            echo "<p class='melding' style='color: red;'>Feil ved registrering: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

    <a class="tilbake" href="registrer-student.php">Registrer ny student</a>
    <a class="tilbake" href="index.php">tilbake til hovedmenyen</a>
</div>
</body>
</html>
