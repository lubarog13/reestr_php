<?php
    if(isset($_GET['zone_name'], $_GET['rayon'], $_GET['ulitsa'])){
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $port = '5432';
        $dbname='postgres';
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        if(strcmp($_GET['btn'], "insert")==0){
        $pdo->prepare("INSERT INTO zone_addres(zone_name, rayon, ulitsa) VALUES (?, ?, ?)")->execute([$_GET['zone_name'], $_GET['rayon'], $_GET['ulitsa']]);
        }
        else{
            $pdo->prepare("UPDATE zone_addres set rayon=?, ulitsa=? where zone_name=?")->execute([ $_GET['rayon'], $_GET['ulitsa'], $_GET['zone_name']]);
        }
        $stml = $pdo->prepare('SELECT zone_name, rayon, ulitsa from zone_addres where zone_name = ?');
        $stml->execute([$_GET['zone_name']]);
        if($row = $stml->fetch()) echo "<div class='select_z'><h4>".$row['zone_name']."</h4><p><b>Адрес: </b>" . 
        $row['rayon'] . " district, " . $row['ulitsa'] . " street </p></div>";
        else echo 'Не вставилось или не изменилось';
    }
    else echo 'Введите данные'
?>