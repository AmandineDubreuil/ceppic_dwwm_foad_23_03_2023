<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations choisies</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <h1>formations choisies</h1>
            <p>
                <a href="./index.php">Home</a>
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
                            <th>Titre</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        ?>
                        <?php foreach (showChoix($idUser) as $key => $value) : ?>

                            <tr>
                                <td><?= $value['formation_id'] ?></td>
                                <td><?= $value['titre'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucune Formation enregistrée !</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>Amandine - 2023</p>
    </footer>
</body>

</html>