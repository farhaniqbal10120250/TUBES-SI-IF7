<?php 

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

function tambah_dokter($data) {

	global $conn;

	$nama_dokter = htmlspecialchars($data['nama_dokter']);
	$spesialist = htmlspecialchars($data['spesialist']);
	$alamat = htmlspecialchars($data['alamat']);
	$no_telp = htmlspecialchars($data['no_telp']);

	$query = "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialist, alamat, no_telp) VALUES ('', '$nama_dokter', '$spesialist', '$alamat', '$no_telp')";

	mysqli_query($conn, $query) or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);

}

function edit_dokter($data) {

	global $conn;

	$id_dokter = $data['id_dokter'];
	$nama_dokter = htmlspecialchars($data['nama_dokter']);
	$spesialist = htmlspecialchars($data['spesialist']);
	$alamat = htmlspecialchars($data['alamat']);
	$no_telp = htmlspecialchars($data['no_telp']);

	$query = "UPDATE tb_dokter SET 
			nama_dokter = '$nama_dokter',
			spesialist = '$spesialist',
			alamat = '$alamat',
			no_telp = '$no_telp'
			WHERE id_dokter = $id_dokter
	";

	mysqli_query($conn, $query) or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);

}

// multiple delete
function hapus($id) {

	global $conn;

	for($i = 0; $i < count($id); $i++) {
		$id_dokter = $id[$i];
		$query = "DELETE FROM tb_dokter WHERE id_dokter = '$id_dokter'";

		mysqli_query($conn, $query) or die(mysqli_error($conn));
	}

	return mysqli_affected_rows($conn);

}