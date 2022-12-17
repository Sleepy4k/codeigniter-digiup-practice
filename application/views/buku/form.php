<?php
    include APPPATH . 'views/fragment/header.php';
    include APPPATH . 'views/fragment/menu.php';
?>
<h3>
    <?= validation_errors(); ?>
</h3>
<form method="post" action="<?= base_url('buku/save')?>" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
<input type="hidden" name="gambar_lama" value="<?= isset($gambar) ? $gambar : '' ?>">
<div class="mb-3">
    <label></label>
    <div>
        <h3>Tambah/Ubah Buku</h3>
    </div>
</div>
<div>
    <div class="mb-3">
        <label class="form-label">Isbn</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="isbn" id="isbn" value="<?= $isbn ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="judul" id="judul" value="<?= $judul ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Pengarang</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="pengarang" id="pengarang" value="<?= $pengarang ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Rilis</label>
        <div class="col-sm-6">
            <input class="form-control" type="date" name="tanggal_rilis" id="tanggal_rilis" value="<?= $tanggal_rilis ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah Halaman</label>
        <div class="col-sm-6">
            <input class="form-control" type="number" name="jumlah_halaman" id="jumlah_halaman" value="<?= $jumlah_halaman ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Sinopsis</label>
        <div class="col-sm-6">
           <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="10"><?= $sinopsis ?></textarea>
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
        <label class="form-label">Nama Penerbit</label>
        <div class="col-sm-6">
            <select class="form-select" name="id_penerbit" id="id_penerbit">
                <option value="" hidden="">- Silahkan pilih penerbit -</option>
                <?php
                foreach ($penerbits as $item) {
                ?>
                <option <?= ($id_penerbit == $item['id']) ?'selected="selected"' : ''; ?> value="<?= $item['id']?>"><?= $item['nama']?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
            <input class="form-check-input me-2" type="radio" name="tersedia" id="tersedia" value="1" <?= $tersedia == 1 ? 'checked' : '' ?>>
            <label class="form-check-label me-2" for="tersedia">Tersedia</label>
            <input class="form-check-input me-2" type="radio" name="tersedia" id="tidak_tersedia" value="0" <?= $tersedia == 0 ? 'checked' : '' ?>>
            <label class="form-check-label me-2" for="tidak_tersedia"> Tidak Tersedia</label>
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
