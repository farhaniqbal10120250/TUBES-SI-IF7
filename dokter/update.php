<?php

require_once '../_config/config.php';
require 'functions.php';

if(!isset($_GET['id_dokter'])) {
	echo "<script>
		document.location = 'index.php';
	</script>";
} else {
	$id_dokter = $_GET['id_dokter'];
	$dokter = tampil("SELECT * FROM tb_dokter WHERE id_dokter = $id_dokter")[0];
}

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Edit Data Dokter</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('dokter/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">
				<form action="proses.php" method="POST">
				<input type="hidden" name="id_dokter" value="<?= $dokter['id_dokter']; ?>">
					<div class="form-group">
						<label for="nama_dokter">Nama Dokter : </label>
						<input type="text" class="form-control" name="nama_dokter" id="nama_dokter" required autofocus value="<?= $dokter['nama_dokter'] ?>">
					</div>
					<div class="form-group">
						<label for="spesialist">Spesialist : </label>
						<input type="text" class="form-control" name="spesialist" id="spesialist" required value="<?= $dokter['spesialist']; ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat : </label>
						<textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $dokter['alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp">No. Telp : </label>
						<input type="number" class="form-control" name="no_telp" id="no_telp" required value="<?= $dokter['no_telp']; ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-success" name="edit" type="submit">Edit Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>