<!DOCTYPE html>
<html>
<head>
<title>Аудитории</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
html {
    background-image: url(auditory.jpg);
}
</style>
</head>
<?php
echo "<body><h1>Список зданий</h1>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$port = '5432';
$dbname='postgres';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stml = $pdo->query('SELECT register_number, nazvanie, size, number, litera, rayon, ulitsa from zdanie left join zone_addres on zdanie.zone_name=zone_addres.zone_name');
while ($row = $stml->fetch()){
    echo "<div class='select_a'><h4>".$row['register_number']."</h4><p class = 'nazv'>"
    .$row['nazvanie'] . "</p><p><b>Площадь: </b>".$row['size']." м2</p><p><b>Адрес: </b>" . 
    $row['rayon'] . " district, " . $row['ulitsa'] . " street, " . $row['number'] . " " . $row['litera'] . "</p></div>";
}
echo  "</body></html>"
?>