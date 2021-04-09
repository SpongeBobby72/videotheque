<?php
$dsn = "mysql:host=localhost;dbname=Videoclub;port=3306;charset=utf8";
$username = "eleve";
$password = "bonjour";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo '<div class="alert-danger" role="alert">
  Problème de connexion à la base de données.
</div>';
    exit;
}

$id = $_GET['id'];
$req = $dbh ->prepare("SELECT * FROM Film WHERE id = ?");
$req->execute(array($id));
$req = $req -> fetch();

if (isset($_POST['modifier'])){
    $req2 = $dbh -> prepare("SELECT * FROM fiche_film WHERE id = ?");
    $req2 -> execute(array($_GET['id']));
    if (!empty($_POST['realisateur'])){
        if ($req2->rowCount() !== 1){
            $req3 = $dbh->prepare("INSERT INTO fiche_film(id, realisateur) value (?, ?)");
            $req3 -> execute(array($_GET['id'], $_POST['realisateur']));
        }else {
            $req3 = $dbh->prepare("UPDATE fiche_film SET realisateur = ? WHERE id = ?");
            $req3-> execute(array($_POST['realisateur'], $_GET['id']));
        }
    }
    if (!empty($_POST['genre'])){
        if ($req2->rowCount() !== 1){
            $req3 = $dbh->prepare("INSERT INTO fiche_film(id, genre) value (?, ?)");
            $req3 -> execute(array($_GET['id'], $_POST['genre']));
        }else {
            $req3 = $dbh->prepare("UPDATE fiche_film SET genre = ? WHERE id = ?");
            $req3-> execute(array($_POST['genre'], $_GET['id']));
        }
    }
    if (!empty($_POST['annee'])){
        $reqannee = $dbh -> prepare("UPDATE Film SET année = ? WHERE id = ?");
        $reqannee -> execute(array($_POST['annee'], $_GET['id']));
    }
    if (!empty($_POST['synopsis'])) {
        var_dump($_POST['synopsis']);
        if ($req2->rowCount() !== 1){
            $reqsynopsis = $dbh->prepare("INSERT INTO fiche_film(id, synopsis) value (?, ?)");
            $reqsynopsis->execute(array($_GET['id'], $_POST['synopsis']));
        } else {
            $reqsynopsis = $dbh->prepare("UPDATE fiche_film SET synopsis = ? WHERE id = ?");
            $reqsynopsis->execute(array($_POST['synopsis'], $_GET['id']));
        }
    }
    if (!empty($_FILES['image'])) {
        $tailleMax = 2097152;
        if ($_FILES['image']['size'] <= $tailleMax) {
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], "."), 1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $myUploadedFile = $_FILES["image"];
                $tmpName = $myUploadedFile["tmp_name"];
                $fileName = time() . '_' . $myUploadedFile['name'];
                $resultat = move_uploaded_file($tmpName, "images/" . $fileName);
                if ($resultat) {
                    $req2 = $dbh -> prepare("SELECT * FROM fiche_film WHERE id = ?");
                    $req2 -> execute(array($_GET['id']));
                    if ($req2->rowCount() !== 1){
                        $req3 = $dbh->prepare("INSERT INTO fiche_film(id, image) value (?, ?)");
                        $req3 -> execute(array($_GET['id'], $fileName));
                    }else {
                        $req3 = $dbh->prepare("UPDATE fiche_film SET image = ? WHERE id = ?");
                        $req3->execute(array($fileName, $_GET['id']));
                    }
                } else {
                    $erreur = "Erreur durant l'importation de votre photo de profil!";
                }
            } else {
                $erreur = "La photo doit être au format jpg, jpeg, gif ou png!";
            }
        } else {
            $erreur = "La photo ne doit pas dépasser 2Mo!";
        }
    }
    header('Location: filmFiche.php?id='.$id);
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
        <li><a href="ajouterFilm.php">Ajouter film</a></li>
        <li><a href="index.php">Liste des films</a></li>
    </ul>
</header>
<div class="container">
    <div class="modifier_film">
        <h2>Modifier <br> <?php echo $req['titre'] ?></h2>
        <form method="post" enctype="multipart/form-data">
            <label for="realisateur">Realisateur: </label>
            <input type="text" name="realisateur"><br>
            <label for="annee">année: </label>
            <input type="text" name="annee"><br>
            <label for="genre">Genre: </label>
            <input type="text" name="genre"><br>
            <label id="synopsisLabel" for="synopsis">Synopsis:</label>
            <textarea name="synopsis" id="synopsis" cols="30" rows="10"></textarea><br>
            <label for="image">Image: </label>
            <input type="file" id="image" name="image"><br>
            <input type="submit" name="modifier" value="Modifier">
        </form>
    </div>
    <div class="error">
        <?php
        if (isset($erreur)){
            echo $erreur;
        }
        ?>
    </div>
</div>
</body>
</html>