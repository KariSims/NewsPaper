<?php
    include 'services.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="presentation.css" type="text/css"/>
        <script src="presentation.js" type="text/javascript"></script>
    </head>
    <body onload="">
        <header class="en-tete">
            <div id="logo"></div>
            <div id="recherche"></div>
            <div id="onglets">
                <a class="onglet"><b>Accueil</b></a>
                <a class="onglet"><b>Contacts</b></a>
                <a class="onglet"><b>Developpeurs</b></a>
                <a class="onglet"><b>connexion</b></a>
            </div>
        </header>
        <div id="titre-principal">LE SITE OFFICIEL D'INFORMATIONS</div>
        <main>
            
            <aside id="col-3" class="categories">
                <div class="titre-categorie">Toutes les Catégories</div>
                <div class="categorie">
                    <?php
                        $obj = new desServices;
                        $obj->listerCategories();
                    ?>
                </div>
            </aside>
            <section id="col-9">
                <?php
                    // $obj = new desServices;
                    $obj->listerArticles();
                ?>
            </section>
        </main>
    <footer><b>&copy; Copyright <?= date('Y')?> - DIT2</b></footer>
    </body>


</html>