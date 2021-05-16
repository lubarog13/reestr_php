<!DOCTYPE html>
<html>
<head>
<title>Удаление зоны</title>
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
    <h4>Удалено!</h4>
    <p><button type="button" class = "add" name="btn" value="back" onclick="window.location.href = 'http://localhost/reestr_project/zones.php';"> Back </button></p>
    </div>
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