<?php
// db.php - Tilkobling til MySQL-database
$host = "b-studentsql-1.usn.no"; // eller IP-adresse til databasen
$user = "mucha4460"; // brukernavn for databasen
$password = "d4f7mucha4460"; // passord for databasen
$database = "mucha4460"; // navn på databasen
$db = mysqli_connect($host, $user, $password, $database);

// Sjekk tilkoblingen
if (!$db) {
    die("Tilkobling mislyktes: " . mysqli_connect_error());
}

// Setter tegnsettet til UTF-8
mysqli_set_charset($db, "utf8");
?>



    




