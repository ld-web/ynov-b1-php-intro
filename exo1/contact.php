<?php require_once 'layout/header.php'; ?>

<!-- CONTENU -->
<form action="contact_process.php" method="post">
  <p>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" />
  </p>
  <p>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" />
  </p>
  <p>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" />
  </p>

  <label for="message">Message :</label>
  <textarea name="message" id="message" cols="30" rows="10"></textarea>

  <p>
    <input type="submit" value="Envoyer" />
  </p>

</form>
<!-- FIN CONTENU -->

<?php require_once 'layout/footer.php'; ?>