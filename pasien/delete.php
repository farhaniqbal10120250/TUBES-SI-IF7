<?php 

require '../_config/config.php';
require 'functions.php';

if(isset($_GET['id_pasien'])) {

	$id_pasien = $_GET['id_pasien'];

	if(hapus_pasien($id_pasien) > 0) {
		echo "<script>
			alert('Data berhasil dihapus');
			document.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data gagal dihapus');
			document.location = 'index.php';
		</script>";
	}
} else {
	echo "<script>
		document.location = 'index.php';
	</script>";
}