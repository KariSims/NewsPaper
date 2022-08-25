<?php
    session_start();  
    //require('ConfigDb.php');

    // Informations d'identification
/*
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'id18183611_samson');
        define('DB_PASSWORD', '%+B_4?$B7a*yUkN-');
        define('DB_NAME', 'id18183611_myspace'); */

        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'mglsi_news');
        
        // Connexion à la base de données MySQL 
        $linkDb = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        // Vérifier la connexion
        if($linkDb === false){
            $errormessageDB = "Impossible de se connecter à la base de données" ;
            die("ERREUR : Impossible de se connecter à la base. " . mysqli_connect_error());
        }
        $msg="*" ; 
                                    
    ?> 

<!DOCTYPE html>
<html lang="fr">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" href="loginStyle.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
            <title>MySpace - Connexion   </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="MySpace">
            <meta name="description" content="Ceci est la page d'accueil du site de MySpace, un site pour aider 
            à trouver les informations des autres utilisateurs ">
            <meta name="generator" content="Visual Studio Code">
            <meta name="keywords" content="MySpace, Site de rencontre">    
    </head>
<body>

<div class="entete">
    <div id="entete_principale">
            <h2><i class="fas fa-handshake"></i> MySpace <i class="far fa-handshake"></i> </h2>
    </div>
    <div class="formulaire">
        <form class="formulaireC" method="post" action="Traitement.php">
            <div class="social-media">
                <a href="https://www.gmail.com/"><p><i class="fab fa-google"></i></p></a>
                <a href="https://www.youtube.com/"><p><i class="fab fa-youtube"></i></p></a>
                <a href="https://www.facebook.com/"><p><i class="fab fa-facebook-f"></i></p></a>
                <a href="https://www.twitter.com/"><p><i class="fab fa-twitter"></i></p></a>
                <a href="https://www.instagram.com/"><p><i class="fab fa-instagram"></i></p></a>
                <a href="https://www.linkedin.com/"><p><i class="fab fa-linkedin-in"></i></p></a>
            </div>
            <h1>Connexion à MySpace</h1>
            
            <p class="choose-email">en utilisant mes identifiants</p>
            
            <div class="inputs">
                    <input type="email" name="email" id="email" placeholder="Email Exemple : name@mail.com" size="40" maxlength="50" required />
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required />
            </div>
                    <?php if (isset($_GET['erreur'])){ ?>
                         <p class="error-Msgdb1"><?php echo $_GET['erreur'];} else ?> </p>
                         <p class="error-Msgdb2"> <?php echo $msg;  ?></p>

                    <?php if (!empty($errormessageDB)){?> <p class="error-Msgdb"><?php echo $errormessageDB; ?> </p><?php } ?>
                    
            <div align="center">
                <button class="connecter" type="submit">Se connecter</button>
            </div>
                <p class="inscription">Cliquez sur <span>S'inscrire</span> pour créér un compte</p>        
        </form>
        <div align="center">
            <a  href="Inscription.php"><button class="inscrire" type="submit">S'inscrire</button></a>
        </div>
    </div>
</div>
 <!----> 
    <footer>
                <p class="copyright">Tous droits reservés à Samson</p>
    </footer>
    
</body>
</html>