<?php

session_start();
if (isset($_POST["username"])) {
    if ($_POST["username"] == "username" && $_POST["password"] == "a") {
        $_SESSION["logowanie"] = 1;
    }
    else {
        $_SESSION["logowanie"] = -1;
    }
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
<div class="log">
    <form method="post" class="log">
        <label for="username">Nazwa uzytkownika:</label>
        <input type="text" name="username">
        <br>
        <label for="password">Haslo:</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Zaloguj ">


        <?php

        if(isset($error) && $error = true){
            echo "<span class='blad'>Zaloguj sie ponownie</span>";
            unset($error);
        }
        ?>

    </form>
    </div>
</body>
</html>
