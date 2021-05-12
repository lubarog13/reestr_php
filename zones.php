<!DOCTYPE html>
<html>
<head>
<title>Зоны</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
html {
    background-image: url(auditory.jpg);
}
button {
    margin-left: 5%;
    margin-bottom: 3%;
    font-size: 12pt; 
    font-style: oblique;
    background-color: white; 
    color: black; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    border: 2px solid #f44336;
}

button:hover {
    background-color: #f44336;
    color: white;
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
    $array = explode(' ', $row['zone_name']);
    $href = "http://localhost/reestr_project/zone_delete.php?zone_name=".$array[0];
    for($i=1;$i<sizeof($array);$i++){
        $href=$href."+".$array[$i];
    }
    echo "<div class='select_z'><h4>".$row['zone_name']."</h4><p><b>Адрес: </b>" . 
    $row['rayon'] . " district, " . $row['ulitsa'] . " street </p><button class='gr' name='btn' type='button' onclick=".'"window.location.href = '."'".$href."'".'">Delete</button>'."</div>";
}
echo  "</body></html>"
?>