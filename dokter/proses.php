<?php 

require '../_config/config.php';
require 'functions.php';

if(isset($_POST['tambah'])) {

	if(tambah_dokter($_POST) > 0) {
		echo "<script>
			alert('Data Berhasil Ditambah');
			document.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data Gagal Ditambah');
			document.location = 'index.php';
		</script>";
	}

} elseif(isset($_POST['edit'])) {

	if(edit_dokter($_POST) > 0) {
		echo "<script>
			alert('Data Berhasil Diubah');
			document.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data Gagal Diubah');
			document.location = 'index.php';
		</script>";
	}

}