<?php
    include APPPATH . 'views/fragment/header.php';
    include APPPATH . 'views/fragment/menu.php';
?>
<h3>
    <?= validation_errors(); ?>
</h3>
<form method="post" action="<?= base_url('makanan/save')?>" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
<input type="hidden" name="gambar_lama" value="<?= isset($gambar) ? $gambar : '' ?>">
<div class="mb-3">
    <label></label>
    <div>
        <h3>Tambah/Ubah Makanan</h3>
    </div>
</div>
<div>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="harga" id="harga" value="<?= $harga ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <div class="col-sm-6">
            <input class="form-control" type="file" name="gambar" id="gambar" accept="image/*" onchange="loadFile(event)">
        </div>
        <div class="mt-3">
            <img id="preview" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/'.$gambar ?>" alt="" width="350">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <div class="col-sm-6">
            <input class="form-control" type="number" name="stok" id="stok" value="<?= $stok ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Kantin</label>
        <div class="col-sm-6">
            <select class="form-select" name="id_kantin" id="id_kantin">
                <option value="" hidden="">- Silahkan pilih kantin -</option>
                <?php
                foreach ($kantins as $item) {
                    ?>
                <option <?= ($id_kantin == $item['id']) ?'selected="selected"' : ''; ?> value="<?= $item['id']?>"><?= $item['nama']?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <input class="btn btn-warning btn-sm" type="button" value="Cancel" onclick="history.back()">
        <input class="btn btn-primary btn-sm" type="submit" value="Simpan">
    </div>
</div>
</form>
<script>
var loadFile = function(event) {
	var image = document.getElementById('preview');
	image.src = URL.createObjectURL(event.target.files[0]);
}

</script>
<?php
    include APPPATH . 'views/fragment/footer.php';
