<?php
// db.php - Tilkobling til MySQL-database
$host = "b-studentsql-1.usn.no"; // eller IP-adresse til databasen
$user = "mucha4460"; // brukernavn for databasen
$password = "ditt_passord"; // passord for databasen
$database = "mucha4460"; // navn på databasen
$conn = new mysqli($host, $user, $password, $database);

// Sjekk tilkoblingen
if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

//setter tegnsettet til UTF-8
mysqli_set_charset($conn, "utf8");
?>

