<?php

/**
 * login short summary.
 *
 * login description.
 *
 * @version 1.0
 * @author sandr
 */
class login
{
    public $errors = array();

    public function __construct()
    {
        require_once("class_DBconnector.php");
    }

    //einloggen 

    public function dologin($type)
    {     
        echo $type;
        // check login form contents
        if (empty($_POST['username'])) {
            $this->errors[] = "Usernamen angeben";
        } 
        if (empty($_POST['password'])) {
            $this->errors[] = "Passwort angeben";
        }

        if (count($this->errors) == 0){
            
            $db = new DBConnector();
            try {
                $userdetails = $db->getUserDetails($_POST['username']);
                if ($userdetails != NULL){ //
                    if ($_POST['password'] == $userdetails->userPwd){
                         //Passwort sollte natürlich eigentlich verschlüsselt gespeichert sein und mit hash verglichen werden
                        if ($type=='user'){
                            $_SESSION = array(); //Zur Sicherheit Session-Array löschen
                            $_SESSION['user'] = $userdetails->userName; //username in php session schreiben
                            $_SESSION['level'] = 'user';
                        } elseif ($type=='admin'){
                            if ($userdetails->userLevel=='admin'){
                                $_SESSION = array(); //Zur Sicherheit Session-Array löschen
                                $_SESSION['user'] = $userdetails->userName; //username in php session schreiben
                                $_SESSION['level'] = 'admin';
                            } else $this->errors[] = "Sie haben keine Administratoren Rechte.";
                        } else  $this->errors[] = "Unbekannter Usertyp.";
                        } else $this->errors[] = "Username oder Passwort falsch.";  //Passwort falsch      
                }
                else {
                    $this->errors[] = "Username oder Passwort falsch.";  //user existiert nicht
                }
            }
            catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
        return $this->errors;

    }

    public function doLogout()
    {
        $_SESSION = array(); //Zur Sicherheit Session-Array löschen
        session_destroy(); //Session löschen
    }
}