<!DOCTYPE html>
<html>
<head>
<title>Удаление зоны</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
html {
    background-image: url(auditory.jpg);
}
</style>
</head>
<body>
    <p>Удалено!</p>
    <p><button type="button" name="btn" value="back" onclick="window.location.href = 'http://localhost/reestr_project/zones.php';"> Back </button></p>
</body>
<?php
    if(isset($_GET['zone_name']) ){
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $port = '5432';
        $dbname='postgres';
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        try{
        $pdo->prepare("DELETE FROM zone_addres WHERE zone_name='".$_GET['zone_name']."'")->execute();
    }
        catch(PDOException $e){
            echo $e;
        }

    }
?>