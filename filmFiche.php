<?php
require ('config.php');

$id = $_GET['id'];

$req = $dbh ->prepare("SELECT * FROM Film WHERE id = ?");
$req->execute(array($id));
$req = $req -> fetch();

$req2 = $dbh -> prepare("SELECT * FROM fiche_film WHERE id = ?");
$req2->execute(array($id));
$req2 = $req2 -> fetch()

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
        <li><a href="ajouterFilm.php">Ajouter film</a></li>
        <li><a href="index.php">Liste des films</a></li>
    </ul>
</header>

<div class="section_fiche">
    <h2><?php echo $req['titre']?></h2>
    <?php
    if (isset($req['année'])){
    ?>
    <p>Année: <?php echo $req['année']?></p>
    <?php
    }
    if (isset($req2['realisateur'])){
    ?>
    <p>Réalisateur: <?php echo $req2['realisateur']?></p>
    <?php
    }
    if (isset($req2['genre'])){
    ?>
    <p>Genre: <?php echo $req2['genre']?></p>
    <?php
    }
    if (isset($req2['image'])){
    ?>
    <div style="text-align: center" class="jaquette">
        <img id="jaquetteFiche" src="images/<?php echo $req2['image']?>">
    </div>
    <?php
    }
    if (isset($req2['synopsis'])) {
    ?>
    <p style="margin: 20px; text-align: justify">synopsis: <br><br> <?php echo $req2['synopsis'] ?></p>
    <?php
    }
    ?>
    <div class="modifier_fiche">
        <a style="float: right; margin: 0 30px 30px 0;" href="modifierFilm.php?id=<?php echo $req['id']?>">Modifier</a>
    </div>
</div>


</body>
</html>


