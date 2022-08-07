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
	    <h1 class="mt-4">Data Dokter</h1>
	    <div class="pull-right mb-4">
	    	<a href="" class="btn btn-outline-primary"><i class="fa fa-refresh"></i></a>
	    	<a href="add.php" class="btn btn-outline-success"><i class="fa fa-plus"></i> Tambah Dokter</a>
	    </div>
	    <div class="table-responsive">
	    <form action="" method="POST" name="proses">
	    	<table class="table table-stripped table-bordered table-hover mt-4" id="table_dokter">
	    		<thead class="text-center">
	    			<tr>
		    			<th>
							<div class="form-group">
								<input type="checkbox" name="select_all" id="select_all" value="">
							</div>
	    				</th>
	    				<th width="5%">No</th>
	    				<th>Nama Dokter</th>
	    				<th>Spesialist</th>
	    				<th>Alamat</th>
	    				<th>No Telp</th>
	    				<th><i class="fa fa-cog"></i></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    		<?php $i = 1 ?>
				<?php $dokter = tampil("SELECT * FROM tb_dokter"); ?>
	    		<?php if(mysqli_affected_rows($conn) > 0) : ?>
	    			<?php foreach($dokter as $dok) : ?>
	    				<tr>
	    					<td class="text-center">
    							<div class="form-group">
    								<input type="checkbox" name="checked[]" value="<?= $dok['id_dokter'] ?>" class="checked">
    							</div>
	    					</td>
	    					<td><?= $i++; ?></td>
	    					<td><?= $dok['nama_dokter']; ?></td>
	    					<td><?= $dok['spesialist']; ?></td>
	    					<td><?= $dok['alamat']; ?></td>
	    					<td><?= $dok['no_telp'] ?></td>
	    					<td class="text-center">
	    						<a href="update.php?id_dokter=<?= $dok['id_dokter']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
	    					</td>
	    				</tr>
	    			<?php endforeach; ?>
	    		<?php endif; ?>
	    		</tbody>
	    	</table>
	    </form>
	    </div>
	    <div class="pull-right mb-3 mt-4">	    	
	    	<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="fa fa-trash"></i> Hapus</button>
	    </div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>