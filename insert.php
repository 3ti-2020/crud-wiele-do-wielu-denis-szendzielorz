<?php
 $servername = 'sql7.freemysqlhosting.net';
 $username = 'sql7373150';
 $password = 'gwQeUeTr6F';
 $dbname = 'sql7373150';

 $conn = new mysqli($servername, $username, $password, $dbname);

 $sqlGetId = "SELECT LAST_INSERT_ID()";
 
 $sql=" INSERT INTO lib_autor (`id_autor`, `name`) values (NULL, '".$_POST['nazw']."') ";
 mysqli_query($conn, $sql);
 $result = mysqli_query($conn, $sqlGetId);
 while ($row = $result->fetch_assoc()) {
     $autorid = $row["LAST_INSERT_ID()"];
 }
 
 $sql=" INSERT INTO lib_tyt (`id_tytul`, `tytul`) values (NULL, '".$_POST['tytul']."') ";
 mysqli_query($conn, $sql);
 $result = mysqli_query($conn, $sqlGetId);
 while ($row = $result->fetch_assoc()) {
     $tytulid = $row["LAST_INSERT_ID()"];
 }
 
 $sql=" INSERT INTO lib_aut_tyt (`id_autor_tytul`, `id_autor`,`id_tytul`) values (NULL, '$autorid', '$tytulid')";
 
 mysqli_query($conn, $sql);
 
 header("Location:index.php");
 ?>