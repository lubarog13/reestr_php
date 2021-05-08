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
echo "<body><h1>Список аудиторий</h1>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$port = '5432';
$dbname='postgres';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stml = $pdo->query('SELECT auditory_number, naznachenie, sqare, nazvanie_podrazdeleniya from auditory left join podrasdelenie on podrasdelenie.id_podrasdeleniya=auditory.id_podrasdeleniya');
while ($row = $stml->fetch()){
    echo "<div class='select_a'><h4>".$row['auditory_number']."</h4><p class = 'nazv'>".$row['naznachenie'] . "</p><p><b>Площадь: </b>".$row['sqare']." м2</p><p><b>Подразделение: </b>" . $row['nazvanie_podrazdeleniya'] . "</p></div>";
}
echo  "</body></html>"
/* $db = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser
password=$dbpass");
$query = "select 'Привет!' as field_1, 1234 as field_2";
$result = pg_query($db, $query);
$result = pg_fetch_assoc($result);
echo $result['field_1'] . '</br>' . $result['field_2'];
pg_close($db); */
?>