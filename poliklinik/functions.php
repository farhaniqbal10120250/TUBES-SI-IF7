<?php 

// tb_poliklinik
require_once '../_config/config.php';

function tampil($query) {

	global $conn;

	$result = mysqli_query($conn, $query);

	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;

}

// multiple add
function tambah_poliklinik($data) {

	global $conn;

	$total = $data['total'];

	for($i = 1; $i <= $total; $i++) {
		
		$nama_poliklinik = trim(mysqli_real_escape_string($conn, $_POST['nama_poliklinik-'.$i]));
		$gedung = trim(mysqli_real_escape_string($conn, $_POST['gedung-'.$i]));

		$query = "INSERT INTO tb_poliklinik (id_poliklinik, nama_poliklinik, gedung) VALUES ('', '$nama_poliklinik', '$gedung')";

		mysqli_query($conn, $query);

	}

	return mysqli_affected_rows($conn);

}

// multiple edit
function edit_poliklinik($data) {

	global $conn;

	for($i = 0; $i < count($data['id_poliklinik']); $i++) {
		$id_poliklinik = $data['id_poliklinik'][$i];
		$nama_poliklinik = htmlspecialchars($data['nama_poliklinik'][$i]);
		$gedung = htmlspecialchars($data['gedung'][$i]);

		$query = "UPDATE tb_poliklinik SET
				nama_poliklinik = '$nama_poliklinik',
				gedung = '$gedung'
				WHERE id_poliklinik = $id_poliklinik
		";

		mysqli_query($conn, $query);
	}

	return mysqli_affected_rows($conn);

}

// multiple delete
function hapus($id) {

	global $conn;

	for($i = 0; $i < count($id); $i++) {
		$id_poliklinik = $id[$i];
		$query = "DELETE FROM tb_poliklinik WHERE id_poliklinik = '$id_poliklinik'";

		mysqli_query($conn, $query);
	}

	return mysqli_affected_rows($conn);

}

?>