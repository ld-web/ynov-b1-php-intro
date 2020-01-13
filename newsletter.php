<?php
echo "Je suis le fichier d'enregistrement de la newsletter<br />";

if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
  echo $_GET['email'];
} else {
  echo "L'email est obligatoire, si vous l'avez renseigné, merci de vérifier son format.";
}
