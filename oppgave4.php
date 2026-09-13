<?php
$tall1 = $_POST['tall1'];
$tall2 = $_POST['tall2'];

$sum = $tall1 + $tall2;
$differanse = $tall1 - $tall2;
$produkt = $tall1 * $tall2;
$kvotient = $tall1 / $tall2;

echo "Tall 1 er $tall1 <br>";
echo "Tall 2 er $tall2 <br><br>";

echo "Summen er $sum <br>";
echo "Differansen er $differanse <br>";
echo "Produktet er $produkt <br>";
echo "Kvotienten er $kvotient <br>";
?>