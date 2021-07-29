
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 12 : kemaskiniwyg.php -->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';
// mulakan session
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
		<a herf="logout.php" class="w3-bar-item w3-button w3-right">Logout</a>
		</div>
		<!-- menu navigation tamat -->

		<?php
		// mendapatkan idwyg dari url senaraiwyg.php
		if (isset($_GET['idwyg'])) {
			$id = $_GET['idwyg'];

			$query = mysqli_query($con, "SELECT * FROM wayang WHERE idwyg = '".$id."' ");
			$row = mysqli_fetch_array($query);
		}
	?>

	<div class="w3-content w3-section w3-center">
		<h2>Kemaskini Maklumat Wayang</h2>
		<hr>
		<!-- BORANG KEMASKINI MAKLUMAT WAYANG -->
		<form action="kemaskiniwyg.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="up_idwyg" value="<?php echo $row['idwyg'];?>">
			<label>Tajuk</label>
			<input class="w3-input w3-border" type="text" name="up_tajuk" value="<?php echo $row['tajuk'];?>">
			<label>Pengkelasan</label>
			<input class="w3-input w3-border" type="text" name="up_pengkelasan" value="<?php echo $row['pengkelasan'];?>">
			<label>Sinopsis</label>
			<input class="w3-input w3-border" type="text" name="up_sinopsis" value="<?php echo $row['sinopsis'];?>">
			<label>Poster</label> <br>
			<img width="50" height="50" src="img/<?php echo $row['image'];?>">
			<input class="w3-input w3-border" type="file" name="up_image">
			<label>Hall</label>
			<input class="w3-input w3-border" type="text" name="up_hall" value="<?php echo $row['hall'];?>">
			<label>Masa Tayangan</label> 
			<input class="w3-input w3-border" type="text" name="up_showtime" value="<?php echo $row['masatayangan'];?>">
			<label>Harga Tiket</label>
			<input class="w3-input w3-border" type="text" name="up_harga" value="<?php echo $row['harga'];?>">
			<br>
			<button class="w3-btn w3-teal" type="submit" name="kemaskini">KEMASKINI</button>
			<hr>
		</form>
	</div>

	<!-- PROSES KEMASKINI REKOD MAKLUMAT WAYANG -->
	<?php
	// jika butang kemaskini diklik
	if (isset($_POST['kemaskini'])) {
		// memasukkan gambar yang dimuat naik ke folder img
		$target_path = "img/";
		$target_path = $target_path . basename ($FILES['up_image']['name']);

		if(move_uploaded_file($_FILES['up_image']['tmp_name'], $target_path)) {
			// tetapkan nama pembolehubah
			$up_image = basename($_FILES['up_image']['name']);
			$up_idwyg = $_POST['up_idwyg'];
			$up_tajuk = $_POST['up_tajuk'];
			$up_pengekelasan = $_POST['up_pengkelasan'];
			$up_sinopsis = $_POST['up_sinopsis'];
			$up_hall = $_POST['up_hall'];
			$up_showtime = $_POST['up_showtime'];
			$up_harga = $_POST['up_harga'];

		// kemaskini rekod dalam jadual wayang
			$updateqry = mysqli_query($con, "UPDATE wayang SET idwyg='".$up_idwyg."', tajuk='".$up_tajuk."', pengkelasan='".$up_pengekelasan."', sinopsis='".$up_sinopsis."', image='".$up_image."', hall='".$up_hall."', masatayangan='".$up_showtime."', harga='".$up_harga."' WHERE idwyg ='".$up_idwyg."'");

			// paparan rekod berjaya dikemaskini
			echo "<script>alert('Maklumat wayang berjaya dikemaskini')
			window.location = 'senaraiwyg.php'</script>";
		}
	}
?>
<!-- PROSES TAMAT -->
</body>
</html>