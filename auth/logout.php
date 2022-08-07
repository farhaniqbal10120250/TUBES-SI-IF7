<?php 

require_once '../_config/config.php';

session_destroy();

echo "<script>document.location = '" . base_url('auth/login.php') . "';</script>";

?>