<?php
    session_start();
   // require('ConfigDb.php');

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
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" href="inscriptionStyle.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
            <title>MySpace - Inscription  </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Ala Congolaise">
            <meta name="description" content="Ceci est la page d'accueil du site de MySpace, un site pour aider 
            à trouver les informations des autres utilisateurs ">
            <meta name="generator" content="Visual Studio Code">
            <meta name="keywords" content="MySpace, Site de rencontre">     
    </head>
    <body>
        <?php
            $msg="message transparent";

            if( (isset($_POST['email'])) && (isset($_POST['Mdp'])) && (isset($_POST['Mdp2'])) && (isset($_POST['nom'])) && (isset($_POST['Prenom'])) ){
                //Recuperation des informations
                $mail = $_POST['email'] ;
                $pwd = $_POST['Mdp'] ;
                $pwd2 =  $_POST['Mdp2'] ;
                $nom = strtoupper($_POST['nom']) ;
                $Prenom = ucwords($_POST['Prenom']) ;
                $tel=  $_POST['tel'] ;
                
                $compttel = 0;
                $longueur2=strlen($tel);

                for($j=0;$j<$longueur2;$j++){
                    $caractere2=substr($tel,$j,1);
                    if((ord($caractere2) < 48) || (ord($caractere2) > 57)){
                        $compttel =$compttel + 1;
                    }
                }
                if ($compttel > 0){
                    $messageresult ="Le téléphone ne doit contenir que des chiffres";
                }else{
                    if ( $pwd == $pwd2 ){
                    //requête SQL + mot de passe securisé et crypté ("utilisateur")
                        $comptpwd = 0;
                        $longueur1=strlen($pwd);
                        
                        for($i=0;$i<$longueur1;$i++){
                            $caractere1=substr($pwd,$i,1);
                            if((ord($caractere1) >31) && (ord($caractere1) < 97)){
                                $comptpwd =$comptpwd + 1;
                            }
                        }
                    
                        if($comptpwd == 0){
                            $messageresult ="Format du mot de passé non respecté";
                        }else{                
                            $verifmail = "SELECT email from utilisateur;";
                            $resultmail = mysqli_query($linkDb, $verifmail);      // Exécuter la requête sur la base de données
                            $champmail = mysqli_fetch_array($resultmail);
                            if(in_array($mail,$champmail)){
                                $messageresult = "Le mail saisi est déjà utilisé, veuillez trouver un autre!" ;
                            }else{
                                $insertrens = "INSERT into utilisateur (nom,prenom,email,MotDePasse,telephone) VALUES ('$nom', '$Prenom','$mail', '".password_hash($_POST['Mdp'],PASSWORD_DEFAULT)."','$tel');";               
                                $resultI = mysqli_query($linkDb, $insertrens);  // Exécuter la requête sur la base de données
                                echo $resultI;
                                if($resultI){
                                    $messageresult = "Vous êtes inscrit avec succès!" ;
                                }else{
                                    $messageresult = "Echec inscription, Le mail saisi est déjà utilisé"  ;
                                }
                            }
                        }
                    }else{
                        $messageresult = "Le mot de passe saisi n'est pas identique";
                    }
                }
            }else{
                $messageresult = "";
            }                    
        ?>
        <!-- ---->
        <div class="entete"> 
            <header>
                    <div class="logo">
                       <!-- <img src="/images/logo_principale.png" alt="Logo de Ala congolaise" title="Logo d'Ala congolaise" id="logoprinc"/> ---->
                    </div>
            </header>
            <section>
                    <div class="formulaire">
                        <form class="formulaireI" method="post" action="">
                            <h1><i class="fas fa-handshake"></i> Inscription à MySpace <i class="far fa-handshake"></i></h1>
                                <div class="inputs">
                                    <input type="text" name="nom" id="nom" placeholder="Saisir votre nom" minlength="3" required />
                                    <input type="text" name="Prenom" id="Prenom" placeholder="Saisir votre prénom"minlength="3"required />
                                    <input type="email" name="email" id="email" placeholder="Saisir Votre email" size="40" minlength="9"  maxlength="50" required/>
                                    <input type="tel" name="tel" id="tel" required minlength="9"  maxlength="10" placeholder="Votre numero de telephone Ex : 7754585475"/>   
                                    <input type="password" name="Mdp" id="Mdp" placeholder="Saisir votre mot de passe" minlength="8" required/>
                                    <p class="warning">Un caractère spécial, une lettre majuscule ou un chiffre est réquis*</p>
                                    <input type="password" name="Mdp2" id="Mdp2" minlength="8" required placeholder="Confirmer votre mot de passe"/>
                                   
                                </div>
                                <span class ="invisible">
                                <?php if (empty($messageresult)) { ?>
                                    <p class="error-Msg1"><?php echo $msg; }  else  ?> </p>
                                    <p class="error-Msg2"><?php echo  $messageresult;  ?> </p>
                                </span>

                                <?php  if (!empty($errormessageDB)){ ?><p class="error-Msg"><?php echo $errormessageDB; ?> </p><?php } ?>
                                <div align="center">
                                    <button class="inscrire" type="submit">S'inscrire</button>
                                    <p class="connect">Cliquez sur <span>Connexion</span>, pour vous connecter!</p>
                                </div>
                        </form>
                        <a href='Login.php'><button class="connecter" type="submit">Connexion</button></a>
                    </div>
            </section>
         </div>
    </body>
</html>