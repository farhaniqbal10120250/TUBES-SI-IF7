<?php 

// mengambil file config.php dan functions.php
require '../_config/config.php';
require 'functions.php';

// jika terdapat variabel $_GET['id_obat']
if(isset($_GET['id_obat'])) {

	// maka akan membuat variabel $id_obat yang valuenya $_GET['id_obat']
	$id_obat = $_GET['id_obat'];

	// jika fungsi hapus obat menghasilkan nilai lebih dari 0
	if(hapus_obat($id_obat) > 0) {

		// maka akan menampilkan alert berhasil dihapus dan akan redirect ke file index.php
		echo "<script>
			alert('Data Berhasil Dihapus');
			document.location = 'index.php';
		</script>";

	// jika tidak
	} else {

		// maka akan menampilkan alert gagal dihapus dan akan redirect ke file index.php
		echo "<script>
			alert('Data Gagal Dihapus');
			document.location = 'index.php';
		</script>";

	}

// jika tidak ada variabel $_GET['id']
} else {

	// maka akan otomatis redirect ke file index.php
	echo "<script>
		document.location = 'index.php';
	</script>";
	
}

?>