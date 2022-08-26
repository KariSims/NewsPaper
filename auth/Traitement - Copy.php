<?php
session_start();

// Informations d'identification
            /*
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'id18183611_samson');
            define('DB_passwd', '%+B_4?$B7a*yUkN-');
            define('DB_NAME', 'id18183611_myspace');*/

            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_passwd', '');
            define('DB_NAME', 'mglsi_news');
            
            // Connexion à la base de données MySQL 
            $linkDb = mysqli_connect(DB_SERVER, DB_USERNAME, DB_passwd, DB_NAME);
            
            // Vérifier la connexion
            if($linkDb === false){
                $errormessageDB = "Impossible de se connecter à la base de données" ;
                die("ERREUR : Impossible de se connecter à la base. " . mysqli_connect_error());
            }

            if( (isset($_POST['username'])) && (isset($_POST['passwd'])) ){
                //Recuperation des informations
                //$mail = stripslashes($_REQUEST['username']); $mail = mysqli_real_escape_string($linkDb , $mail);
                //$passwd = stripslashes($_REQUEST['passwd']); $passwd = mysqli_real_escape_string($linkDb , $passwd);
                
                $mail = $_POST['username'] ;
                $pwd =  $_POST['passwd'] ;

                //Veriification des informations dans la base
                //var_dump($mail,$pwd );
                //$verifinfo="SELECT * FROM utilisateur WHERE username='$mail' and passwd='".hash('sha256', $pwd)."';";
                $verifinfo="SELECT * FROM profil WHERE username='$mail';";
                //print_r($verifinfo);

                $result = mysqli_query($linkDb, $verifinfo) ;
                //print_r($result);
                $rows = mysqli_num_rows($result);
                //print_r('\n champ');
                $champ = mysqli_fetch_array($result);
                //print_r($champ);
                try{
                    if (($result) && ($rows > 0)) {
                        // if (passwd_verify($pwd, $champ['passwd'])){
                        if ($pwd == $champ['passwd']){
                            //Recuperation des valeurs du tableau
                            $name = $champ['pseudoName'];
                            $passwd = $champ['passwd'];
                            $id = $champ['id'];
                            $username = $champ['username'];
                            //Recuperation des variables de session
                            $_SESSION['username'] = $name;
                            $_SESSION['mail'] = $username;
                            $_SESSION['passwd'] = $passwd;
                            $_SESSION['id'] = $id ; 

                            header("Location: ../index.php");
                        }                       
                        else{
                                $message = "Mot de passe incorrect!";
                                header("location:Login.php?erreur=$message");      
                        }
                    }
                }
                catch(Exception $err){
                    $err = "username incorrect!";
                    // die('Erreur de connexion : '.$err->getMessage());
                    header("location:presentation.php?erreur=$message");
                }
            }else{
                header("Location: enreg.htm");
             }
?> 