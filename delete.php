<?php

$servername = 'mysql-vokun.alwaysdata.net';
$username = 'vokun';
$password = 'bazadanych';
$dbname = 'vokun_baza';

$conn= new mysqli($servername,$username,$password,$dbname);

$sql="DELETE FROM `lib_aut_tyt` WHERE `lib_aut_tyt`.`id_autor_tytul` = '".$_POST['ID']."'";

echo($sql);

mysqli_query($conn, $sql);

header("Location:index.php");
?>