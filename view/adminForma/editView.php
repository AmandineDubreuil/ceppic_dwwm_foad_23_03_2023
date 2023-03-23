



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Formation</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    
    <main>
        <h2>Modification de la formation : <?= $formation['titre'] ?> </h2>
        
        <form method="POST" action="" enctype="multipart/form-data" class="form" novalidate>
            <div>
                <label for="titre">Intitulé de la formation</label>
                <input type="titre" name="titre" id="titre" value="<?= $titre ?>" placeholder="<?= $titre ?>">
            </div>
            <div>
                <label for="description">Description</label>
<textarea name="description" id="description" placeholder="<?= $description ?>"><?= $description ?></textarea>
            </div>
            <div>
                <label for="imageUpload">Image</label>
                <input type="file" name="imageUpload" id="imageUpload" value="<?= $imageUpload ?>">
                <input type="submit" name="upload" value="Télécharger l'Image">
            </div>
            <div>
                <input type="submit" name="ajout" value="Ajouter">
                <a href="./"><button type="button">Annuler</button></a>
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul class="errors">
                        <li><?= $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </main>
    <footer>
        <p>Amandine - 2023</p>
    </footer>
</body>

</html>