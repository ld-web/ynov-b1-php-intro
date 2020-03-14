<div class="card col-4">
  <div class="card-body">
    <h5 class="card-title">
      <?php echo $product['nom']; ?>
      <?php require 'promo.php'; ?>
    </h5>
    <p class="card-text"><?php echo $product['description']; ?></p>
  </div>
</div>