$dsn = "mysql:host=localhost;dbname=dbname;port=3306;charset=utf8";
$username = "username";
$password = "password";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
  Problème de connexion à la base de données.
</div>';
    exit;
}