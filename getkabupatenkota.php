<?php 
//panggil file koneksi.php agar bisa terhubung ke database
include 'koneksi.php';

//query semua data dari regencies(kabupaten/kota)
$sql = "SELECT * FROM regencies";
$stmt = $dbCon->prepare($sql);
$stmt->execute();

//lalu tampilkan data menggunakan perintah fetchAll
print_r($stmt->fetchAll());