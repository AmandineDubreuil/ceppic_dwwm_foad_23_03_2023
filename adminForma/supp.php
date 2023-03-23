<?php
/*
* Suppression d'une formation
*/
include '../inc/fonctions.php';

$id = $_GET['id'];

if (suppFormationById($id)) :
   header('Location: ./index.php');
   exit();
else :
   exit('Une Erreur s\'est produite !');
endif;
