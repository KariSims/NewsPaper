<?php
    include "../.config/.connexionBD.php";

class desServices extends linkDB{

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

    public function login(){
        $msg="*" ;
        ?>
            <form class="formulaireC" method="post" action="Traitement.php">

            <h1>Connexion à Votre Espace Personnel</h1>
            
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
        <?php
    }
}
/*?>*/