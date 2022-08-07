<?php 

require_once '_config/config.php';

// jika session tidak ada
if(!isset($_SESSION['admin'])) {

	// akan di redirect ke halaman login
	echo "<script>document.location = '" . base_url('auth/login.php') . "';</script>";

} elseif(isset($_SESSION['admin'])) {
	// jika ada session

	// akan di redirect ke halaman dashboard/
	echo "<script>document.location = '" . base_url('dashboard/') . "';</script>";
}

?>