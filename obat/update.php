<?php

// mengambil file config.php dan functions.php
require '../_config/config.php';
require 'functions.php';

// jika terdapat variabel $_GET['id_obat']
if(isset($_GET['id_obat'])) {

	// maka akan membuat variabel $id_obat yang valuenya $_GET['id_obat']
	$id_obat = $_GET['id_obat'];

	// dan membuat variabel $obat yang valuenya fungsi tampil
	$obat = tampil("SELECT * FROM tb_obat WHERE id_obat = $id_obat")[0];

// jika tidak
} else {

	// maka akan redirect ke file index.php
	echo "<script>
		document.location = 'index.php';
	</script>";

}

// mengambil file header.php
require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Edit Data Obat</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('obat/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">

				<!-- form untuk mengedit data obat -->
				<form action="proses.php" method="POST">
				<input type="hidden" name="id_obat" value="<?= $obat['id_obat']; ?>">
					<div class="form-group">
						<label for="nama_obat">Nama Obat : </label>
						<input type="text" class="form-control" name="nama_obat" id="nama_obat" required autofocus value="<?= $obat['nama_obat']; ?>">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan : </label>
						<textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?= $obat['keterangan']; ?></textarea>
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