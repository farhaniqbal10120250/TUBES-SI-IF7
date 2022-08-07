<?php

// mengambil file header.php
require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Tambah Obat</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('obat/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">

				<!-- form yang mengirimkan ke file proses.php -->
				<form action="proses.php" method="POST">
					<div class="form-group">
						<label for="nama_obat">Nama Obat : </label>
						<input type="text" class="form-control" name="nama_obat" id="nama_obat" required autofocus>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan : </label>
						<textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-success" name="tambah" type="submit">Tambah</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>