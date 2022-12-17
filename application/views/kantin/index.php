<?php
    include APPPATH . 'views/fragment/header.php';
    include APPPATH . 'views/fragment/menu.php';
?>
<h1>List Kantin</h1>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url("kantin/form")?>" class="btn btn-success btn-sm">Tambah</a>
</div>
<table class="table table-striped">
    <tr>
        <th>Nama Kantin</th>
        <th>Telpon</th>
        <th></th>
    </tr>
    <?php
        foreach ($records as $idx => $data) {
            ?>
        <tr>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['telpon'] ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="<?= base_url("kantin/detail/{$data['id']}") ?>">Detail</a>
                    <a class="btn btn-warning btn-sm" href="<?= base_url("kantin/form/{$data['id']}") ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" onclick="return confirm('menghapus data?')" href="<?= base_url("kantin/hapus/{$data['id']}") ?>">Hapus</a>
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