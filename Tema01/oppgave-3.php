<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Svar fra oppgave 3</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tall1 = floatval($_POST["tall1"]);
        $tall2 = floatval($_POST["tall2"]);

        $sum = $tall1 + $tall2;
        $differanse = $tall1 - $tall2;

        echo "<p>Tall 1 er $tall1<br>";
        echo "Tall 2 er $tall2<p/>";
        echo "<p>Summen er $sum<br>";
       echo "Differansen er $differanse</p>";
    } else{
        echo "<p>Ingen data mottatt.</p>";
    }
    ?>
</body>
</html>


    
    

    




