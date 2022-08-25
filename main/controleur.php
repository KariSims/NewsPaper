<?php

    $mesServices = new desServices;

    if(!isset($_GET['categorie'])){
        $obj->listerArticles();
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
    }
?>