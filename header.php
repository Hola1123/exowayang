<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 02 : header.php -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>EXO WAYANG</title>
	<!-- sambungan fail css -->
	<link rel="stylesheet" href="css/w3.css">
    </head>
    <body>
	<!-- function untuk besarkan size tulisan -->
	<div class="w3-header w3-blue">
		<font size="2"><b>&nbsp; &nbsp; Font :</b></font>
		<button class="w3-button" onclick="resizeText(-1)"><font size="2">A-</font></button>
		<button class="w3-button" onclick="resizeText(1)"><font size="2">A+</font></button>
		<script type="text/javascript">
		function resizeText(multiplier) {
			if (document.body.style.fontSize == "") {
				document.body.style.fontSize = "1.00em";
			}
			    document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
			}
		</script>
	</div>
	<!-- function untuk besarkan size tulisan tamat -->

	<!-- menu navigation -->
	<div class="w3-bar w3-blue">
		<a href="index.php" class="w3-bar-item w3-button">Exo Wayang</a>
		<a href="index.php" class="w3-bar-item w3-button">| Tayangan |</a>
		<a href="index.php" class="w3-bar-item w3-button">| Carian |</a>
		<?php
		// semak jika terdapat pengguna log masuk
		if (isset($_SESSION['user'])) {
			// mendapatkan rekod dari jadual pengguna
			$query = mysqli_query ($con, "SELECT * FROM pengguna WHERE userid = '".$_SESSION['user']."'");
			$user = mysqli_fetch_array($query); ?>

			<a href="logout.php" class="w3-bar-item w3-button w3-right">Log Keluar</a>
			<a href="profile.php" class="w3-bar-item w3-button w3-right">Tempahan Saya</a>
			<!-- paparkan nama pengguna -->
			<a href="#" class="w3-bar-item w3-button w3-right">Hello! <?php echo $user['username'];?></a>
			<?php
			} else { ?>
				<a href="login.php" class="w3-bar-item w3-button w3-right">Log Masuk</a>
			<?php
			}
		    ?>
		</div>
		<!-- menu navigation tamat -->
