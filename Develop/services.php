<?php
    include ".connexionBD.php";

class desServices extends linkDB{

    public function listerCategories(){
        
        $categories = $this->connexionBD()->query("SELECT * FROM categorie;");

        while($categorie = $categories->fetch()){
            $libelle = $categorie['libelle'];
            ?>
            <a id="categorie"><?= $libelle ?></a>
            <?php
        }
    }

    public function listerArticles(){

        $articles = $this->connexionBD()->query("SELECT * FROM article;");

        while($article = $articles->fetch()){
            $titre   = $article['titre'];
            $contenu = $article['contenu'];
            ?>

                <a id="titre-article"><?= $titre ?></a>
                <p id="contenu-principal"><?= $contenu ?></p>

            <?php
        }
    }

    public function articleParCategorie($idCategorie){

        $articles = $this->connexionBD()->query("SELECT * FROM article WHERE categorie = ".$idCategorie);

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