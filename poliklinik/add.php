<?php 

require_once '../_config/config.php';
require_once 'functions.php';

require_once '../header.php';

if(!isset($_POST['count_add'])) {
    echo "<script>
            document.location = 'generate.php';
    </script>";
}

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Tambah Data Poliklinik</h1>
	    <div class="pull-right mb-4">
	    	<a href="index.php" class="btn btn-outline-info">Data</a>
            <a href="generate.php" class="btn btn-outline-primary">Tambah Data Lagi</a>
	    </div>
        <form action="proses.php" method="POST">
            <table class="table table-stripped">
                <input type="hidden" name="total" value="<?= $_POST['count_add']; ?>">
                <tr>
                    <th>No</th>
                    <th>Nama Poliklinik</th>
                    <th>Gedung</th>
                </tr>
                <?php for($i = 1; $i <= $_POST['count_add']; $i++) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <input type="text" class="form-control" name="nama_poliklinik-<?= $i; ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="gedung-<?= $i; ?>" required>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
            <div class="form-group pull-right">
                <button class="btn btn-success" type="submit" name="tambah">Tambah Semua</button>
            </div>
        </form>   
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>