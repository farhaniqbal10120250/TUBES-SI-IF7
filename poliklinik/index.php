<?php 

require_once '../_config/config.php';
require_once 'functions.php';

if(!isset($_SESSION['admin'])) {
	echo "<script>
		document.location = '" . base_url('auth/login.php') . "'
	</script>";
}

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Data Poliklinik</h1>
	    <div class="pull-right">
	    	<a href="" class="btn btn-outline-primary"><i class="fa fa-refresh"></i></a>
	    	<a href="generate.php" class="btn btn-outline-success"><i class="fa fa-plus"></i> Tambah Poliklinik</a>
	    </div>
	    <div class="table-responsive">
	    <form action="" method="POST" name="proses">
	    	<table class="table table-stripped table-bordered table-hover mt-4">
	    		<thead class="text-center">
	    			<tr>
	    				<th width="5%">No</th>
	    				<th>Nama Poliklinik</th>
	    				<th>Gedung</th>
	    				<th>
							<div class="form-group">
								<input type="checkbox" name="select_all" id="select_all" value="">
							</div>
	    				</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    		<?php $i = 1 ?>
				<?php $poliklinik = tampil("SELECT * FROM tb_poliklinik"); ?>
	    		<?php if(mysqli_affected_rows($conn) > 0) : ?>
	    			<?php foreach($poliklinik as $poli) : ?>
	    				<tr>
	    					<td><?= $i++; ?></td>
	    					<td><?= $poli['nama_poliklinik']; ?></td>
	    					<td><?= $poli['gedung']; ?></td>
	    					<td class="text-center">
    							<div class="form-group">
    								<input type="checkbox" name="checked[]" value="<?= $poli['id_poliklinik'] ?>" class="checked">
    							</div>
	    					</td>
	    				</tr>
	    			<?php endforeach; ?>
	    		<?php else : ?>
	    			<tr>
	    				<td colspan="4" align="center">Data Tidak Ditemukan</td>
	    			</tr>
	    		<?php endif; ?>
	    		</tbody>
	    	</table>
	    </form>
	    </div>
	    <div class="pull-right mb-3">
	    	<button class="btn btn-warning btn-sm" onclick="edit()"><i class="fa fa-pencil"></i> Edit</button>
	    	<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="fa fa-trash"></i> Hapus</button>
	    </div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>