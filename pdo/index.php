<?php

try { // Dans ce bloc, tout code pouvant lancer une exception
  $pdo = new PDO(
    "mysql:host=localhost;dbname=ynov_b1_pdo",
    "ynov_b1_pdo",
    "tJtyyGQCjVrKVjs7"
  );
  // Si l'instanciation de l'objet PDO échoue,
  // Alors tout code suivant cette instruction dans "try" ne sera pas exécuté.
} catch(PDOException $ex) {
  // A ce niveau-là, on récupère l'exception lancée et on gère l'erreur
  exit("Erreur lors de la connexion à la base de données");
}

var_dump($pdo);

$query = "SELECT * FROM users";
$stmt = $pdo->query($query);
var_dump($stmt);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($users);

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//   var_dump($row);
// }

// Je lis la première ligne
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($row);

// // Je lis la ligne suivante
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($row);

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  if (!isset($_POST['is_active'])) {
    $isActive = 0;
  } else {
    $isActive = 1;
  }

  //$isActive = $_POST['is_active'];

  $query = "INSERT INTO users (name, email, pass, is_active) VALUES ('$name', '$email', '$pass', $isActive)";

  $stmt = $pdo->query($query);

  if (!$stmt) {
    echo "Une erreur est survenue lors de l'enregistrement de l'utilisateur";
    var_dump($pdo->errorInfo());
  } else {
    echo "Utilisateur enregistré";
  }
}

?>

<form method="POST">
  <input type="text" name="name" id="name" placeholder="Nom..." />
  <input type="email" name="email" id="email" placeholder="Email..." />
  <input type="password" name="pass" id="pass" placeholder="Mot de passe..." />
  <input type="checkbox" name="is_active" id="is_active" />
  <input type="submit" value="Enregistrer" />
</form>