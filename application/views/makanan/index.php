<?php
    include APPPATH . 'views/fragment/header.php';
    include APPPATH . 'views/fragment/menu.php';
?>
<h1>List Makanan</h1>
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-success btn-sm" href="<?= base_url("makanan/form")?>">Tambah</a>
</div>
<table class="table table-striped">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Kantin</th>
        <th>Aksi</th>
    </tr>
    <?php
        foreach ($records as $idx => $data) {
            ?>
        <tr>
            <td><?= $data['nama']?></td>
            <td><?= $data['harga']?></td>
            <td><?= $data['stok']?></td>
            <td><?= $data['nama_kantin'] ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="<?= base_url("makanan/detail/{$data['id']}") ?>">Detail</a>
                    <a class="btn btn-warning btn-sm" href="<?= base_url("makanan/form/{$data['id']}") ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" onclick="return confirm('menghapus data?')" href="<?= base_url("makanan/hapus/{$data['id']}") ?>">Hapus</a>
                </div>
            </td>
        </tr>
    <?php
        }
    ?>
</table>
<?php
include APPPATH . 'views/fragment/footer.php';
?>