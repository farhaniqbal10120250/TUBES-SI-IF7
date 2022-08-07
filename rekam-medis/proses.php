<?php 

require '../_config/config.php';
require 'functions.php';

if(isset($_POST['tambah'])) {

	if(tambah_rekammedis($_POST) > 0) {
		if(tambah_rekammedis_obat($_POST['id_obat']) > 0) {
			echo "<script>
				alert('Data Berhasil Ditambah');
				document.location = 'index.php';
			</script>";
		} else {
			"<script>
			alert('Data Gagal Ditambah');
			document.location = 'index.php';
		</script>";
		}
	} else {
		echo "<script>
			alert('Data Gagal Ditambah');
			document.location = 'index.php';
		</script>";
	}

}