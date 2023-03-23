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

/** téléchargement d'image */
function imageUpload($imageUpload)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["upload"])) {
        $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            // redirectUrl('./adminForma/ajout.php');
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["imageUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["imageUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function getFormationLimit(int $limit, int $offset): array
{
   require 'pdo.php';
   $sqlRequest = "SELECT id_formation, titre, description, image, created_at FROM `formations` WHERE 1 ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':limit', $limit, PDO::PARAM_INT);
   $resultat->bindValue(':offset', $offset, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetchAll();
}

function getFormationById(int $idFormation): array
{
   require 'pdo.php';
   $sqlRequest = "SELECT * FROM formations WHERE id_formation = :idFormation";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idFormation', $idFormation, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetch();
}

function updateFormation(int $id_formation, string $titre, string $description, string $image): bool
{
   require 'pdo.php';
   $requete = 'UPDATE formations SET titre = :titre, description = :description,image = :image WHERE id_formation = :id_formation';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':id_formation', $id_formation, PDO::PARAM_INT);
   $resultat->bindValue(':titre', $titre, PDO::PARAM_STR);
   $resultat->bindValue(':description', $description, PDO::PARAM_STR);
   $resultat->bindValue(':image', $image, PDO::PARAM_STR);
   $resultat->execute();
   return $resultat->execute();
}


function isGetIdValid(): bool
{
   if (isset($_GET['id']) && is_numeric($_GET['id'])):
      return true;
   else:
      return false;
   endif;
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
