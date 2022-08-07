<?php 

// file functions untuk pasien

// mengambil file config.php
require_once '../_config/config.php';
require '../_assets/libs/vendor/autoload.php';

function tampil($query) {

	global $conn;

	$result = mysqli_query($conn, $query);

	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;

}

// fungsi tambah data
function tambah_pasien($data) {

	global $conn;

	$no_identitas = htmlspecialchars($data['no_identitas']);
	$nama_pasien = htmlspecialchars($data['nama_pasien']);
	$jenis_kelamin = $data['jenis_kelamin'];
	$alamat = htmlspecialchars($data['alamat']);
	$no_telp = htmlspecialchars($data['no_telp']);

	// cek apakah no_identitas sama
	$result = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE no_identitas = '$no_identitas'") or mysqli_error($conn);

	$data = mysqli_fetch_assoc($result);

	if($no_identitas == $data['no_identitas']) {
		return false;
		exit;
	}

	$query = "INSERT INTO tb_pasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('', '$no_identitas', '$nama_pasien', '$jenis_kelamin', '$alamat', '$no_telp')";

	mysqli_query($conn, $query) or mysqli_error($conn);

	return mysqli_affected_rows($conn);

}

// fungsi edit pasien
function edit_pasien($data) {

	global $conn;

	$id_pasien = $data['id_pasien'];
	$no_identitas = htmlspecialchars($data['no_identitas']);
	$nama_pasien = htmlspecialchars($data['nama_pasien']);
	$jenis_kelamin = $data['jenis_kelamin'];
	$alamat = htmlspecialchars($data['alamat']);
	$no_telp = htmlspecialchars($data['no_telp']);

	// cek apakah no_identitas sama
	$result = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE no_identitas = '$no_identitas' AND id_pasien != $id_pasien") or mysqli_error($conn);

	$data = mysqli_fetch_assoc($result);

	if($no_identitas == $data['no_identitas']) {
		return false;
		exit;
	}

	$query = "UPDATE tb_pasien SET 
			no_identitas = '$no_identitas',
			nama_pasien = '$nama_pasien',
			jenis_kelamin = '$jenis_kelamin',
			alamat = '$alamat',
			no_telp = '$no_telp'
			WHERE id_pasien = $id_pasien
	";

	mysqli_query($conn, $query) or mysqli_error($conn);

	return mysqli_affected_rows($conn);

}

// fungsi hapus pasien
function hapus_pasien($id_pasien) {

	global $conn;

	mysqli_query($conn, "DELETE FROM tb_pasien WHERE id_pasien = $id_pasien");

	return mysqli_affected_rows($conn);

}

// fungsi import data
function import_data($data) {

	global $conn;

	$file = $data['file']['name'];
	$ekstensi = explode(".", $file);
	$file_name = 'file-' . round(microtime(true)) . '.' . end($ekstensi);

	$sumber = $data['file']['tmp_name'];
	$target_dir = '../_file/';
	$target_file = $target_dir . $file_name;

	$upload = move_uploaded_file($sumber, $target_file);

	if(!$upload) {
		return false;
		exit;
	}

	$obj = PHPExcel_IOFactory::load($target_file);
	$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

	$query = "INSERT INTO tb_pasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES";

	for($i = 3; $i <= count($all_data); $i++) {
		$no_identitas = $all_data[$i]['A'];
		$nama_pasien = $all_data[$i]['B'];
		$jenis_kelamin = $all_data[$i]['C'];
		$alamat = $all_data[$i]['D'];
		$no_telp = $all_data[$i]['E'];

		$query .= "('','$no_identitas','$nama_pasien','$jenis_kelamin','$alamat','$no_telp'),";
	}

	$query = substr($query, 0, -1);

	// cek apakah no_identitas sama
	$result = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE no_identitas = '$no_identitas'") or die(mysqli_error($conn));

	$data = mysqli_fetch_assoc($result);

	if($no_identitas == $data['no_identitas']) {
		return false;
		exit;
	}

	mysqli_query($conn, $query) or die(mysqli_error($conn));

	// agar filenya dibaca namun tidak disimpan
	unlink($target_file);

	return mysqli_affected_rows($conn);

}