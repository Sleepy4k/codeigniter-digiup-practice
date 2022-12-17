<?php
  include APPPATH . 'views/fragment/header.php';
  include APPPATH . 'views/fragment/menu.php';
?>

<h1>Detail Kantin</h1>
<dl>
  <dt>Nama Penerbit</dt>
  <dd><?= $nama ?></dd>

  <dt>Telpon</dt>
  <dd><?= $telpon ?></dd>

</dl>

<a class="btn btn-warning btn-sm" href="#" onclick="history.back()">Back</a>