<?php
    session_start();
?>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
       Home
    </title>
</head>
    <body>

<?php
    require_once("navBar.php");
    /* Kontrolle, ob innerhalb der Session */
    if (!isset($_SESSION["user"]))
        exit("<p>Kein Zugang<br /><a href='login.php'>Zum Login</a></p>");   //rest wird nicht angezeigt
    echo "<p> Willkommen ".$_SESSION["user"]."!</p>" ; //Benutzer begr??en
    echo "<p> Sie sind mit ".$_SESSION["level"]." Rechten eingeloggt.</p>";
?>
        
Meine Inhalte

</body>
</html>
