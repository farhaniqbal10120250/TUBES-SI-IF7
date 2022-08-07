<?php

require_once '../header.php';
require 'functions.php';

if(!isset($_GET['id_pasien'])) {
	echo "<script>
		document.location = 'index.php';
	</script>";
} else {
	$id_pasien = $_GET['id_pasien'];
}

$pasien = tampil("SELECT * FROM tb_pasien WHERE id_pasien = $id_pasien")[0];

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Edit Data Pasien</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('pasien/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">
				<form action="proses.php" method="POST">
				<input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien']; ?>">
					<div class="form-group">
						<label for="no_identitas">No Identitas : </label>
						<input type="number" class="form-control" name="no_identitas" id="no_identitas" required autofocus value="<?= $pasien['no_identitas']; ?>">
					</div>
					<div class="form-group">
						<label for="nama_pasien">Nama Pasien : </label>
						<input type="text" class="form-control" name="nama_pasien" id="nama_pasien" required value="<?= $pasien['nama_pasien']; ?>">
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin : </label> <br>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki - Laki" id="L" <?= $pasien['jenis_kelamin'] == 'L' ? 'checked' : null ?>>
							<label for="L" class="form-check-label">Laki - Laki</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" id="P" <?= $pasien['jenis_kelamin'] == 'P' ? 'checked' : null ?>>
							<label for="P" class="form-check-label">Perempuan</label>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat : </label>
						<textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $pasien['alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp">No. Telp : </label>
						<input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $pasien['no_telp']; ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-success" name="edit" type="submit">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>