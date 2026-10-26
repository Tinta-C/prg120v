<?php
// index.php - Hovedsiden for databasen
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>PRG120V - obligatorisk oppgave 1</title>   
<style>
 body {font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; background-color: #f9f9f9; color: #333;
   .container { max-width: 600px; margin: auto;background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
    #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    h1 { color: #003366; font-size: 18px; border-bottom: 2px solid #eee; padding-bottom: 10px;}
    h2 { color: #555; font-size: 18px; margin-top: 20px;}
    ul { list-style-type: none; padding: 0; }
    li { margin-bottom: 10px; }
    a { text-decoration: none; color: #0066cc; font-weight: bold;}
    a:hover { text-decoration: underline; }
    </style>
    </head>
<body>

<div class="container">
<h1>PRG120V - obligatorisk oppgave 1</h1>
<p>Velkommen til min obligatoriske oppgave 1 for PRG120V. Her finner du lenker til eksempler og oppgaver som jeg har jobbet med.</p>

<h2>klasseamdinistrasjon</h2>
<ul>
    <li><a href="regitrer-klasse.php">Registrere ny klasse</a></li>
    <li><a href="vis-klasser.php">Vise alle klasser</a></li>
    <li><a href="slett-klasse.php">Slette klasse</a></li>
    </ul>

<h2>Studentadministrasjon</h2>
<ul>

    <li><a href="registrer-student.php">Registrere ny student</a></li>
    <li><a href="vis-studenter.php">Vise alle studenter</a></li>
    <li><a href="slett-student.php">Slette student</a></li>
    </ul>
</div>

</body>
</html>
