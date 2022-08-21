<?php
    
    function listerCategories(){
        require 'connexionBD.php';
            $res = connexionBD();
        echo parse_str($connex);
        $categories = $res->prepare("SELECT * FROM categorie;");

        // $rows = $categories->fetchAll();

        // foreach($categories as $categorie) {
        //     printf("$categorie['libelle']\n");
        // }
        
        while($categorie = $categories->fetch()){
            $libelle = $categorie['libelle'];
            return  $libelle;
            /*?>
            <a id="categorie"><?= $libelle ?></a>
            <?php */
        }
    }

?>