<?php 
//panggil file koneksi.php agar bisa terhubung ke database
include 'koneksi.php';

//tambahkan variabel provinsi. variabel provinsi akan mendapat data dari parameter provinsi yang dimasukkan di browser.
$provinsi =  $_GET['provinsi'];

//buat perintah sql untuk query data kabupatenkota berdasarkan id_provinsi
$sql = "SELECT * FROM regencies WHERE province_id = ?";
$stmt = $dbCon->prepare($sql);
//tambahkan parameter $provinsi ke dalam statement. 
$stmt->execute(array($provinsi));

//lalu tampilkan data menggunakan perintah fetchAll
print_r($stmt->fetchAll());