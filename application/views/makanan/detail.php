<?php
  include APPPATH . 'views/fragment/header.php';
  include APPPATH . 'views/fragment/menu.php';
?>

<h1>Detail Kantin</h1>
<dl>
  <dt>Nama</dt>
  <dd><?= $nama; ?></dd>
  
  <dt>Harga</dt>
  <dd><?= $harga ?></dd>

  <dt>Gambar</dt>
  <dd>
    <img class="mt-2" src="<?= BASE_ASSETS . 'uploads/'. $gambar ?>" alt="" width="350">
  </dd>
  
  <dt>Stok</dt>
  <dd><?= $stok ?></dd>

  <dt>Kantin</dt>
  <dd><?= $nama_kantin ?></dd>
 
</dl>

<a class="btn btn-warning btn-sm mb-5" href="#" onclick="history.back()">Back</a>