<?php
$title = "Les produits";
require_once 'views/layout/header.php';
require_once 'functions/products.php';

$products = getProducts();
?>

<div class="container mt-4">
  <div class="row">
    <?php
    foreach ($products as $product) {
      require 'views/product/item.php';
    }
    ?>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>