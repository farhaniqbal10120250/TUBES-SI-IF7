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
	    <h1 class="mt-4">Data Pasien</h1>
	    <div class="pull-right mb-4">
	    	<a href="" class="btn btn-outline-primary btn-sm"><i class="fa fa-refresh"></i></a>
	    	<a href="add.php" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i> Tambah Pasien</a>
	    	<a href="import.php" class="btn btn-outline-dark btn-sm"><i class="fa fa-upload"></i> Import Data Pasien</a>
	    </div>
	    <div class="table-responsive mb-5">
	    	<table class="table table-stripped table-bordered table-hover mt-4" id="table_pasien">
	    		<thead class="text-center">
	    			<tr>
                        <th>no. </th>
	    				<th>No. Identitas</th>
	    				<th>Nama Pasien</th>
	    				<th>Jenis Kelamin</th>
	    				<th>Alamat</th>
	    				<th>No Telp</th>
	    				<th><i class="fa fa-cog"></i></th>
	    			</tr>
	    		</thead>
	    		<tbody>
				<?php $i = 1 ?>
				<?php $datapasien = tampil("SELECT * FROM tb_pasien"); ?>
	    		<?php if(mysqli_affected_rows($conn) > 0) : ?>
	    			<?php foreach($datapasien as $pasien) : ?>
	    				<tr>
	    					<td><?= $i++; ?></td>
	    					<td><?= $pasien['no_identitas']; ?></td>
							<td><?= $pasien['nama_pasien']; ?></td>
							<td><?= $pasien['jenis_kelamin']; ?></td>
							<td><?= $pasien['alamat']; ?></td>
							<td><?= $pasien['no_telp']; ?></td>
	    					<td class="text-center">
    							<div class="form-group">
    								<input type="checkbox" name="checked[]" value="<?= $poli['id_pasien'] ?>" class="checked">
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
	    		</tbody>
	    	</table>
	    </div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>