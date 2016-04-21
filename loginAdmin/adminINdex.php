<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Admin Bereich
    </title>
</head>
<body>
    <?php
    require_once("navBar.php");
    /* Kontrolle, ob innerhalb der Session */
    if (!isset($_SESSION["user"]) || $_SESSION["level"]!='admin')
        exit("<p>Sie haben keine Admin Rechte <br /><a href='login.php?type=admin'>Zum AdminLogin</a></p>");   //rest wird nicht angezeigt
    echo "<p> Willkommen ".$_SESSION["user"]."!</p>" ; //Benutzer begrüßen
    echo "<p> Sie sind mit ".$_SESSION["level"]." Rechten eingeloggt.</p>";
    ?>

Meine Inhalte

</body>
</html>
