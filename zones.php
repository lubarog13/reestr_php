<!DOCTYPE html>
<html>
<head>
<title>Зоны</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
html {
    background-image: url(auditory.jpg);
}
.gr {
    padding: 10px 20px;
  text-align: center;
    padding-left: -20px;
    margin-left: 5%;
    margin-top: 20px;
    margin-bottom: 3%;
    font-size: 12pt; 
    font-style: oblique;
    background-color: white; 
    color: black; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    border: 2px solid #f44336;
}
.add {
    padding: 15px 32px;
  text-align: center;
    margin-left: 17%;
    font-size: 16pt; 
    font-weight: bold;
    text-decoration:underline;
    background-color: white; 
    color: black; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 2px solid green;
}
.gr:hover {
    background-color: #f44336;
    color: white;
}
.add:hover {
    background-color: green;
    color: white;
}
div.grp {
    margin: 3% 15%;
    border-radius: 25px;
    border: 2px solid gray;
    padding: 10px;
    box-shadow: 12px -12px 2px 1px rgba(0, 0, 255, .2);
    background-color: white;
}
</style>
</head>
<?php
echo "<body><h1>Список зон</h1>";
echo "<button class='add' name='btn' type='button' onclick=".'"window.location.href = '."'http://localhost/reestr_project/zone_add.html'".'">Add or update</button><div class="grp">';
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
echo  "</div></body></html>"
?>