<?php
    include 'services.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Informations en continue</title>
        <meta http-equiv="X-UA-Compatible" charset="utf-8"/>
        <link rel="stylesheet" href="presentation.css" type="text/css"/>
        <script src="presentation.js" type="text/javascript"></script>
    </head>
    <body onload="">
        <header class="en-tete">
            <div id="logo"></div>
            <div id="recherche"></div>
            <div id="onglets">
                <a class="onglet" href="presentation.php"><b>Accueil</b></a>
                <a class="onglet"><b>Developpeurs</b></a>
                <a class="onglet" href="presentation.php?connexion=tentative"><b>connexion</b></a>
            </div>
        </header>
        <div id="titre-principal">LE SITE OFFICIEL D'INFORMATIONS</div>
        <main>
            
            <aside id="col-3" class="categories">
                <div class="titre-categorie">Toutes les Catégories</div>

                    <?php
                        $obj = new desServices;
                        $obj->listerCategories();
                    ?>
            </aside>
            <section id="col-9">
                <?php
                    if(isset($_GET['connexion'])=='tentative'){
                        $obj->login();
                    }
                    else{
                        include 'controleur.php';
                    }
                ?>
            </section>
        </main>
    <footer><b>&copy; Copyright <?= date('Y')?> - DIT2</b>&nbsp ~~~ &nbsp<span class="contact"><a id="mail" href="mailto:samsonmww@gmail.com">&nbsp Nous contacter</a></span></footer>
    </body>


</html>