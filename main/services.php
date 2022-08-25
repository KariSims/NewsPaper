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
}
/*?>*/