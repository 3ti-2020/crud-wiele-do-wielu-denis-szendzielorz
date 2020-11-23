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

            <li><a class = "aa" href="karty.php">Karty</a></li>
            <li><a class = "aa" href="https://github.com/3ti-2020/crud-wiele-do-wielu-denis-szendzielorz">GitHub</a></li></ul>
            </div>

        </div>


        <div class="item b">
                <ul class="ul1">
                    <form action="insert.php" method="POST">
                    <li class="li"><input type="text" name="name" ></li>
                    <br>
                    <li class="li"><input type="text" name="tytul" ></li>
                    <br>
                    <li class="li"><input type="submit" value="Dodaj"></li>
                    </form>
                </ul>
        </div>

        <div class="item c">
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
            <th>Tytuł</th></tr>");

            while($row = $result->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$row['id_autor_tytul']."</td>");
                echo("<td>".$row['name']."</td>");
                echo("<td>".$row['tytul']."</td>");
                echo("<td><form action='delete.php' method='POST'>
                            <input type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'>
                            <input type='submit' value='Usun'> 
                        </form>
                    </td>");

                echo("</tr>");
            }

            echo("</table>");
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
                    <a class="aaa">Login: a</a>
                    <a class="aaa">Haslo: a</a>
                </div>
            </div>


    </div>
    <script src = "main.js"></script>
</body>
</html>