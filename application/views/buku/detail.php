<?php
  include APPPATH . 'views/fragment/header.php';
  include APPPATH . 'views/fragment/menu.php';
?>

<h1>Detail Buku</h1>
<dl>
  <dt>Isbn</dt>
  <dd><?= $isbn; ?></dd>
  
  <dt>Judul</dt>
  <dd><?= $judul ?></dd>

  <dt>Pengarang</dt>
  <dd><?= $pengarang ?></dd>

  <dt>Tanggal Rilis</dt>
  <dd><?= date_format(date_create($tanggal_rilis), "d/m/Y") ?></dd>

  <dt>Jumlah Halaman</dt>
  <dd><?= $jumlah_halaman ?></dd>

  <dt>Sinopsis</dt>
  <dd><?= $sinopsis ?></dd>

  <dt>Gambar</dt>
  <dd>
    <img class="mt-2" src="<?= BASE_ASSETS . 'uploads/'. $gambar ?>" alt="" width="350">
  </dd>
  
  <dt>Nama Penerbit</dt>
  <dd><?= $nama_penerbit ?></dd>

  <dt>Ketersediaan</dt>
  <dd><?= $tersedia == 1 ? 'Tersedia' : 'Tidak Tersedia' ?></dd>
 
</dl>

<a class="btn btn-warning btn-sm mb-5" href="#" onclick="history.back()">Back</a>