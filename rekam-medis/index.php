<?php 

require_once '../_config/config.php';
require_once 'functions.php';

if(!isset($_SESSION['admin'])) {
	echo "<script>
		document.location = '" . base_url('auth/login.php') . "'
	</script>";
}

$rekammedis = tampil("SELECT * FROM tb_rekammedis 
	INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien 
	INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
	INNER JOIN tb_poliklinik ON tb_rekammedis.id_poliklinik = tb_poliklinik.id_poliklinik");

require_once '../header.php';

?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Data Rekam Medis</h1>
	    <div class="pull-right mb-4">
	    	<a href="" class="btn btn-outline-primary"><i class="fa fa-refresh"></i></a>
	    	<a href="add.php" class="btn btn-outline-success"><i class="fa fa-plus"></i> Tambah Rekam Medis</a>
	    </div>
	    <div class="table-responsive">
	    	<table class="table table-stripped table-bordered table-hover mt-4" id="table_rekammedis">
	    		<thead class="text-center">
	    			<tr>
	    				<th width="5%">No</th>
	    				<th>Tgl. Periksa</th>
	    				<th>Nama Pasien</th>
	    				<th>Keluhan</th>
	    				<th>Nama Dokter</th>
	    				<th>Diagnosa</th>
	    				<th>Poliklinik</th>
	    				<th>Data Obat</th>
	    				<th><i class="fa fa-cog"></i></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php $i = 1; ?>
	    			<?php foreach($rekammedis as $rm) : ?>
    				<?php $id_rekammedis = $rm['id_rekammedis']; ?>
		    		<?php $obat = tampil("SELECT * FROM tb_rekammedis_obat INNER JOIN tb_obat ON tb_rekammedis_obat.id_obat = tb_obat.id_obat WHERE id_rekammedis = '$id_rekammedis'");?>
	    				<tr>
	    					<td><?= $i++ ?></td>
	    					<td><?= tgl_indonesia($rm['tanggal_periksa']); ?></td>
	    					<td><?= $rm['nama_pasien']; ?></td>
	    					<td><?= $rm['keluhan']; ?></td>
	    					<td><?= $rm['nama_dokter']; ?></td>
	    					<td><?= $rm['diagnosa']; ?></td>
	    					<td><?= $rm['nama_poliklinik']; ?></td>
	    					<td>
		    					<ul>
			    					<?php foreach($obat as $obt) : ?>
			    						<li><?= $obt['nama_obat'] ?></li>
			    					<?php endforeach; ?>
			    				</ul>
	    					</td>
	    					<td class="text-center">
	    						<a href="delete.php?id_rekammedis=<?= $rm['id_rekammedis'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Ingin Menghapus Data ?')"><i class="fa fa-trash"></i></a>
	    					</td>
	    				</tr>
	    			<?php endforeach; ?>
	    		</tbody>
	    	</table>
	    </div>
	</div>
</div>
<!-- /#page-content-wrapper -->

<?php require_once '../footer.php'; ?>