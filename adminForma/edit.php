<?php
/*
* Mise à jour d'une formation
*/
include '../inc/fonctions.php';

(isGetIdValid()) ? $id = $_GET['id'] : error404();

$titreDb = getArticleById($id)['titre'];
$contenuDb = getArticleById($id)['contenu'];
$imageUrlDb = getArticleById($id)['image_url'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $titre = cleanData($_POST['titre']);
    $contenu = cleanData($_POST['contenu']);
    $image_url = cleanData($_POST['image_url']);

    updateArticle($id, $titre, $contenu, $image_url);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminBlog/editView.php';
