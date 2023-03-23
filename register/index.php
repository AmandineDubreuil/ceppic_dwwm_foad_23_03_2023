<?php
/*
* Formulaire d'enregistrement d'un nouvel utilisateur
*/
session_start();

require '../inc/fonctions.php';

$nom = $email = $pwd = $errors = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    $nom = cleanData($_POST['nom']);
    $email = cleanData($_POST['email']);
    $pwd = cleanData($_POST['pwd']);

    if ($email && $pwd) :
        if (findEmail($email)) :
            $errors = 'Veuiller choisir une autre adreese email !';
        else :
            $lastIdUtilisateur = insertUtilisateur($nom, $email, $pwd);
            $_SESSION['login'] = findEmail($email)['role'];

            $_SESSION['id_utilisateur'] = $lastIdUtilisateur;
            if($role === 'admin'):
               redirectUrl('./adminForma/');
            else:
               redirectUrl();
            endif;
        endif;
    else :
        $errors = 'Votre email ou mot de passe sont incorrect !';
    endif;
endif;

require '../view/register/indexView.php';
