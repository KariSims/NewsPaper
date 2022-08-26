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
            <a class="categorie" href="presentation.php?categorie=<?=$idCategorie?>"><?= $libelle ?></a>
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

                <a id="titre-article" id="titre-article" href="presentation.php?categorie=<?=$idCategorie?>&article=<?=$idArticle?>"><?= $titre ?></a>
                <p id="contenu-principal"><?= substr($contenu,0,120)?> &nbsp<a href="presentation.php?categorie=<?=$idCategorie?>&article=<?=$idArticle?>">more...</a></p>

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

                <a id="titre-article" href="presentation.php?categorie=<?=$idCategorie?>&article=<?=$idArticle?>"><?= $titre ?></a>
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

            <form class="formulaire" method="post" action="presentation.php?action=inscrit">
            <!-- <form class="formulaire" method="post" action="../auth/Traitement.php"> -->

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
                <a  href="presentation.php?connexion=inscrit"><button class="inscrire" type="submit">Inscrire</button></a>
            </div>
        <?php
    }

    public function verifyLogin($username, $pswd){
   
        $profils = $this->connexionBD()->query("SELECT * FROM profil WHERE username = "."'$username'"." AND passwd = "."'$pswd'");
        
        try{

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

                    header("Location: ../index.php");
                }
            }else{
                $this->loginForm();
            }
        }
        catch(PDOException $erreur){
            die('Erreur de connexion : '.$erreur->getMessage());
        }
    }
}
/*?>*/