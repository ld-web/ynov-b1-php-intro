<?php

(empty($_POST) ||
  empty($_POST['nom']) ||
  empty($_POST['prenom']) ||
  empty($_POST['email']) ||
  empty($_POST['message'])) && exit("Requête invalide");

require_once 'functions/contact.php';
$title = "Contact";
require_once 'views/layout/header.php';

?>
<div class="container mt-4">
  <?php if (insertContact($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['message'])) { ?>
    <div class="alert alert-success" role="alert">
      <h2>
        Merci <?php echo $_POST['prenom'] . ' ' . $_POST["nom"]; ?> ! Votre demande a bien été enregistrée
      </h2>
    </div>
  <?php } else { ?>
    <div class="alert alert-danger" role="alert">
      <h2>
        Une erreur est survenue lors de l'enregistrement de votre demande
      </h2>
    </div>
  <?php } ?>
</div>

<?php require_once 'views/layout/footer.php'; ?>