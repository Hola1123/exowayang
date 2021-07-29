
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 10 : adminimport.php -->

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
		<a href="adminwyg.php" class="w3-bar-item w3-button">+Daftar</a>
		<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
	</div>
	<!-- menu navigation tamat -->

	<div class="w3-card-4 w3-center" style="width:40%; margin: 0px auto;">
		<h2>Import Data</h2>
		<hr>
		<!-- BORANG MUAT NAIK FAIL CSV -->
		<form class="w3-panel w3-pale-green" action="" method="post" enctype="multipart/form-data">
			<label>Fail CSV</label>
			<input class="w3-input w3-border" type="file" name="fail">
			<br>
			<button class="w3-btn w3-teal" type="submit" name="import">+IMPORT</button>
			<hr>
		</form>
		<!-- BORANG MUAT NAIK TAMAT -->
	</div>

	<!-- PROSES TAMBAH REKOD BARU DARI FAIL CSV -->
	<?php
	// jika butang import diklik
	if(isset($_POST['import'])) {
		// dapatkan fail yang dimuat naik
		if($_FILES['fail']['name']) {
			$filename = explode(".", $_FILES['fail']['name']);
			if($filename[1] == 'csv') {
				$handle = fopen($_FILES['fail']['temp_name'], "r");
				fgetcsv($handle);
				// selagi terdapat rekod dalam fail csv
				while($data = fgetcsv($handle)) {
					// tambah rekod baru ke jadual wayang
					$query = "INSERT INTO wayang VALUES('$data[0]','$data[1]','$data[2]','$data[3],'$data[4]','$data[5]','$data[6]','$data[7]')";
					mysqli_query($con, $query);
				}
				fclose($handle);
				// paparan rekod data dalam fail csv berjaya ditambah
				echo "<script>alert('Data berjaya direkodkan!');</script>";
			}
		}
	}
?>
<!-- PROSES TAMBAH REKOD TAMAT -->

</body>
</html>
