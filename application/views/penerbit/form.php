<?php
    include APPPATH . 'views/fragment/header.php';
    include APPPATH . 'views/fragment/menu.php';
?>
<h3>
    <?= validation_errors(); ?>
</h3>
<form method="post" action="<?= base_url('penerbit/save')?>">
<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
<div>
    <div>
        <h3>Tambah/Ubah Penerbit</h3>
    </div>
</div>
<div>
    <div class="mb-3">
        <label class="form-label">Nama Penerbit</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <div class="col-sm-6">
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2"><?= $alamat ?></textarea>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Telpon</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="telpon" id="telpon" value="<?= $telpon ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="email" id="email" value="<?= $email ?>">
        </div>
    </div>
    <div class="mb-3">
        <input class="btn btn-warning btn-sm" type="button" value="Cancel" onclick="history.back()">
        <input class="btn btn-primary btn-sm" type="submit" value="Simpan">
    </div>
</div>
</form>
<?php
    include APPPATH . 'views/fragment/footer.php';