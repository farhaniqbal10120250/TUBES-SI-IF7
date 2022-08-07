<?php

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Tambah Data Pasien</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('pasien/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">
				<form action="proses.php" method="POST">
					<div class="form-group">
						<label for="no_identitas">No Identitas : </label>
						<input type="number" class="form-control" name="no_identitas" id="no_identitas" required autofocus>
					</div>
					<div class="form-group">
						<label for="nama_pasien">Nama Pasien : </label>
						<input type="text" class="form-control" name="nama_pasien" id="nama_pasien" required autofocus>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin : </label> <br>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki - Laki" id="L">
							<label for="L" class="form-check-label">Laki - Laki</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" id="P">
							<label for="P" class="form-check-label">Perempuan</label>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat : </label>
						<textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp">No. Telp : </label>
						<input type="number" class="form-control" name="no_telp" id="no_telp" required>
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