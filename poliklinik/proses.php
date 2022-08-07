<?php 

require '../_config/config.php';
require 'functions.php';

if(isset($_POST['tambah'])) {

	if(tambah_poliklinik($_POST) > 0) {
		echo "<script>
			alert('Data Berhasil Ditambahkan');
			window.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data Gagal Ditambahkan');
			window.location = 'generate.php';
		</script>";
	}

} elseif(isset($_POST['edit'])) {

	if(edit_poliklinik($_POST) > 0)	 {
		echo "<script>
			alert('Data Berhasil Diedit');
			window.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data Gagal Diedit');
			window.location = 'index.php';
		</script>";
	}

}

?>