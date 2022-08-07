<?php 

require '../_config/config.php';
require 'functions.php';

// jika tombol tambah ditekan
if(isset($_POST['tambah'])) {

	// maka akan melakukan :

	// jika fungsi tambah_obat menghasilkan nilai lebih dr 0
	if(tambah_obat($_POST) > 0) {

		// maka akan menampilkan alert berhasil dan akan redirect ke file index.php
		echo "<script>
				alert('Data berhasil ditambah');
				document.location = 'index.php';
		</script>";

	// jika tidak
	} else {

		// maka akan menampilkan alert gagal dan akan redirect ke file add.php
		echo "<script>
				alert('Data gagal ditambah');
				document.location = 'add.php';
		</script>";
	}

// jika tombol edit ditekan
} elseif(isset($_POST['edit'])) {

	// maka akan melakukan :

	// jika fungsi ubah menghasilkan nilai lebih dari 0
	if(ubah_obat($_POST) > 0) {

		// maka akan menampilkan alert berhasil dan akan redirect ke file index.php
		echo "<script>
			alert('Data Berhasil Diubah');
			document.location = 'index.php';
		</script>";

	// jika tidak
	} else {

		// maka akan menampilkan alert gagal dan akan redirect ke file index.php
		echo "<script>
			alert('Data Gagal Diubah');
			document.location = 'index.php';
		</script>";

	}

}

?>