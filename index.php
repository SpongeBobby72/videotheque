<?php
require ('config.php');

$req = $dbh ->prepare("SELECT * FROM Film ORDER BY titre ASC");
$req->execute();
$req = $req -> fetchAll();

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
    <h1>VIDEOCLUB</h1>
    <ul class="navbar">
        <li><a href="ajouterFilm.php">Ajouter film</a></li>
        <li><a href="#">Liste des films</a></li>
    </ul>
</header>
<div class="container">
    <div class="section_film">
        <?php
        foreach ($req as $film){
        ?>
          <div class="filmList">
          <h3><a href="filmFiche.php?id=<?php echo $film['id']?>"><?php echo $film['titre']?></a></h3>
          <?php
          if (isset($film['année'])) {
          ?>
                <p><?php echo $film['année']?></p>
          <?php
          }
          ?>
          </div>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>
