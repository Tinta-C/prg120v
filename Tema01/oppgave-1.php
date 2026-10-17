<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Svar fra Oppgave 1</title>
</head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Henter data fra skjemaet og sikrer mot spesialtegn
            $fornavn = htmlspecialchars($_POST["fornavn"]);
            $etternavn = htmlspecialchars($_POST["etternavn"]);

            // skriver ut meldingen som oppgaben krever
            echo "<p>God dag $fornavn $etternavn</p>";
        }else {
            echo "<p>Ingen data mottatt.</p>";
        }
        ?>
        </body>
        </html>

        
    
        
        


