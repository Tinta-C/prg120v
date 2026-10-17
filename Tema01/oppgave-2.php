<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>oppgave 2- svar</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Henter data fra skjemaet og sikrer mot spesialtegn
        $fornavn = htmlspecialchars($_POST["fornavn"]);
        $etternavn = htmlspecialchars($_POST["etternavn"]);
        $alder = intval($_POST["alder"]);

        // skriver ut meldingen som oppgaben krever
        echo "<p>God dag $fornavn $etternavn, du er $alder år og like sprek.</p>";
    } else {
        echo "<p>Ingen data mottatt.</p>";
    }
    ?>
</body>
</html>
