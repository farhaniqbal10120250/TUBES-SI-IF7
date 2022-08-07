<?php

require_once '../_config/config.php';
require_once 'functions.php';

require_once '../header.php';

$pasiens = tampil("SELECT * FROM tb_pasien");
$dokter = tampil("SELECT * FROM tb_dokter");
$poliklinik = tampil("SELECT * FROM tb_poliklinik ORDER BY nama_poliklinik ASC");
$obat = tampil("SELECT * FROM tb_obat");

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Tambah Rekam Medis</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('rekam-medis/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">
				<form action="proses.php" method="POST">
					<div class="form-group">
						<label for="pasien">Pasien : </label>
						<select name="id_pasien" id="pasien" class="form-control" required>
							<option selected disabled value="">Pilih Pasien</option>
							<?php foreach($pasiens as $pasien) : ?>
								<option value="<?= $pasien['id_pasien']; ?>"><?= $pasien['nama_pasien']; ?> - <?= $pasien['no_identitas']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="keluhan">Keluhan : </label>
						<textarea name="keluhan" id="keluhan" cols="30" rows="3" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="dokter">Dokter : </label>
						<select name="id_dokter" id="dokter" class="form-control" required>
							<option selected disabled value="">Pilih Dokter</option>
							<?php foreach($dokter as $dok) : ?>
								<option value="<?= $dok['id_dokter']; ?>"><?= $dok['nama_dokter']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="diagnosa">Diagnosa : </label>
						<textarea name="diagnosa" id="diagnosa" cols="30" rows="3" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="poliklinik">Poliklinik : </label>
						<select name="id_poliklinik" id="poliklinik" class="form-control" required>
							<option selected disabled value="">Pilih Poliklinik</option>
							<?php foreach($poliklinik as $poli) : ?>
								<option value="<?= $poli['id_poliklinik']; ?>"><?= $poli['nama_poliklinik']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="obat">Pilih Obat : </label>
						<select multiple size="7" name="id_obat[]" id="obat" class="form-control" required>
							<?php foreach($obat as $obt) : ?>
								<option value="<?= $obt['id_obat']; ?>"><?= $obt['nama_obat']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal_periksa">Tanggal Periksa : </label>
						<input type="date" class="form-control" name="tanggal_periksa" id="tanggal_periksa" required value="<?= date('Y-m-d') ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-success" name="tambah" type="submit">Tambah</button>
						<button class="btn btn-danger" type="reset">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>