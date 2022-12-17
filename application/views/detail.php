<?php
  include APPPATH . 'views/fragment/header.php';
  include APPPATH . 'views/fragment/menu.php';
?>
<div class="card col-sm-8 container d-flex align-items-start justify-content-start">
  <img class="card-img-top" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/'. $gambar ?>" alt="<?= $nama ?>">
    <div class="card-body">
      <h5 class="card-title">
        <?= $nama ?>
      </h5>
      <dl>
        <dt>Harga</dt>
        <dd><?= $harga; ?></dd>
        
        <dt>Stok</dt>
        <dd><?= $stok ?></dd>
    
        <dt>Kantin</dt>
        <dd><?= $nama_kantin ?></dd>
      </dl>
    </div>
  </div>
  <a class="btn btn-warning btn-sm mb-5" href="#" onclick="history.back()">Back</a>
  
<?php
include APPPATH . 'views/fragment/footer.php'
?>