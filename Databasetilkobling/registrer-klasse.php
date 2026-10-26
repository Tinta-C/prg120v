<?php
// registrer-klasse.php - Registrerer en ny klasse include ("db.php"); // kobler til databasen?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrer ny klasse</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; color: #333;}
       .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
        h1 { color: #003366; font-size: 24px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; margin-top: 5px;box-sizing: border-box;
         border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { margin-top: 20px; padding: 10px 20px; background-color: #0066cc; color: white; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover  background-color: #004080; }
        .melding { margin-top: 15px; font-weight: bold; padding: 10px; border-radius: 4px; }
        .tilbake  display: block; margin-top: 20px; color: #0066cc; text-decoration: none; font-weight: bold; 
        .tilbake:hover  text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h1>Registrer ny klasse</h1>

    <!-- Skjema for å fylle inn klassekode, klassenavn og studiumkode -->
    <form action="registrer-klasse.php" method="post">
        <label for="klassekode">Klassekode:</label>
        <input type="text" id="klassekode" name="klassekode" required>

        <label for="klassenavn">Klassenavn:</label>
        <input type="text" id="klassenavn" name="klassenavn" required>

        <label for="studiumkode">Studiumkode:</label>
        <input type="text" id="studiumkode" name="studiumkode" required>

        <input type="submit" name="Registrer_klasse" value="Registrer klasse">   
        </form>

    <?php
    // Sjekk om skjemaet er sendt inn
    if (isset($_POST['Registrer_klasse'])) { // Sørg for at navnet matcher name="" på knappen din
        $klassekode = $_POST['klassekode'];
        $klassenavn = $_POST['klassenavn'];
        $studiumkode = $_POST['studiumkode'];

        // SQL-setning for å sette inn data (direkte med variabler)
        $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES ('$klassekode','$klassenavn','$studiumkode');";
        
       // Utfør spørringen mot databasen
        if (mysqli_query($conn, $sqlSetning)) {
            echo "<p class='melding' style='color: green;'>Klassen ble registrert med suksess!</p>";
        } else {
            echo "<p class='melding' style='color: red;'>Feil ved registrering: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

    <a class="tilbake" href="index.php">tilbake til hovedmenyen</a>
</div>
</body>
</html>



    







        

