<?php 

require_once '../_config/config.php';
require_once 'functions.php';

if(!isset($_POST['checked'])) {
    echo "<script>
            alert('Data tidak Ada yang di Ceklis');
            document.location = 'index.php';
    </script>";
} else {
    $checked = $_POST['checked'];
}

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Edit Data Poliklinik</h1>
	    <div class="pull-right mb-4">
	    	<a href="index.php" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
        <form action="proses.php" method="POST">
            <table class="table table-stripped">
                <input type="hidden" name="total" value="<?= $_POST['count_add']; ?>">
                <tr>
                    <th>No</th>
                    <th>Nama Poliklinik</th>
                    <th>Gedung</th>
                </tr>
                <?php for($i = 0; $i < count($checked); $i++) : ?>
                    <?php $poliklinik = tampil("SELECT * FROM tb_poliklinik WHERE id_poliklinik = $checked[$i]")[0]; ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td>
                            <input type="hidden" name="id_poliklinik[]" value="<?= $poliklinik['id_poliklinik']; ?>">
                            <input type="text" class="form-control" name="nama_poliklinik[]" value="<?= $poliklinik['nama_poliklinik']; ?>" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="gedung[]" required value="<?= $poliklinik['gedung']; ?>">
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
            <div class="form-group pull-right">
                <button class="btn btn-success" type="submit" name="edit">Edit Data</button>
            </div>
        </form>   
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>