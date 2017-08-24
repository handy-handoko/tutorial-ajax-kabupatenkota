<?php
include 'koneksi.php';

//buat perintah sql untuk query data provinsi. ambil kolom id, dan name dari tabel provinces
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

				<?php
				//isi data dari variabel provinsi ke dalam dropdown. isi dari field id dimasukkan ke dalam attribute value. sementara isi field name dimasukkan sebagai text
				foreach($data_provinsi as $provinsi) {?>
					<option value="<?php echo $provinsi['id']; ?>">
						<?php echo $provinsi['name']; ?>
					</option>
				<?php } ?>
			
			</select>
		<br/>
		Kabupaten/Kota
		<select id="kabupatenkota">
			<option>Silahkan pilih kabupaten/kota</option>
		</select>

		<script type="text/javascript">
			$(document).ready(function() {

				//function ini akan aktif ketika dropdown dengan id provinsi berubah
				$('#provinsi').change(function() {

					//get data kabupatenkota dari server. data yang disimpan dari server akan disimpan dalam variabel data_kabupatenkota
					$.get( "http://localhost/kabupatenkota/getkabupatenkota.php", {provinsi:$('#provinsi').val()}, function(data_kabupatenkota) {
						
						//kosongkan dropdown kabupaten kota dari data sebelumnya
						$('#kabupatenkota').empty(); 

						//isikan data baru. masukkan name kota sebagai text, dan id kabupaten/kota sebagai value
						$.each(data_kabupatenkota, function (index, value) {
							$('#kabupatenkota').append('<option value="'+value.id +'">'+value.name +'</option>');
						});
					});
				});
			});
		</script>
	</body>
</html>