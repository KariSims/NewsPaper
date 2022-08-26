<?php

    if(!isset($_GET['categorie'])){
        $obj->listerArticles(); //l'objet instancié au niveau de presentation.php
    }
    else{
        if(isset($_GET['categorie']) & !isset($_GET['article'])){
            $idCategorie = (int) $_GET['categorie'];
            $obj->articlesParCategorie($idCategorie);
        }
        if(isset($_GET['categorie']) & isset($_GET['article'])){
            $idCategorie = (int) $_GET['categorie'];
            $idArticle   = (int) $_GET['article'];
            $obj->lireArticle($idCategorie,$idArticle);
        }
        if(isset($_GET['connexion'])=='tentative'){
            $obj->loginForm();
        }

    }
?>