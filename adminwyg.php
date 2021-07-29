
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 09 : adminwyg.php -->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';
//mulakan session
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>ADMIN STATION</title>
	<!-- sambungan fail css -->
	<link rel="stylesheet" href="css/w3.css">
</head>
<body>
	<!-- menu navigation -->
	<div class="w3-bar w3-teal">
		<a href="#" class="w3-bar-item w3-button">admin - exowayang | </a>
		<a href="adminwyg.php" class="w3-bar-item w3-button">Tambah Wayang</a>
		<a href="senaraiwyg.php" class="w3-bar-item w3-button">Senarai Wayang</a>
		<a href="logout.php" class="w3-bar-item w3-button w3-right">Logout</a>
		</div>
		<!-- menu navigation tamat -->

		<div class="w3-card-4 w3-center" style="width:40%; margin: 0px auto;">
			<h2>Tambahan Wayang Baru</h2>
			<hr>
			<!-- BORANG TAMBAHAN MAKLUMAT WAYANG -->
			<form class="w3-panel w3-pale-green" action="" method="post" enctype="multipart/form-data">
				<label>Tajuk</label>
				<input class="w3-input w3-border" type="text" name="tajuk">
				<label>Pengkelasan</label>
				<input class="w3-input w3-border" type="text" name="pengkelasan">
				<label>Sinopsis</label>
				<input class="w3-input w3-border" type="text" name="sinopsis">
				<label>Poster</label>
				<input class="w3-input w3-border" type="file" name="image">
				<label>Hall</label>
				<input class="w3-input w3-border" type="text" name="hall">
				<label>Masa Tayangan</label>
				<input class="w3-input w3-border" type="text" name="showtime">
				<label>Harga</label>
				<input class="w3-input w3-border" type="text" name="harga">
				<br>
				<button class="w3-btn w3-teal" type="submit" name="tambah">+Tambah</button>
				<hr>
			</form>
			<!-- BORANG TAMBAHAN MAKLUMAT WAYANG TAMAT -->
			<!-- butang import fail csv -->
			<a href="adminimport.php" class="w3-bar-item w3-button w3-right"><button class="w3-btn w3-teal">IMPORT DATA WAYANG</button></a>
		</div>

		<!-- PROSES TAMBAH REKOD BARU MAKLUMAT WAYANG -->
		<?php
		// jika butang tambah diklik
		if (isset($_POST['tambah'])) {
			// memasukkan gambar yang dimuat naik ke folder img
			$target_path = "img/";
			$target_path = $target_path . basename ($_FILES['image']['name']);

			if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
				// tetapkan nama pembolehubah
				$image = basename($_FILES['image']['name']);
				$tajuk = $_POST['tajuk'];
				$pengkelasan = $_POST['pengkelasan'];
				$sinopsis = $_POST['sinopsis'];
				$hall = $_POST['hall'];
				$showtime = $_POST['showtime'];
				$harga = $_POST['harga'];

				// tambah rekod baru ke jadual wayang
				$query = "INSERT INTO wayang VALUES ('', '".$tajuk."', '".$pengkelasan."', '".$sinopsis."', '".$image."', '".$hall."', '".$showtime."', '".$harga."')";
				$result = mysqli_query($con, $query);

				if ($result == true) {
					// paparan jika rekod wayang berjaya ditambahkan
					echo '<script type="text/javascript">alert("Wayang berjaya direkodkan. ")</script>';
				}
			} else {
				// paparan jika rekod wayang gagal ditambah
				echo '<script type="text/javascript">alert(Ralat! Sila masukkan maklumat wayang sekali lagi. ")</script>';
			}
		}
	?>
	<!-- PROSES TAMAT -->
</body>
</html>
