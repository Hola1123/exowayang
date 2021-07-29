
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 16 : daftar.php -->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';

/* PROSES TAMBAH REKOD BARU KE JADUAL PENGGUNA */
// tetapkan $error = false
$error = false;

// jika butang daftar diklik
if (isset($_POST['daftar'])) {
	// tetapkan nama pembolehubah
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$emel = $_POST['emel'];
	$notel = $_POST['notel'];
	$pwd = $_POST['pwd'];

	// input hanya untuk huruf dan ruang
	if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
		$error = true;
		$username_error = "Username mesti mengandungi hanya huruf dan ruang (space)";
	}

	// katalaluan minimum 6 aksara
	if(strlen($pwd) < 6) {
		$error = true;
		$pwd_error = "Kata Laluan minimum 6 aksara";
	}

	// katalaluan maksimum 12 aksara
	if(strlen($pwd) > 12) {
		$error = true;
		$pwd_error = "Kata Laluan maksimum 12 aksara";
	}

	if (!$error) {
		// tambah rekod baru ke jadual pengguna
		if (mysqli_query($con, "INSERT INTO pengguna VALUES ('', '".$username."', '".$nama."', '".$emel."', '".$notel."', '".$pwd."')")) {
			// paparan daftar ahli berjaya
			echo "<script>alert('Daftar ahli berjaya! Sila log masuk. ');</script>";
		} else {
			// paparan daftar ahli gagal
			echo"<script>alert('Ralat! Sila daftar semula. ');</script>";
		}
	}
}
/* PROSES TAMBAH REKOD BARU TAMAT */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>E X O  W A Y A N G</title>
	<!-- sambungan fail css -->
	<link rel="stylesheet" href="css/w3.css">
</head>
<body>
	<!-- USER INTERFACE -->
	<div class="w3-container w3-center" style="width:50%; margin: 0px auto;">
		<h4>DAFTAR MASUK</h4>
		<div class="w3-border">
			<div class="w3-container w3-margin w3-khaki">
				<p>Sila daftar untuk menjadi ahli EXOWAYANG</p>
				<!-- BORANG DAFTAR MASUK PENGGUNA -->
				<form action="daftar.php" method="post">
					<input class="w3-input w3-center" type="text" name="username" required placeholder="Username" value="<?php if($error) echo $username; ?>">
					<span style="color:red"><?php if (isset($username_error)) echo $username_error; ?></span>
					<input class="w3-input w3-center" type="text" name="nama" required placeholder="Nama Penuh">
					<input class="w3-input w3-center" type="text" name="emel" required placeholder="Emel">
					<input class="w3-input w3-center" type="text" name="notel" required placeholder="No. Telefon">
					<input class="w3-input w3-center" type="password" name="pwd" required placeholder="Katalaluan" value="<?php if($error) echo $pwd; ?>">
					<span style="color:red"><?php if (isset($pwd_error)) echo $pwd_error; ?></span>
					<br>
					<button class="w3-btn w3-red" type="submit" name="daftar">DAFTAR</button>
					<hr>
					<h6><a href="login.php">Log Masuk di sini </a></h6>
				</form>
				<!-- BORANG DAFTAR MASUK TAMAT -->
			</div>
		</div>
	</div>
	<!-- USER INTERFACE TAMAT -->
</body>
</html>
