<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denis Szendzielorz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php session_start();
            if(isset($_SESSION["logowanie"]) && $_SESSION["logowanie"] == 1) $isLoggedIn = true;
            else $isLoggedIn = false;?>
    <div class="container">
        <div class="item a">

            <div class="nap">
            <h1>Denis Szendzielorz grupa 2</h1>
            </div>

            <div class="lin">
            <ul class="ul2">
            <li><a class = "aa" href="todo.php">TODO</a></li>
            <li><a class = "aa" href="karty.php">Karty</a></li>
            <li><a class = "aa" href="https://github.com/3ti-2020/crud-wiele-do-wielu-denis-szendzielorz">GitHub</a></li></ul>
            </div>

        </div>


        <div class="item b">
                <ul class="ul1"><?php
                    if($isLoggedIn && $_SESSION["isAdmin"] == 1 ) echo('<li class="li">Dodaj Książkę</li> 
                        <form action="insert.php" method="POST">
                        <li class="li"><input type="text" name="name" ></li>
                        <br>
                        <li class="li"><input type="text" name="tytul" ></li>
                        <br>
                        <li class="li"><input type="submit" value="Dodaj"></li>
                        </form>');
                    ?>

                </ul>
        </div>

        <div class="item c">
        <?php if($isLoggedIn && $_SESSION["isAdmin"] == 1) echo('<span>Podaj login wypożyczającego i kliknij wypożycz: <input type="text" class="login_input text"></span>'); ?>
        <br/>
            <?php 

            //$servername = 'localhost';
            //$username = 'root';
            //$password = '';
            //$dbname = 'vokun_baza';

            $servername = 'mysql-vokun.alwaysdata.net';
            $username = 'vokun';
            $password = 'bazadanych';
            $dbname = 'vokun_baza';

            $conn = new mysqli($servername, $username, $password,$dbname);
            $result = $conn->query("SELECT `id_autor_tytul`,`name`, `tytul` FROM lib_tyt, lib_aut_tyt, lib_autor where lib_autor.id_autor = lib_aut_tyt.id_autor and lib_tyt.id_tytul = lib_aut_tyt.id_tytul");
            echo("<table class='tabela' border 1>");
            echo("<tr>
            <th>ID</th>
            <th>Autor</th>
            <th>Tytuł</th>
            ");
            if($isLoggedIn && $_SESSION["isAdmin"] == 1) {
                echo("<th>Usuń</th>
                <th>Wypożycz</th></tr>");
            }

            while($row = $result->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$row['id_autor_tytul']."</td>");
                echo("<td>".$row['name']."</td>");
                echo("<td>".$row['tytul']."</td>");
                if($isLoggedIn && $_SESSION["isAdmin"] == 1){
                echo("<td><form action='delete.php' method='POST'>
                            <input type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'>
                            <input type='submit' value='Usun'> 
                        </form>
                    </td>");
                    echo("<td> <form action='wypozycz.php' method='POST'>
                            <input type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'>
                            <input type='hidden' name='username'>
                            <input type='submit' value='Wypożycz'></form></td>");
                }
                echo("</tr>");
            }

            echo("</table><br/>");


            if($isLoggedIn) {
                if($_SESSION["isAdmin"] == 1) {
                    $result = $conn->query("SELECT lib_aut_tyt.id_autor_tytul, name, tytul, users.username FROM lib_autor, lib_tyt, lib_aut_tyt, lib_wyp, users where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul and lib_aut_tyt.id_autor_tytul = lib_wyp.id_ksiazki and lib_wyp.id_user = users.id_user and data_odd is NULL and dost = 0");
                }
                else {
                    $result = $conn->query("SELECT lib_aut_tyt.id_autor_tytul, data_wyp, data_odd, name, tytul, id_user FROM lib_autor, lib_tyt, lib_aut_tyt, lib_wyp where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul and lib_aut_tyt.id_autor_tytul = lib_wyp.id_ksiazki and id_user = ".$_SESSION["id_user"]);
                }
            
                echo("<table class='table' border 1>");
                echo("<tr>
                <th>ID</th>
                <th>Nazwisko</th>
                <th>Tytul</th>");
                if($_SESSION["isAdmin"] == 1) {
                    echo("<th>Wypożyczający</th>");
                    echo("<th>Usuń</th>");
                    echo("<th>Oddaj</th>");
                }
                else {
                    echo("<th>Termin</th>");
                }
                echo("</tr>");
                if ($result->num_rows != 0) {
                    while($row=$result->fetch_assoc()){
                        
                        echo("<tr>");
                        echo("<td>".$row['id_autor_tytul']."</td>");
                        echo("<td>".$row['name']."</td>");
                        echo("<td>".$row['tytul']."</td>");
                        if($_SESSION["isAdmin"] == 1){
                            echo("<td>".$row["username"]."</td>");
                            echo("<td>  <form class='form' action='delete.php' method='POST'>
                            <input type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'></br>
                            <input type='submit' value='Usun'></form></td>");
                           
                        }
                        else {
                            if ($row["data_odd"] == NULL) {
                                $timestamp = strtotime($row["data_wyp"]);
                                $termin = 30 * 86400;
                                $data = date("d.m.Y", $timestamp + $termin);
            
                                echo("<td>".$data."</td>");
                            }
                            else {
                                echo("<td>Oddano</td>");
                            }
                        }
                        echo("</tr>");
                    }
                }
                echo("</table>");
            }
            ?>
            </div>

            <div class="item d">
            <?php
                if (isset($_SESSION["logowanie"]) && $_SESSION["logowanie"] == -1) {
                echo "<p class='alert'>Niepoprawne dane</p>";
                unset($_SESSION["logowanie"]);
                }
                if ($isLoggedIn) {
                echo "<div class='buttons'><a class='button' href='logowanie.php?wyloguj=1'>Wyloguj</a></div>";
                }
                else {
                echo "<form class='form' action='logowanie.php' method='POST'>
                <input class='text' type='text' name='username' placeholder='username'></br>
                <input class='text' type='password' name='password' placeholder='password'></br>
                <input class='button' type='submit' value='zaloguj'>
                </form>";
                }
            ?>
            </div>

            <div class="item e">
                <h4 class="hexColor">Kod koloru<span class="hex"></span><h4>

                <button type = "button" class = "Btn">Zmień kolor </button>
            </div>

            <div class="item f">
                <div class="dane">
                    <a class="aaa">Dane do logowania:</a>
                    <a class="aaa">Login: Nauczyciel</a>
                    <a class="aaa">Haslo: 123</a>
                </div>
            </div>


    </div>
    <script src = "main.js"></script>
</body>
</html>