<?php
    session_start();
    if(!isset($_SESSION['logged']))
        header('Location: logowanie.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container">
<div class="item a">
<a class="aa" href="index.php">Strona główna</a>
<a class="aa" href="wyloguj.php">Wyloguj</a>
</div>
    <div class="item b">
    <div class="karta">
        <div class="obr1"></div>

        <div class="text">
            <h2>BMW</h2>
            <p>Opis</p>
        </div>

        <div class="stats">
                <div class="stat">
                    <div class="wart">374</div>
                    <div class="typ">KM</div>
                </div>

                <div class="stat">
                    <div class="wart">630 000</div>
                    <div class="typ">PLN</div>
                </div>

                <div class="stat">
                    <div class="wart">250 KM/H</div>
                    <div class="typ">VMAX</div>
                </div>

        </div>
    </div>


    <div class="karta">
    <div class="obr2"></div>

        <div class="text">
            <h2>Maserati</h2>
            <p>Opis</p>
        </div>

        <div class="stats">

        <div class="stat">
            <div class="wart">580</div>
            <div class="typ">KM</div>
        </div>

        <div class="stat">
            <div class="wart">162 000</div>
            <div class="typ">EUR</div>
        </div>

        <div class="stat">
            <div class="wart">326 KM/H</div>
            <div class="typ">VMAX</div>
        </div>
    </div>
</div>
</div>

</body>
</html>