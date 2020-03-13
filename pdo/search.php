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
?>

<form method="get">
  <input type="text" name="s" id="" placeholder="Recherche..." />
  <input type="submit" value="Rechercher" />
</form>

<?php

if (isset($_GET['s'])) {
  $search = $_GET['s'];

  // Requête non préparée
  // Vulnérable aux injections SQL :
  // test'; DELETE FROM users;#
  // $query = "select * FROM users where name LIKE '%$search%'";
  // $stmt = $pdo->query($query);

  // Requête préparée
  $query = "select * FROM users where name LIKE :search";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['search' => "%$search%"]);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  var_dump($results);
}
