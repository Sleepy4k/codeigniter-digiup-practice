<?php
    $folder = $this->uri->segment(1);
?>
<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Katalog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="col-lg-6">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= $folder == 'welcome' || $folder == '' ? 'active' : '' ;?> " aria-current="page" href="<?= base_url()?>welcome">Home</a>
          </li>
          <?php 
            if($this->ion_auth->is_admin()) {
          ?>
          <li class="nav-item">
            <a class="nav-link <?= $folder == 'kantin' ? 'active' : '' ;?>" href="<?= base_url()?>kantin">Kantin</a>
          </li>
          <?php
            }
          ?>
          <?php 
            if($this->ion_auth->is_admin()) {
          ?>
          <li class="nav-item">
            <a class="nav-link <?= $folder == 'makanan' ? 'active' : '' ;?>" href="<?= base_url()?>makanan">Makanan</a>
          </li>
          <?php
            }
          ?>
        </ul>
      </div>
      <div class="col-lg-6 d-lg-flex justify-content-end">
        <?php
          if($this->ion_auth->logged_in()) {
        ?>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url('auth/logout') ?>">Logout</a>
            </li>
        </ul>
        <?php
          } else {
        ?>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url('auth/login') ?>">Login</a>
            </li>
        </ul>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</nav>
<body>
    <div class="container">
        <p></p>
