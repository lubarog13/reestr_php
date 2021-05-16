<!DOCTYPE html>
<html>
<head>
<title>Редактирование Зоны</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
html {
    background-image: url(auditory.jpg);
}
.add {
    margin-top: 15px;
    padding: 15px 32px;
  text-align: center;
    margin-left: 5%;
    font-size: 16pt; 
    font-weight: bold;
    text-decoration:underline;
    background-color: white; 
    color: black; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 2px solid green;
}
.add:hover {
    background-color: green;
    color: white;
}
div.grp {
    margin: 15%;
    border-radius: 25px;
    border: 2px solid gray;
    padding: 10px;
    box-shadow: 12px -12px 2px 1px rgba(0, 0, 255, .2);
    background-color: white;
}
</style>
</head>
<body>
<div class="grp">
<?php
    if(isset($_POST['zone_name'], $_POST['rayon'], $_POST['ulitsa'])){
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $port = '5432';
        $dbname='postgres';
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        if(strcmp($_POST['btn'], "insert")==0){
        $pdo->prepare("INSERT INTO zone_addres(zone_name, rayon, ulitsa) VALUES (?, ?, ?)")->execute([$_POST['zone_name'], $_POST['rayon'], $_POST['ulitsa']]);
        }
        else{
            $pdo->prepare("UPDATE zone_addres set rayon=?, ulitsa=? where zone_name=?")->execute([ $_POST['rayon'], $_POST['ulitsa'], $_POST['zone_name']]);
        }
        $stml = $pdo->prepare('SELECT zone_name, rayon, ulitsa from zone_addres where zone_name = ?');
        $stml->execute([$_POST['zone_name']]);
        if($row = $stml->fetch()) echo "<div class='select_z'><h4>".$row['zone_name']."</h4><p><b>Адрес: </b>" . 
        $row['rayon'] . " district, " . $row['ulitsa'] . " street </p></div>";
        else echo '<p>Не вставилось или не изменилось</p>';
    }
    else echo '<h4>Введите данные</h4>';
?>
<button class = "add" type="button" onclick="window.location.href ='http://localhost/reestr_project/zones.php'">Back</button>
</div>
</body>
</html>