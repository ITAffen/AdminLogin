<?php

/**
 * Class1 short summary.
 *
 * Class1 description.
 *
 * @version 1.0
 * @author sandr
 */

class DBConnector
{
    private $con = NULL;
    // create a database connection, using the constants from config/db.php (which we loaded in index.php)
    public $errors = array();  //collecting error messages

    function connect(){
        require_once("config_db.php");
        $this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    function close(){
        $this->con->close();
    }

    function getUserDetails($user)
	{
        $this->connect(); //verbinden
        if (!$this->con->connect_errno) { //db Verbindung funktioniert, wenn keine Fehler
		    if($user!=NULL) //Parameter nicht leer
		    {
                $userName = $this->con->real_escape_string($user); //SQL injection vermeiden
			    $sql = "SELECT * FROM users
				    	WHERE userName = '".$userName."'
					    LIMIT 1";    //sollte den user nur einmal geben
                $result = $this->con->query($sql);    //sql Query absetzen
                if ($result != NULL) {   //wir haben ein Ergebnis
                    $row = $result->fetch_object();   //erste Reihe auslesen
                    $this->close();
                    return ($row);
           } 
		}
        } else throw new Exception('Keine Datenbankverbindung');
        return NULL;
	}

    }





?>