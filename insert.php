<?php
 $servername = 'sql7.freemysqlhosting.net';
 $username = 'sql7373150';
 $password = 'gwQeUeTr6F';
 $dbname = 'sql7373150';

 $conn = new mysqli($servername, $username, $password, $dbname);


 $name = $_POST['name'];
 $tytul = $_POST['tytul'];

    $sql_autor = "INSERT INTO `lib_autor`(`id_autor`, `name`) VALUES (NULL, '$name')";

    $query1 = mysqli_query($conn, $sql_autor);

 if($query1){

    $sql_tytul = "INSERT INTO `lib_tyt`(`id_tytul`, `tytul`) VALUES (NULL, '$tytul')";

    $query2 = mysqli_query($conn, $sql_tytul);

 }

 if($query2){

    $id_autor = "SELECT id_autor FROM `lib_autor` WHERE name='$name' ";
    $result1 = $conn->query($id_autor);

    while($row1 = $result1->fetch_assoc()){
        $autorid = $row1['id_autor'];

};
    $id_tytul = "SELECT id_tytul FROM `lib_tytul` WHERE tytul='$tytul' ";
    $result2 = $conn->query($id_tytul);

    while($row2 = $result2->fetch_assoc()){
        $tytulid = $row2['id_tytul'];
};

 $sql3=" INSERT INTO lib_aut_tyt (`id_autor_tytul`, `id_autor`,`id_tytul`) values (NULL, '$autorid', '$tytulid')";
 
 $query3 = mysqli_query($conn, $sql3);
 
 header("Location:index.php");
 ?>