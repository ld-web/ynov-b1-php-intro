<?php

// if (empty($_POST)) {
//   exit("Requête invalide");
// }
// Evaluation d'expressions :
// On a A (empty($_POST)) et B (exit(...)).
// Si A est vraie, alors je vais évaluer B pour déterminer si l'expression globale est vraie.
// Si A est fausse, alors je n'ai pas besoin d'évaluer B car il me faut les 2 expressions vraies pour valider l'expression globale.
// Donc : Si notre tableau superglobal $_POST est vide, on arrête l'exécution du script.
empty($_POST) && exit("Requête invalide");

require_once 'layout/header.php';
?>

<div>
  <h2>
    Merci <?php echo $_POST['prenom'] . ' ' . $_POST["nom"]; ?> !
  </h2>
</div>

<?php require_once 'layout/footer.php'; ?>