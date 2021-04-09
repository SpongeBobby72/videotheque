<?php
$dsn = "mysql:host=localhost;dbname=Videoclub;port=3306;charset=utf8";
$username = "eleve";
$password = "bonjour";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
  Problème de connexion à la base de données.
</div>';
    exit;
}

if (isset($_POST['ajouterFilm'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    if (!empty($title)) {
        $statement = $dbh->prepare('INSERT INTO Film (titre, année) VALUES ( ?, ?)');
        $statement->execute(array($title, $year));
        header('Location: index.php');
    }else{
        $erreur = "Titre du film obligatoire";
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <h1>Videothèque</h1>
    <ul class="navbar">
        <li><a href="#">Ajouter film</a></li>
        <li><a href="index.php">Liste des films</a></li>
    </ul>
</header>
<div class="container">

    <div class="ajouter_film">
        <form method="post">
            <H2>Ajouter un film</H2>
            <label for="title">Titre: </label>
            <input type="text" name="title"><br>
            <label for="year">Année: </label>
            <input type="text" name="year"><br>
            <input type="submit" name="ajouterFilm" value="Ajouter">
        </form>
        <div>
            <?php
            if (isset($erreur)){
                echo $erreur;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
