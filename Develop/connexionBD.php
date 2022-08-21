<?php
    function connexionBD(){
        require_once "configBD.php";
        try{
            $connex = new PDO($host, $user, $passwd);
        }
        catch(PDOException $error){
            die('Erreur de connexion : '.$error->getMessage());
        }
    }
?>