<?php
// registrer-klasse.php
?>
<h3>Registrer ny klasse</h3>

<form action="" method="post"> id="registrerKlasseSkjema" name=registrerKlasseSkjema">
    Klassekode: <input type="text" id="klassekode" name="klassekode" required /><br />
    Klassenavn: <input type="text" id="klassenavn" name="klassenavn" required /><br />
    Studiumkode: <input type="text" id="studiumkode" name="studiumkode" required /><br />
    <input type="submit" value="registrer klasse" id="registrerKnapp" name="Registrerklasse" />
</form>

<?php
if (isset($_POST["Registrer_klasse"])) {
    include("db.php");

    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    // SQL-setnig for å sette inn data
    $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES ('$klaaekode', '$klassekode', '$studiumkode');";

    // Utfører spørringen mot databasen
    if (mysqli_query($conn, $sqlSetning)) {
        print("klassen ble registert med suksess!");
    } else {
        print("Feil ved registrering: " . mysqli_error($conn));
    }
}
?>
<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>

    


        



    







        

