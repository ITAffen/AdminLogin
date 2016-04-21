<?php
   session_start();
?>

<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Login 
    </title>
</head>
<body>
<?php
    if (isset($_GET[type]) && $_GET[type] == 'admin') {
        if (isset($_SESSION["user"])){
        }
        $type = $_GET[type];
    } else {
        $type = "user";
    }
if (isset($_POST["send"])){

           require_once("class_login.php"); // login Klasse laden
        
        $login = new login(); //login Objekt erzeugen
        
        $res = $login->doLogin($type); //Methode f�r login aufrufen

        if (count($res)>0 || !isset($_SESSION["user"])) {    //irgendwas ist schiefgelaufen   
            require_once("navBar.php"); //Navigation anzeigen (nicht vorher, weil sonst die Abfrage, ob User eingeloggt ist nicht stimmt
            echo "Fehler:";
                foreach ($res as $err) 
                    echo "<p> $err </p>";  
        } else {
             header("Location: index.php");
             echo "\n Willkommen ".$_SESSION["user"]."\n"; //Benutzer begr��en
             echo "Sie sind als ".$_SESSION["level"]." eingeloggt.";
        }
        
    }         
        
        if (isset($_SESSION["user"])) { // user eingeloggt 
            echo "Sie sind als ".$_SESSION["user"]." mit ".$_SESSION["level"]." Rechten eingeloggt.";
        }
        echo "Login als ".$type;

?>
    <form name="user" action="<?php echo $_SERVER['PHP_SELF'].'?type='.$type ?>" method="post"> <!-- Affenformular -->
    <p>
        <label>Username:</label>
        <input type="text" name="username" />
     </p>
     <p>
        <label>Passwort:</label>
        <input type="password" name="password" />
      </p>
      <p><input type = "submit" name = "send" value="Login" /></p>
    </form>


</body>
</html>
