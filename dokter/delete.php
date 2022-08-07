<?php 

require_once '../_config/config.php';
require 'functions.php';

if(isset($_POST['checked'])) {
	$checked = $_POST['checked'];
	if(hapus($checked) > 0)  {
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
		alert('Tabel Tidak Diceklis');
		document.location = 'index.php';
	</script>";
}