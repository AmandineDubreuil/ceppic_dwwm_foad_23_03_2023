<?php
/*
* Ajout d'une formation
*/
session_start();
include '../inc/fonctions.php';

(isUserLogin()) ?: redirectUrl('view/404.php');


$titre = $description = $imageUpload = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

   

endif;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajout"])) :

    $titre = cleanData($_POST['titre']);
    $imageUpload = cleanData($_POST['imageUpload']);
    $description = cleanData($_POST['description']);

        insertFormation($titre, $description, $imageUpload);

  //  redirectUrl('./adminForma/');
endif;

require '../view/adminForma/ajoutView.php';
