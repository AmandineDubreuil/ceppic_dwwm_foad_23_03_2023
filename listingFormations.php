<?php
session_start();
/*
* Listing des formations d'un étudiant
*/
include './inc/fonctions.php';

$idUser = $_SESSION['id_user'];
$limit = 10;
$offset = 0;

showChoix($idUser);


require './view/listingFormationsView.php';
