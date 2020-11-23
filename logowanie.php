<?php
    session_start();
    if (isset($_POST["username"])) {

        //$conn = new mysqli("localhost", "root", "", "vokun_baza");

        $conn = new mysqli("mysql-vokun.alwaysdata.net", "vokun", "bazadanych", "vokun_baza");

        $result = $conn->query("SELECT id_user, username, password, admin FROM users WHERE username = '".$_POST["username"]."' AND password = '".$_POST["password"]."';");

        if ($result->num_rows == 1) {
            while($row=$result->fetch_assoc()){
                $_SESSION["id_user"] = $row["id_user"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["isAdmin"] = $row["admin"];
                $_SESSION["logowanie"] = 1; 
            }
        }
        else {
            $_SESSION["logowanie"] = -1; 
        }
        
    }
    if (isset($_GET["wyloguj"])) {
        unset($_SESSION["logowanie"]);
        unset($_SESSION["id_user"]);
        unset($_SESSION["username"]);
        unset($_SESSION["isAdmin"]);
    }
    header("Location: index.php");
?>