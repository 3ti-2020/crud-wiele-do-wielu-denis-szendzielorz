<?php
     $servername = 'mysql-vokun.alwaysdata.net';
     $username = 'vokun';
     $password = 'bazadanych';
     $dbname = 'vokun_baza';

 $conn= new mysqli($servername,$username,$password,$dbname);

$sqlGetId = "SELECT LAST_INSERT_ID()";

$sql=" INSERT INTO lib_autor (name, id_autor) values ('".$_POST['name']."',NULL) ";
mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sqlGetId);
while ($row = $result->fetch_assoc()) {
    $autorId = $row["LAST_INSERT_ID()"];
}

$sql=" INSERT INTO lib_tyt (tytul, id_tytul) values ('".$_POST['tytul']."', NULL) ";
mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sqlGetId);
while ($row = $result->fetch_assoc()) {
    $tytulId = $row["LAST_INSERT_ID()"];
}

$sql=" INSERT INTO lib_aut_tyt (id_autor_tytul, id_autor,id_tytul) values (NULL, $autorId, $tytulId)";

mysqli_query($conn, $sql);

header("Location:index.php");