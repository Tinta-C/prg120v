<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Svar fra oppgave 4</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tall1 = floatval($_POST["tall1"]);
        $tall2 = floatval($_POST["tall2"]);

        // Beregninger
        $sum = $tall1 + $tall2;
        $differanse = $tall1 - $tall2;
        $produkt = $tall1 * $tall2;

        echo "<p>Tall 1 er $tall1<br>";
        echo "Tall 2 er $tall2<p/>";
        echo "<p>Summen er $sum<br>";
       echo "Differansen er $differanse</p>";
       echo "produktet er $produkt</p>";
       // Skjekker for deling på null før kvotient beregnes
         if ($tall2 != 0) {
                $kvotient = $tall1 / $tall2;
                echo "Kvotienten er $kvotient</p>";
          } else {
                echo "Kvotienten Kan ikke beregnes (deling på 0 ).</p>";
          }

    } else{
        echo "<p>Ingen data mottatt.</p>";
    }
    ?>
</body>
</html>

