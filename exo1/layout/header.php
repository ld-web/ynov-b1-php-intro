<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <header>
    <!-- NAVIGATION -->
    <?php
    // Quelque soit le fichier d'origine incluant header.php,
    // on veut inclure nav.php relativement à header.php
    // et non au fichier d'origine.
    // On peut donc désigner le répertoire de header.php
    // avec la constante __DIR__,
    // pour avoir toujours le même chemin relatif
    require_once __DIR__ . '/nav.php';
    ?>
    <!-- FIN NAVIGATION -->
  </header>