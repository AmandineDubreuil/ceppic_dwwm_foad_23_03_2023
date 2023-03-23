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
            <h1>Admin formations</h1>
            <p>
                <a href="../index.php">Formations</a>
                <a href="ajout.php">Ajouter une formation</a>
            </p>
        </nav>
    </header>
    <main>
        <section>
            <?php 
            if (count(getFormationLimit($limit, $offset)) != 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php //dd(getArticleLimit($limit, $offset)) 
                        ?>
                        <?php foreach (getFormationLimit($limit, $offset) as $key => $value) : ?>
                            <tr>
                                <td><?= $value['id_formation'] ?></td>
                                <td><?= $value['titre'] ?></td>
                                <td><?= $value['created_at'] ?></td>
                                <td>
                                    <a href="./edit.php?id=<?= $value['id_formation'] ?>" role="button">Modifier</a>
                                    <a href="./supp.php?id=<?= $value['id_formation'] ?>" role="button" onclick="return confirm('Confirmer la suppression de cet article ?');">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucune Formation !</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>Amandine - 2023</p>
    </footer>
</body>

</html>