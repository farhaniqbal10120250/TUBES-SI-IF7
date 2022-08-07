<?php 

require '../_config/config.php';
require 'functions.php';

if(isset($_GET['id_rekammedis'])) {
	if(hapus_rekammedis($_GET['id_rekammedis']) > 0) {
		echo "<script>
			alert('Data Berhasil Dihapus');
			document.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data Gagal Dihapus');
			document.location = 'index.php';
		</script>";
	}
} else {
	echo "<script>
		document.location = 'index.php';
	</script>";
}