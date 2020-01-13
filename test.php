<?php
require_once 'constants.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1><?php echo "Hello world"; ?></h1>
  <?php
  $prenom = "Lucas";
  $age = 16;
  echo 'Je m\'appelle ' . $prenom;
  ?>

  <br />

  <?php
  if (majeur($age)) {
    echo "Je suis majeur";
  }

  require_once 'forms/newsletter.php';
  require_once 'forms/login.php';
  require_once 'forms/contact.php';
  ?>
</body>

</html>