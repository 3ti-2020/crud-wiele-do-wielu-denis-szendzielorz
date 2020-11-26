<?php
session_start();
    //$servername = 'localhost';
    //$username = 'root';
    //$password = '';
    //$dbname = 'vokun_baza';

    $servername = 'mysql-vokun.alwaysdata.net';
    $username = 'vokun';
    $password = 'bazadanych';
    $dbname = 'vokun_baza';


    $id_user = "";
    $conn= new mysqli($servername,$username,$password,$dbname);
    $sql="SELECT id_user FROM users WHERE username = '".$_POST["username"]."'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 1) {
    while($row=$result->fetch_assoc()){
        $id_user = $row["id_user"];
    }
    $sql="INSERT INTO lib_wyp (id_wyp, id_ksiazki, id_user, data_wyp, data_odd) values (NULL, ".$_POST['ID'].",".$id_user.", CURRENT_TIMESTAMP(), NULL)";
    mysqli_query($conn, $sql);

    $sql="UPDATE lib_aut_tyt SET dost = 0 WHERE id_autor_tytul = ".$_POST["ID"];
    mysqli_query($conn, $sql);
    header("Location:index.php");
    }
    else {
    echo("<p>Logowanie nieudane </p>");

}
?>