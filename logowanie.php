<?php
session_start();

$servername = 'mysql-vokun.alwaysdata.net';
$username = 'vokun';
$password = 'bazadanych';
$dbname = 'vokun_baza';

$conn= new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['username'])){
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    
    $sql = "SELECT * from users WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);
    if($result)
        $_SESSION['logged'] = true;
    else
        $error = true;
}

if(isset($_SESSION['logged']))
    header('Location: karty.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denis Szendzielorz gr2</title>
    <link rel="stylesheet" href="logowanie.css">
</head>
<body>
    <form method="post" class="log">
        <label for="username">Nazwa uzytkownika:</label>
        <input type="text" name="username">

        <label for="password">Haslo:</label>
        <input type="password" name="password">

        <input type="submit" value="Zaloguj ">


        <?php

        if(isset($error) && $error = true){
            echo "<span class='blad'>Zaloguj sie ponownie</span>";
            unset($error);
        }
        ?>

    </form>
</body>
</html>
