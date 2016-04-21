<?php
session_start();
?>

<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Logout
    </title>
</head>
    <body>
    <?php
        require_once("class_login.php");
        $login = new login();
        $res = $login->doLogout();
        if (!isset($_SESSION["user"]))
            require_once("navBar.php");
            echo "Sie sind nicht angemeldet!";
        require_once("navBar.php");
?>
    
    

    </body>
</html>