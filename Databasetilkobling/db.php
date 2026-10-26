<?php
// db.php - Tilkobling til MySQL-database
$host = "localhost"; // eller IP-adresse til databasen
$user = "root"; // brukernavn for databasen
$password = ""; // passord for databasen
$database = "min_database"; // navn på databasen
$conn = new mysqli($host, $user, $password, $database);

// Sjekk tilkoblingen
if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

//setter tegnsettet til UTF-8
mysqli_set_charset($conn, "utf8");
?>

