<?php 

// untuk mengambil file config.php dan functions.php
require_once '../_config/config.php';
require_once 'functions.php';

// jika session admin tidak ada
if(!isset($_SESSION['admin'])) {

	// akan di redirect ke halaman login
	echo "<script>
		document.location = '" . base_url('auth/login.php') . "'
	</script>";


}

// logika pagination
$batas = 5;
$halaman = @$_GET['halaman'];
if(empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
} else {
	$posisi = ($halaman - 1) * $batas;
}

// logika search
$i = 1;
if($_SERVER['REQUEST_METHOD'] == "POST") {
	$keyword = trim(mysqli_real_escape_string($conn, $_POST['keyword']));
	if($keyword != '') {
		$query = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$keyword%' OR keterangan LIKE '%$keyword%'";
		$query_jml = $query;
	} else {
		$query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
		$query_jml = "SELECT * FROM tb_obat";
		$i = $posisi + 1;
	}

} else {
	$query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
	$query_jml = "SELECT * FROM tb_obat";
	$i = $posisi + 1;
}

// mengambil halaman header.php
require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Data Obat</h1>
	    <div class="pull-right">
	    	<a href="" class="btn btn-outline-primary"><i class="fa fa-refresh"></i></a>
	    	<a href="add.php" class="btn btn-outline-success"><i class="fa fa-plus"></i> Tambah Obat</a>
	    </div>

		<!-- search -->
	    <div>
	    	<form action="" class="form-inline" method="POST">
	    		<div class="form-group">
	    			<input type="text" class="form-control mr-2" name="keyword" placeholder="Cari Obat..">
	    			<button class="btn btn-outline-primary" type="submit" name="cari"><i class="fa fa-search"></i></button>
	    		</div>
	    	</form>
	    </div>

	    <!-- table -->
	    <div class="table-responsive mt-4">
	    	<table class="table table-stripped table-bordered table-hover">
	    		<thead class="text-center">
	    			<tr>
	    				<th width="5%">No</th>
	    				<th>Nama Obat</th>
	    				<th>Keterangan</th>
	    				<th>
	    					<i class="fa fa-cog"></i>
	    				</th>
	    			</tr>
	    		</thead>
	    		<tbody>
				<?php $obat = tampil($query); ?>
	    		<?php if(mysqli_affected_rows($conn) > 0) : ?>
	    			<?php foreach($obat as $obt) : ?>
	    				<tr>
	    					<td><?= $i++; ?></td>
	    					<td><?= $obt['nama_obat']; ?></td>
	    					<td><?= $obt['keterangan']; ?></td>
	    					<td class="text-center">
	    						<a href="update.php?id_obat=<?= $obt['id_obat']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
	    						<a href="delete.php?id_obat=<?= $obt['id_obat']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah ingin dihapus ?')"><i class="fa fa-trash"></i></a>
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
	    </div>
		
		<!-- pagination & jumlah data -->
	    <?php if(isset($_POST['cari'])) : ?>
			<?php if($_POST['keyword'] != '') : ?>
				<div style="float: left;">
					<?php $jml = mysqli_num_rows(mysqli_query($conn, $query_jml)); ?>
					Data Hasil Pencarian : <b><?= $jml; ?></b>
				</div>
			<?php else : ?>
				<div style="float: left;">
					<?php $jml = mysqli_num_rows(mysqli_query($conn, $query_jml)); ?>
					Jumlah Data : <b><?= $jml; ?></b>
				</div>
				<nav style="float: right;">
					<ul class="pagination">
						<?php $jml_halaman = ceil($jml / $batas); ?>

						<?php if($halaman > 1) : ?>
							<li class="page-item">
								<a href="?halaman=<?= $halaman - 1; ?>" class="page-link">&laquo;</a>
							</li>
						<?php endif; ?>

						<?php for($i = 1; $i <= $jml_halaman; $i++) : ?>
							<?php if($i != $halaman) : ?>
								<li class="page-item">
									<a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
								</li>
							<?php else : ?>
								<li class="page-item active">
									<a class="page-link"><?= $i; ?></a>
								</li>
							<?php endif; ?>
						<?php endfor; ?>

						<?php if($halaman < $jml_halaman) : ?>
							<li class="page-item">
								<a href="?halaman=<?= $halaman + 1; ?>" class="page-link">&raquo;</a>
							</li>
						<?php endif; ?>

					</ul>
				</nav>
			<?php endif; ?>
		<?php else : ?>
			<div style="float: left;">
					<?php $jml = mysqli_num_rows(mysqli_query($conn, $query_jml)); ?>
					Jumlah Data : <b><?= $jml; ?></b>
			</div>
			<nav style="float: right;">
				<ul class="pagination">
					<?php $jml_halaman = ceil($jml / $batas); ?>

					<?php if($halaman > 1) : ?>
						<li class="page-item">
							<a href="?halaman=<?= $halaman - 1; ?>" class="page-link">&laquo;</a>
						</li>
					<?php endif; ?>

					<?php for($i = 1; $i <= $jml_halaman; $i++) : ?>
						<?php if($i != $halaman) : ?>
							<li class="page-item">
								<a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
							</li>
						<?php else : ?>
							<li class="page-item active">
								<a href="" class="page-link"><?= $i; ?></a>
							</li>
						<?php endif; ?>
					<?php endfor; ?>

					<?php if($halaman < $jml_halaman) : ?>
						<li class="page-item">
							<a href="?halaman=<?= $halaman + 1; ?>" class="page-link">&raquo;</a>
						</li>
					<?php endif; ?>
				</ul>
			</nav>
		<?php endif; ?>
		<!-- akhir pagination & jumlah data -->

	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>