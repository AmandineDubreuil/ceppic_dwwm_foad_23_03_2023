<?php
/*
* Mise à jour d'une formation
*/
include '../inc/fonctions.php';

(isGetIdValid()) ? $id = $_GET['id'] : error404();

$titre = getFormationById($id)['titre'];
$description = getFormationById($id)['description'];
$image = getFormationById($id)['image'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $titre = cleanData($_POST['titre']);
    $description = cleanData($_POST['description']);
    $image = cleanData($_POST['image']);

    updateFormation($id, $titre, $description, $image);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminForma/editView.php';
