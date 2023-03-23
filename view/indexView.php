<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>Forma - 1er sur les formations</h1>
            <p>
                <a href="">Home</a>
                <a href="./register/">Inscription</a>
                <a href="./login/">Connexion</a>
            </p>
        </nav>
    </header>
    <main>
        <div>
            <a href=""><button> Mes formations</button></a>
            <a href="./adminForma/ajout.php"><button> Ajouter une formation</button></a>
            <a href=""><button> Modifier une formation</button></a>
            <a href=""><button> supprimer une formation</button></a>
        </div>
        <section>
        <?php
        if (count(getFormationLimit($limit, $offset)) != 0) :
                foreach (getFormationLimit($limit, $offset) as $formation) : ?>
            <article>
                <h4><?= $formation['titre'] ?></h4>
                <div><img src="<?= $formation['image'] ?>" alt=""></div>
                <p><?= $formation['description'] ?></p>
                <p>créée le : <?= $formation['created_at'] ?></p>
            </article>
            <?php
                endforeach;
            else :
                echo 'Aucune formation de disponible.';
            endif;
            ?>
        </section>
    </main>
    <footer>
        <p>Amandine - 2023</p>
    </footer>
</body>

</html>