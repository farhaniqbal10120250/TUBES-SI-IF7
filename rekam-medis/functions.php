<?php 

require_once '../_config/config.php';

function tampil($query) {

	global $conn;

	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;

}

// fungsi tambah rekammedis
function tambah_rekammedis($data) {

	global $conn;

	$pasien = $data['id_pasien'];
	$keluhan = htmlspecialchars($data['keluhan']);
	$dokter = $data['id_dokter'];
	$diagnosa = htmlspecialchars($data['diagnosa']);
	$poliklinik = $data['id_poliklinik'];
	$tanggal_periksa = $data['tanggal_periksa'];

	$query_rekammedis = "INSERT INTO tb_rekammedis (id_rekammedis, id_pasien, keluhan, id_dokter, diagnosa, id_poliklinik, tanggal_periksa) VALUES ('','$pasien','$keluhan','$dokter','$diagnosa','$poliklinik','$tanggal_periksa')";

	mysqli_query($conn, $query_rekammedis);

	return mysqli_affected_rows($conn);

}

// fungsi tambah rekammedis obat
function tambah_rekammedis_obat($data) {

	global $conn;

	// $result = mysqli_query($conn, "SELECT * FROM tb_rekammedis");

	$rekammedis = tampil("SELECT * FROM tb_rekammedis");

	foreach($rekammedis as $rm) {
		$id_rekammedis = $rm['id_rekammedis'];
	}

	$obat = $data;

	foreach($obat as $obt) {
		$query_obat = "INSERT INTO tb_rekammedis_obat (id, id_rekammedis, id_obat) VALUES ('','$id_rekammedis', '$obt')";

		mysqli_query($conn, $query_obat);
	}

	return mysqli_affected_rows($conn);

}

function hapus_rekammedis($id_rekammedis) {

	global $conn;

	mysqli_query($conn, "DELETE FROM tb_rekammedis WHERE id_rekammedis = '$id_rekammedis'");

	return mysqli_affected_rows($conn);

}