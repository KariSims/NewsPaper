<?php
    include_once "connexionBD.php";

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
}
/*?>*/