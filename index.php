<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denis Szendzielorz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="item a">

            <div class="nap">
            <h1>Denis Szendzielorz grupa 2</h1>

            <h3><a href="karty.php">LINK</a></h3>
            </div>

        </div>


        <div class="item b">
                <ul class="ul">
                    <form action="insert.php" method="POST">
                    <li class="li"><input type="text" name="name" ></li>
                    <li class="li"><input type="text" name="tytul" ></li>
                    <li class="li"><input type="submit" value="Dodaj"></li>
                    </form>
                </ul>
        </div>

        <div class="item c">
            <?php 
            $servername = 'mysql-vokun.alwaysdata.net';
            $username = 'vokun';
            $password = 'bazadanych';
            $dbname = 'vokun_baza';

            $conn = new mysqli($servername, $username, $password,$dbname);
            $result = $conn->query("SELECT `id_autor_tytul`,`name`, `tytul` FROM lib_tyt, lib_aut_tyt, lib_autor where lib_autor.id_autor = lib_aut_tyt.id_autor and lib_tyt.id_tytul = lib_aut_tyt.id_tytul");
            echo("<table class='tabela' border 1>");
            echo("<tr>
            <th></th></tr>");

            while($row = $result->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$row['id_autor_tytul']."</td>");
                echo("<td>".$row['name']."</td>");
                echo("<td>".$row['tytul']."</td>");
                echo("<td><form action='delete.php' method='POST'>
                            <input type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'></br>
                            <input type='submit' value='Usun'> 
                        </form>
                    </td>");

                echo("</tr>");
            }

            echo("</table>");
            ?>
        </div>
            <div class="item d"></div>
            <div class="item e"></div>
    </div>
</body>
</html>