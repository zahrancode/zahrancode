<?php

//<!--

// TIKTOK @ZAHRAN888 //

// INSTAGRAM @DEV.ZAHRAN888 //

// 3MS GAMING STORE MEMBERIKAN LAYANAN DIGITAL CEPAT, AMAN, DAN PRAKTIS DALAM SATU GENGGAMAN.  //

//-->

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
$maintenance = 1; //** 1 = ya ..  0 = tidak
if($maintenance == 0) {
    die("Site under Maintenance.");
}
// database
$config['db'] = array(
	'host' => 'localhost',
	'name' => 'x3msg655_3ms-gaming',
	'username' => 'x3msg655_3ms-gaming',
	'password' => '@vinta888'
);

$conn = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
if(!$conn) {
	die("Koneksi Gagal : ".mysqli_connect_error());
	}
$config['web'] = array(
	'url' => 'https://www.3ms-gaming.xyz/' // isi domain anda : https://domain.com/
	
);	
// date & time
$date = date("Y-m-d");
$time = date("H:i:s");
// date & time
$tanggal = date("Y-m-d");
$waktu = date("H:i:s");
require("lib/function.php");
$version_update = "?v=1.1"; //?v=1.1 update setiap kali melakukan perubahan
?>

























