<?php
include 'koneksi.php';

//buat perintah sql untuk query data provinsi
$sql = "SELECT id, name FROM provinces";
$stmt = $dbCon->prepare($sql);
$stmt->execute();

//simpan data hasil query ke dalam variable data_provinsi
$data_provinsi = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		Provinsi
		<select id="provinsi">
			<option>Silahkan pilih provinsi</option>
		</select>
		<br/>
		Kabupaten/Kota
		<select id="kabupatenkota">
			<option>Silahkan pilih kabupaten/kota</option>
		</select>
	</body>
</html>