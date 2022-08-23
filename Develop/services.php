<?php
    include "connexionBD.php";

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

                <h2 id="titre-article"><?= $titre ?></h2>
                <p id="contenu-principal"><?= $contenu ?></p>

            <?php
        }
    }
}
/*?>*/