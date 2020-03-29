<?php

require_once 'constants.php';

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

$destination_folder = __DIR__ . USER_IMG_DIR;

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  if (!isset($_POST['is_active'])) {
    $isActive = 0;
  } else {
    $isActive = 1;
  }

  $profilePic = "null"; // initialisation de la variable pour l'insertion
  if (isset($_FILES['profile_pic']) && // est-ce qu'on a bien le fichier ?
      $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK && // le code d'erreur est-il ok ?
      move_uploaded_file($_FILES['profile_pic']['tmp_name'], $destination_folder . $_FILES['profile_pic']['name'])) { // le déplacement du fichier est-il ok ?
    $profilePic = $_FILES['profile_pic']['name']; // Alors on va pouvoir insérer notre photo de profil
  }

  // Gardez en tête qu'une requête préparée est recommandée ici !
  $query = "INSERT INTO users (name, email, pass, is_active, profilePic) VALUES ('$name', '$email', '$pass', $isActive, '$profilePic')";

  $stmt = $pdo->query($query);

  if (!$stmt) {
    // Je collecte l'erreur
    $err = $pdo->errorInfo();
    // J'affiche le message contenu dans l'erreur
    echo "Une erreur est survenue lors de l'enregistrement de l'utilisateur : " . $err[2];
  } else {
    echo "Utilisateur enregistré";
  }
}

?>

<form method="POST" enctype="multipart/form-data">
  <input type="text" name="name" id="name" placeholder="Nom..." />
  <input type="email" name="email" id="email" placeholder="Email..." />
  <input type="password" name="pass" id="pass" placeholder="Mot de passe..." />
  <label for="is_active">Actif</label>
  <input type="checkbox" name="is_active" id="is_active" />
  <input type="file" name="profile_pic" />
  <input type="submit" value="Enregistrer" />
</form>