<?php 

require '../_config/config.php';
require '../_assets/libs/vendor/autoload.php';
require 'functions.php';

if(isset($_POST['tambah'])) {

	if(tambah_pasien($_POST) > 0) {
		echo "<script>
			alert('Data Berhasil Ditambahkan');
			document.location = 'index.php';
		</script>";
	} else {
		echo "<script>
			alert('Data Gagal Ditambahkan (No Identitas Sudah Diinput)');
			document.location = 'add.php';
		</script>";
	}

} elseif(isset($_POST['edit'])) {

	if(edit_pasien($_POST) > 0) {
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

} elseif(isset($_POST['import'])) {

	if(import_data($_FILES) > 0) {
		echo "<script>
				alert('Upload Berhasil!')
				document.location = 'index.php';
		</script>";
	} else {
		echo "<script>
				alert('Upload Gagal!, Data yang diupload sudah diupload');
				document.location = 'index.php';
		</script>";
	}

} else {

	echo "<script>
			document.location = 'index.php';
	</script>";

}