<?php 

// setting default timezone dan mulai session
date_default_timezone_set('Asia/Jakarta');
session_start();

require_once 'koneksi.php';

$conn = mysqli_connect($koneksi['host'], $koneksi['user'], $koneksi['pass'], $koneksi['db']);

if(mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

// fungsi base url
function base_url($url = null) {

	$base_url = "http://localhost/rumahsakit";

	if($url !== null) {
		return $base_url . '/' . $url;
	} else {
		return $base_url;
	}

}

function tgl_indonesia($tgl) {

	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);

	return $tanggal . '/' . $bulan . '/' . $tahun;

}