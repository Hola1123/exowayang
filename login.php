<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 14 : login.php (log masuk) -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>EXO WAYANG</title>
	<!-- sambungan fail css -->
	<link rel="stylesheet" href="css/w3.css">
</head>
<body>
	<!-- USER INTERFACE -->
	<div class="w3-container w3-center" style="width:50%; margin: 0px auto;">
		<h4>LOG MASUK</h4>
		<div class="w3-border">
			<div class="w3-container w3-margin w3-green">
				<p>Log masuk untuk membuat tempahan tiket</p>
				<!-- BORANG LOG MASUK -->
				<form action="proseslogin.php" method="post">
					<input class="w3-input w3-center" type="text" name="username" placeholder="Nama_Pengguna">
					<input class="w3-input w3-center" type="password" name="pwd" placeholder="Katalaluan">
					<br>
					<button class="w3-btn w3-teal" type="submit" name="login">LOG MASUK</button>
					<hr>
					<h6><a href="daftar.php">Daftar Ahli Baru</a></h6> | <h6><a href="adminlogin.php">I am Administrator</a></h6>
				</form>
				<!-- TAMAT BORANG LOG MASUK -->
			</div>
		</div>
	</div>
	<!-- USER INTERFACE TAMAT -->
</body>
</html> 