<?php
    require 'connexionBD.php';

    function listerCategories(){
        $res = connexionBD();
        $categories = $res->query('SELECT * FROM categorie;');

        if($categories==null){echo Vide;}

        // $rows = $categories->fetchAll();

        foreach($categories as $categorie) {
            printf("$categorie['libelle']\n");
        }
        /*
        while($categorie = $categories->fetch()){
            $libelle = $categorie['libelle'];
            ?>
            <a id="categorie"><?= $libelle ?></a>
            <?php
        } */
    }
    // close();
?>