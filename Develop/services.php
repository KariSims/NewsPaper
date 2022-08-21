<?php
    require 'connexionBD.php';

    function listerCategories(){
        $categories = $connex->query("SELECT * FROM categorie;");

        while($categorie = $categories->fetch()){
            $titre = $articles['titre'];
            ?>
            <a id="categorie"><?= $titre ?></a>
            <?php
        }
    }
?>