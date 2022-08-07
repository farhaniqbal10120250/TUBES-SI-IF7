<?php 

require_once '../_config/config.php';
require_once 'functions.php';

if(!isset($_POST['checked'])) {
    echo "<script>
    		alert('Data tidak ada yang di ceklis');
            document.location = 'index.php';
    </script>";
} else {
    $checked = $_POST['checked'];
    if(hapus($checked) > 0) {
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
}