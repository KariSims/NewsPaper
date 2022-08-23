<?php
session_start();

// Informations d'identification
            /*
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'id18183611_samson');
            define('DB_PASSWORD', '%+B_4?$B7a*yUkN-');
            define('DB_NAME', 'id18183611_myspace');*/

            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_NAME', 'myspacedb');
            
            // Connexion à la base de données MySQL 
            $linkDb = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            
            // Vérifier la connexion
            if($linkDb === false){
                $errormessageDB = "Impossible de se connecter à la base de données" ;
                die("ERREUR : Impossible de se connecter à la base. " . mysqli_connect_error());
            }

            if( (isset($_POST['email'])) && (isset($_POST['password'])) ){
                //Recuperation des informations
                //$mail = stripslashes($_REQUEST['email']); $mail = mysqli_real_escape_string($linkDb , $mail);
                //$password = stripslashes($_REQUEST['password']); $password = mysqli_real_escape_string($linkDb , $password);
                
                $mail = $_POST['email'] ; $pwd =  $_POST['password'] ;

                //Veriification des informations dans la base
                //var_dump($mail,$pwd );
                //$verifinfo="SELECT * FROM utilisateur WHERE email='$mail' and MotDePasse='".hash('sha256', $pwd)."';";
                $verifinfo="SELECT * FROM utilisateur WHERE email='$mail';";
                //print_r($verifinfo);

                $result = mysqli_query($linkDb, $verifinfo) ;
                //print_r($result);
                $rows = mysqli_num_rows($result);
                //print_r('\n champ');
                $champ = mysqli_fetch_array($result);
                //print_r($champ);
                if (($result) && ($rows > 0)) {
                    if (password_verify($pwd, $champ['MotDePasse'])){
                        //Recuperation des valeurs du tableau
                        $name = $champ['nom'];
                        $prename = $champ['prenom'];
                        $telephone = $champ['telephone'];
                        $passwd = $champ['MotDePasse'];
                        $id = $champ['IdUser'];
                        $username = $prename." ".$name;
                        //Recuperation des variables de session
                        $_SESSION['username'] = $username;
                        $_SESSION['mail'] = $mail;
                        $_SESSION['nom'] = $name;
                        $_SESSION['prenom'] = $prename;
                        $_SESSION['telephone'] = $telephone;
                        $_SESSION['motdepasse'] = $passwd;
                        $_SESSION['id'] = $id ; 

                        header("Location: ../index.php");
                    }                       
                    else{
                            $message = "Mot de passe incorrect!";
                            header("location:Login.php?erreur=$message");      
                    }
                }else{
                    $message = "Email incorrect!";
                    header("location:Login.php?erreur=$message");
                }
            }else{
                header("Location: Login.php");
             }
?> 