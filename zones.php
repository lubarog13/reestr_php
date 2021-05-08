<!DOCTYPE html>
<html>
<head>
<title>Зоны</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
html {
    background-image: url(auditory.jpg);
}
</style>
</head>
<?php
echo "<body><h1>Список зон</h1>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$port = '5432';
$dbname='postgres';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stml = $pdo->query('SELECT zone_name, rayon, ulitsa from zone_addres');
while ($row = $stml->fetch()){
    echo "<div class='select_z'><h4>".$row['zone_name']."</h4><p><b>Адрес: </b>" . 
    $row['rayon'] . " district, " . $row['ulitsa'] . " street </p></div>";
}
echo  "</body></html>"
?>