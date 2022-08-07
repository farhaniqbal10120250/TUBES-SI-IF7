<?php 

require_once '../_config/config.php';
require_once 'functions.php';

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Tambah Data Poliklinik</h1>
	    <div class="pull-right">
	    	<a href="index.php" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    </div>
    	<div class="row justify-content-center">
    		<div class="col-md-6">
    			<form action="add.php" method="POST">
    				<div class="form-group">
    					<label for="count_add">Banyak Record Yang Ingin Ditambahkan</label>
    					<input type="text" name="count_add" class="form-control" id="count_add" pattern="[0-9]+" required maxlength="2">
    				</div>
    				<div class="form-group pull-right">
    					<button class="btn btn-success" name="generate" type="submit">Generate</button>
    				</div>
    			</form>
    		</div>
    	</div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>