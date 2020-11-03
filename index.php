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
            <h1>Denis Szendzielorz grupa 2</h1>
        </div>


            <div class="item b">

            <form action="insert.php" method="POST">
            <input type="text" name="autor"  placeholder="autor">
            <input type="text" name="tytul"  placeholder="tytul">
            <input type="submit" value="Dodaj">
            </form>

</div>
            <div class="item c">
            <?php 
            $servername = 'sql7.freemysqlhosting.net';
            $username = 'sql7373150';
            $password = 'gwQeUeTr6F';
            $dbname = 'sql7373150';

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