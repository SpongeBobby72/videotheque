<?php
//$dsn = "mysql:host=localhost;dbname=lvtx7997_videothequeKevin;port=3306;charset=utf8";
//$username = "lvtx7997_kevin";
//$password = "Gaby2105!mysql";

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