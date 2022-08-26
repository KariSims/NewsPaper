<?php
include "../.config/.connexionBD.php";
session_start();

// Informations d'identification
    $traitement = new linkDB;

    $username = $_POST['username'] ;
    $pwd =  $_POST['passwd'] ;

    $users = $traitement->connexionBD()->query("SELECT * FROM profil WHERE username = "."'$username'"." AND passwd = "."'$pwd'");

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

                header("Location: ../main/presentation.php");
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