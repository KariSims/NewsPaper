<?php
    include "../.config/.connexionBD.php";

class desServices extends linkDB{

    // private function requeterUneFois(){

    // }

    public function listerCategories(){
        
        $categories = $this->connexionBD()->query("SELECT * FROM categorie;");

        while($categorie = $categories->fetch()){
            $idCategorie = $categorie['id'];
            $libelle = $categorie['libelle'];
            ?>
            <a class="categorie" href="index.php?categorie=<?=$idCategorie?>"><?= $libelle ?></a>
            <?php
        }
    }

    public function listerArticles(){

        $articles = $this->connexionBD()->query("SELECT * FROM article;");

        while($article   = $articles->fetch()){
            $idArticle   = $article['id'];
            $titre       = $article['titre'];
            $contenu     = $article['contenu'];
            $idCategorie = $article['categorie'];
            ?>

                <a id="titre-article" id="titre-article" href="index.php?categorie=<?=$idCategorie?>&article=<?=$idArticle?>"><?= $titre ?></a>
                <p id="contenu-principal"><?= substr($contenu,0,120)?> &nbsp<a href="index.php?categorie=<?=$idCategorie?>&article=<?=$idArticle?>">more...</a></p>

            <?php
        }
    }

    public function articlesParCategorie($idCategorie){

        $articles = $this->connexionBD()->query("SELECT * FROM article WHERE categorie = ".$idCategorie);

        while($article = $articles->fetch()){
            $idArticle = $article['id'];
            $titre     = $article['titre'];
            $contenu   = $article['contenu'];
            ?>

                <a id="titre-article" href="index.php?categorie=<?=$idCategorie?>&article=<?=$idArticle?>"><?= $titre ?></a>
                <p id="contenu-principal"><?= $contenu ?></p>

            <?php
        }
    }

    public function lireArticle($idCategorie,$idArticle){

        $articles = $this->connexionBD()->query("SELECT * FROM article WHERE categorie = ".$idCategorie." AND id= ".$idArticle);

        while($article = $articles->fetch()){
            $titre   = $article['titre'];
            $contenu = $article['contenu'];
            ?>

                <a id="titre-article"><?= $titre ?></a>
                <p id="contenu-principal"><?= $contenu ?></p>

            <?php
        }
    }

    public function loginForm(){
        $msg="*" ;
        ?>
        <link rel="stylesheet" href="../.style/connexion.css" type="text/css"/>

            <form class="formulaire" method="post" action="index.php?action=inscrit">

            <h1>Connexion à Votre Espace Personnel</h1>
            
            <p class="choose-email">en utilisant vos identifiants d'Editeur ou d'Admin</p>
            
            <div class="inputs">
                    <input type="email" name="username" id="email" placeholder="Exemple Email : name@mail.com" size="40" maxlength="50" required />
                    <input type="password" name="passwd" id="password" placeholder="Mot de passe" required />
            </div>
                    <?php if (isset($_GET['erreur'])){ ?>
                        
                         <p class="error-Msgdb1"><?php echo $_GET['erreur'];} else ?> </p>
                         <p class="error-Msgdb2"> <?php echo $msg;  ?></p>

                    <?php if (!empty($errormessageDB)){?> <p class="error-Msgdb"><?php echo $errormessageDB; ?> </p><?php } ?>
                    
            <div align="center">
                <button class="connecter" type="submit">Se connecter</button>
            </div>
                <p class="inscription">Cliquez sur <span>Inscrire</span> afin de créér un compte pour Inscrire un membre</p>        
            </form>
            <div align="center">
                <a  href="index.php?form=noninscrit"><button class="inscrire" type="submit">Inscrire</button></a>
            </div>
        <?php
    }
    public function inscriptionForm(){
        $msg="message transparent";
        $messageresult="message transparent";
        ?>

        <link rel="stylesheet" href="../.style/inscription.css" type="text/css"/>


            <form class="formulaire" method="post" action="">
                <h1><i class="fas fa-handshake"></i> Inscription d'un nouveau membre <i class="far fa-handshake"></i></h1>
                    <div class="inputs">
                        <input type="text" name="nom" id="nom" placeholder="Saisir le pseudo" minlength="3" required />
                        <input type="email" name="email" id="email" placeholder="Saisir l'email" size="40" minlength="9"  maxlength="50" required/>
                        <select name="privilege" id="tel"  placeholder="le niveau de privilege de l'inscrit(e)" required>
                            <option value=2>Editeur</option>
                            <option value=1>Admin</option>
                        </select>
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
                    <a href="index.php?connexion=tentative" class="connecter" >Connexion</a>
            </form>
        <?php
    }

    public function verifyLogin($username, $pswd){
   
        try{
            $profils = $this->connexionBD()->query("SELECT * FROM profil WHERE username = "."'$username'"." AND passwd = "."'$pswd'");

            if($user = $profils->fetch()){

                if($user['username']==$username && $user['passwd']==$pswd){

                    $name     = $user['pseudoName'];
                    $pwd      = $user['passwd'];
                    $id       = $user['id'];
                    $username = $user['username'];
                    //Recuperation des variables de session
                    $_SESSION['username'] = $name;
                    $_SESSION['mail']     = $username;
                    $_SESSION['passwd']   = $pwd;
                    $_SESSION['id']       = $id ;

                    header("Location: index.php");
                }
            }else{
                $this->loginForm();
            }
        }
        catch(PDOException $erreur){
            die('Erreur de connexion : '.$erreur->getMessage());
        }
    }

    public function compare2password($pwd, $pwd2){

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
            }
        }else{
            $messageresult = "Le mot de passe saisi n'est pas identique";
        }
    }

    public function inscription($pseudo,$usname,$pwd,$priv){

        $exist = 0;
        $Mails = $this->connexionBD()->query("SELECT * FROM profil;");
        
        foreach($mailExist = $Mails->fetch()){
            if($pwd==$mailExist['passwd']){
                $exist = $exist+1;
                $messageresult = "Le mail saisi est déjà utilisé, veuillez trouver un autre!" ;
            }
        }
        if($exist=0){
            try{
                $inscription = $this->connexionBD()->query("INSERT INTO profil VALUES (0,'$pseudo','$usname','$pwd','$priv');");
            }catch(PDOException $erreur){
                die('Erreur de connexion : '.$erreur->getMessage());
            }

        }
    }
}
/*?>*/