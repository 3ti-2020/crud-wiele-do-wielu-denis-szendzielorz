<?php
    $servername = 'sql7.freemysqlhosting.net';
    $username = 'sql7373150';
    $password = 'gwQeUeTr6F';
    $dbname = 'sql7373150';

    $conn= new mysqli($servername,$username,$password,$dbname);

    $sql="INSERT INTO `lib_tyt`(`id_tytul`, `tytul`) VALUES (NULL,'".$_POST['tytul']."') ;";
    
    mysqli_query($conn, $sql);

    header("Location:index.php");
?>