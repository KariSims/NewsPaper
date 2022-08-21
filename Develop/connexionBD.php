<?php
    // $connex = null;
    function connexionBD(){
        // open();
        require "configBD.php";
        try{
            $connex = new PDO($host, $user, $passwd);
        }
        catch(Exception $error){
            die('Erreur de connexion : '.$error->getMessage());
        }
    }
?>