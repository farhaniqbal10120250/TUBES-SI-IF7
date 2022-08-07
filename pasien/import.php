<?php

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Import Data Pasien</h1>
	    <div class="pull-right">
	    	<a href="<?= base_url('_file/sample/pasien.xlsx') ?>" class="btn btn-outline-dark"><i class="fa fa-download"></i> Download Format Excel</a>
	    	<a href="<?= base_url('pasien/') ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
		<div class="row">
			<div class="col-lg-6 justify-content-center">
				<form action="proses.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file">File Excel : </label>
						<input type="file" class="form-control" name="file" id="file" required>
					</div>
					
					<div class="form-group">
						<button class="btn btn-success" name="import" type="submit">Import</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>