<?php
    include APPPATH . 'views/fragment/header.php';
    include APPPATH . 'views/fragment/menu.php';
?>
<h4>Makanan</h4>
<form method="get" action="<?= base_url('welcome/index') ?>">
    <div class="row mb-3">
        <input type="text" class="form-control" name="search" id="search" placeholder="Cari makanan">
    </div>
</form>
<?php
if (isset($search)) {
	echo "<p class='alert alert-success'>Hasil pencarian untuk : " . $search . "<p/>";
}
?>
<div class="row">  
    <?php
        foreach ($records as $idx => $data) {
    ?>
    <div class="col-sm-4 mb-4">
        <div class="card">
            <img id="preview" src="<?= empty($data['gambar']) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/'.$data['gambar'] ?>" alt="<?=$data['gambar']?>">
            <div class="card-body">
                <h5 class="card-title"><?= $data['nama'] ?></h5>
                <a class="btn btn-primary btn-sm" href="<?= base_url("welcome/detail/{$data['id']}")?>">Detail</a>
            </p>
            <dl>
                <dt>Harga</dt>
                <dd><?= $data['harga']?></dd>
                <dt>Stok</dt>
                <dd><?= $data['stok']?></dd>
            </dl>
        </div>
    </div>
    </div>  
        <?php
            }
        ?>
</div>
<?php
if(isset($links)) {

 echo $links;
}
?>
<?php
include APPPATH . 'views/fragment/footer.php';
?>