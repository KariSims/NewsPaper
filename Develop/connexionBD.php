<?php
    require "configBD.php";

    function connexionBD(){
        try{
            $connex = new PDO($user, $host, $passwd);
        }
        catch(Exception $error){
            die('Erreur de connexion : '.$error->getMessage());
        }
    }
?> 