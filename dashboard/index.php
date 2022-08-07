<?php 

require_once '../_config/config.php';

// jika session admin tidak ada
if(!isset($_SESSION['admin'])) {
	// akan di redirect dgn javascript ke halaman login
	echo "<script>
		document.location = '" . base_url('auth/login.php') . "'
	</script>";
}

?>

<!-- mengambil file header.php -->
<?php require_once '../header.php'; ?>

<!-- Page Content -->
	<div class="container-fluid">
	    <h1 class="mt-4">Dashboard</h1>
	    <p>Selamat Datang <?= ucwords($_SESSION['admin']); ?></p>
	</div>
</div>
<!-- /#page-content-wrapper -->

<!-- mengambil file footer.php -->
<?php require_once '../footer.php'; ?>
</body>
</html>