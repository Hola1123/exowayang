
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 11 : senaraiwyg.php -->

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

		<br>
		<div class="w3-container w3-border w3-center">
			<div class="w3-panel w3-pale-green">
				<p>Senarai Wayang @ EXO WAYANG</p>
			</div>
			<hr>

			<!-- paparan rekod data semua wayang -->
			<table class="w3-table w3-border w3-centered" border="1">
				<tr>
					<th>Bil</th>
					<th>Tajuk</th>
					<th>Pengkelasan</th>
					<th>Sinopsis</th>
					<th>Poster</th>
					<th>Hall</th>
					<th>Masa Tayangan</th>
					<th>Harga Tiket</th>
					<th>Kemaskini</th>
				</tr>
				<tr>
					<?php
					// mendapatkan rekod data dari jadual wayang
					$sql = mysqli_query($con, "SELECT * FROM wayang");
					if (mysqli_num_rows($sql) == 0) {
						echo '<tr><td colspan="8">Tiada rekod data dijumpai!</td></tr>';
					} else {
						$no = 1;
						while ($row = mysqli_fetch_array($sql)) {
							echo '<tr>';
							echo '<td>'.$no.'</td>';
							echo '<td>'.$row['tajuk'].'</td>';
							echo '<td>'.$row['pengkelasan'].'</td>';
							echo '<td>'.$row['sinopsis'].'</td>';
							echo '<td><img width="50" height="50" src="img/'.$row['image'].'"</td>';
							echo '<td>'.$row['hall'].'</td>';
							echo '<td>'.$row['masatayangan'].'</td>';
							echo '<td>'.$row['harga'].'</td>';
							// link untuk kemaskini maklumat wayang
							echo '<td><a href="kemaskiniwyg.php? idwyg='.$row['idwyg'].'">KEMASKINI</a></td>';
							echo '<tr>';
							// membuat running number
							$no++;
						}
					}
					?>
					</tr>
					</table>
					<!-- tamat paparan senarai wayang -->
					<br>
				</div>
			</body>
			</html>
