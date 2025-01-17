<?php
/*
 * Formulaire de connexion
 */
session_start();
include '../inc/fonctions.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $email = cleanData($_POST['email']);
    $pwd = cleanData($_POST['pwd']);

    if ($email) :
        if (findEmail($email)) :
            if (password_verify($pwd, findEmail($email)['pwd'])) :
                $_SESSION['login'] = findEmail($email)['role'];
                $_SESSION['id_user'] = findEmail($email)['id_user'];
                $_SESSION['role'] = findEmail($email)['role'];

                if (findEmail($email)['role'] === 'admin') :
                   redirectUrl('adminForma/');
                endif;

                redirectUrl();
            else :
                $errors[] = 'Le mot de passe est non valide.';
            endif;
        else :
            echo 'Votre email n\'est pas enregistré comme utilisateur de notre site.<br>';
            echo 'Veuillez vous enregister avec <a href="../register">ce formulaire</a>';
            exit();
        endif;

    else :
        $errors[] = 'Votre email est manquant ou incorrect !';
    endif;

endif;

require '../view/login/indexView.php';
