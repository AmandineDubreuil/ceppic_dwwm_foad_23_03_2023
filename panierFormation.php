<?php
session_start();
/*
* Ajout d'une formation dans le panier d'un étudiant
*/
include './inc/fonctions.php';

$idFormation = $_GET['id'];
$idUser = $_SESSION['id_user'];

if (insertChoix($idFormation, $idUser )) :
   header('Location: ./index.php');
   exit();
else :
   exit('Une Erreur s\'est produite !');
endif;
