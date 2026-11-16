<?php
// registrer-klasse.php
include("db.php")
?>
<h3>Registrer ny klasse</h3>

<form action="registrer-klasse.php" method="post">
    Klassekode: <input type="text" name="klassekode" required /><br />
    Klassenavn: <input type="text" name="klassenavn" required /><br />
    Studiumkode: <input type="text" name="studiumkode" required /><br />
    <input type="submit" value="Registrer klasse" name="Registrer_klasse" />
</form>

<?php
if (isset($_POST["Registrer_klasse"])) {
    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    // Sjekker først om klassekoden finnes fra før
    $sjekkSql = "SELECT * FROM  klasse WHERE klassekode='$klassekode';";
    $sjekkRes = mysqli_query($conn, $sjekkSql);

    if (mysqli_num_rows($sjekkRes) > 0) {
        print("<p style='color:red;'>Klassekoden <strong>$klassekode</strong> finnes allerede fra før!</p>");
    } else {
       $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VaLUES ('$klassekode', '$klassenavn', '$studiumkode');";
       if (mysqli_query($conn, $sqlSetning)) {
           print("<p>Klassen <strong>$klassekode</strong> ($klassenavn) er nå registrert!</p>");
       } else{
        print("<p style='color:red;'>Det oppstod en feil ved registrering.</p>");
       }
    }
}
?>
<br /><br />
<a href="index.php">Tilbake til hovedmenyen</a>

    


        



    







        

