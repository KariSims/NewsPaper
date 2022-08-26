<?php
include "../.config/.connexionBD.php";
session_start();

// Informations d'identification
    $traitement = new linkDB;

    $username = $_POST['username'] ;
    $pwd =  $_POST['passwd'] ;
    // echo $username."'$username'";

    // $users = $traitement->connexionBD()->query("SELECT id FROM profil WHERE username = "."'$username'");
    // while($user = $users->fetch()){
    //     echo $user['id'];
    // }
    $users = $traitement->connexionBD()->query("SELECT * FROM profil WHERE username = "."'$username'");

        if($user = $users->fetch()){
            if($user['username']==$username && $user['passwd']==$pwd){

                $name = $user['pseudoName'];
                $pwd = $user['passwd'];
                $id = $user['id'];
                $username = $user['username'];
                //Recuperation des variables de session
                $_SESSION['username'] = $name;
                $_SESSION['mail'] = $username;
                $_SESSION['passwd'] = $pwd;
                $_SESSION['id'] = $id ;

                header("Location: presentation.php");
            }
            else{
                $message = "Identifiants incorrects!";
                header("location:index.php?erreur=$message");
            }
        }
        else{
            $message = "Identifiants incorrects!";
            header("location:enreg.htm?erreur=$message");
        }
?> 