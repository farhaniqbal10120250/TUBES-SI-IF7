<?php 

// file functions untuk tb_obat

// mengambil file config.php
require_once '../_config/config.php';

// fungsi untuk menampilkan data obat
function tampil($query) {

	global $conn;

	$result = mysqli_query($conn, $query);

	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;

}

// fungsi untuk menambah obat
function tambah_obat($data) {

	global $conn;

	$nama_obat = htmlspecialchars($data['nama_obat']);
	$keterangan = htmlspecialchars($data['keterangan']);

	mysqli_query($conn, "INSERT INTO tb_obat (id_obat, nama_obat, keterangan) VALUES ('','$nama_obat','$keterangan')");

	return mysqli_affected_rows($conn);

}

// fungsi untuk menghapus data obat
function hapus_obat($id_obat) {

	global $conn;

	$query = "DELETE FROM tb_obat WHERE id_obat = $id_obat";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

// fungsi untuk mengubah data obat
function ubah_obat($data) {

	global $conn;

	$id_obat = $data['id_obat'];
	$nama_obat = htmlspecialchars($data['nama_obat']);
	$keterangan = htmlspecialchars($data['keterangan']);

	$query = "UPDATE tb_obat SET
			nama_obat = '$nama_obat', 
			keterangan = '$keterangan'
			WHERE id_obat = $id_obat
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}