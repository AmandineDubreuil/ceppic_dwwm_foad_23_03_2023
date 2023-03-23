<?php

//echo 'test';

function dbug($valeur)
{
    echo "<pre style='background-color:black;color:white;padding: 15px;overflow:auto;height:300px;'>";
    var_dump($valeur);
    echo "</pre>";
}


function dd($valeur)
{
    echo "<pre style='background-color:black;color:white;padding: 15px;overflow:auto;height:300px;'>";
    var_dump($valeur);
    echo "</pre>";
    die();
}

/** pour bdd user */

function cleanData($valeur)
{
    if (!empty($valeur) && isset($valeur)) :
        $valeur = strip_tags(trim($valeur));
        return $valeur;
    else :
        return false;
    endif;
}

function findEmail(string $email): array|bool
{
    require 'pdo.php';

    $requete = 'SELECT * FROM users where email = :email';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
    $resultat->execute();
    return $resultat->fetch();
}

function insertUtilisateur(string $nom, string $email, string $pwd): int
{
    require 'pdo.php';
    $pwdHashe = password_hash($pwd, PASSWORD_DEFAULT);

    $requete = 'INSERT INTO users (nom,email,pwd) VALUES (:nom, :email, :pwd)';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':nom', $nom, PDO::PARAM_STR);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
    $resultat->bindValue(':pwd', $pwdHashe, PDO::PARAM_STR);
    $resultat->execute();
    return $conn->lastInsertId();
}

function isUserLogin(): bool
{
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) :
        return true;
    else :
        return false;
    endif;
}

/** pour BDD formations */

function insertFormation(string $titre, string $description, string $imageUpload): int
{
    require 'pdo.php';
    $requete = 'INSERT INTO formations (titre,description,image) VALUES (:titre, :description, :image)';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':titre', $titre, PDO::PARAM_STR);
    $resultat->bindValue(':description', $description, PDO::PARAM_STR);
    $resultat->bindValue(':image', $imageUpload, PDO::PARAM_STR);
    $resultat->execute();
    return $conn->lastInsertId();
}



/* général */
function redirectUrl(string $path = ''): void
{
    $homeUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/FOAD/20230323_Forma';
    $homeUrl .= '/' . $path;
    header("Location: {$homeUrl}");
    exit();
}
function error404(): void
{
    http_response_code(404);
    include('../view/404.php');
    die();
}
