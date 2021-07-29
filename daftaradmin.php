
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah --> 
<!-- File 07 : daftaradmin.php -->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';

// tetapkan $error = false
$error = false;

/* PROSES TAMBAH REKOD PENGURUS */
// jika butang daftar diklik
if (isset($_POST['daftar'])) {
	// tetapkan nama pembolehubah dari input
	$namapengurus = $_POST['namapengurus'];
	$pwd = $_POST['pwd'];

	// nama pengurus hanya mengandungi huruf dan juga ruang
	if (!preg_match("/^[a-zA-Z ]+$/", $namapengurus)) {
		$error =true;
		$namapengurus_error = "Nama Pengurus hanya mengandungi huruf dan ruang (space)";
	}

	// kata laluan maksimum 12 aksara
	if(strlen($pwd) < 6) {
		$error = true;
		$pwd_error = "Kata Laluan minimum 6 aksara";
	}

	// kata laluan maksimum 12 aksara
	if(strlen($pwd) > 12) {
	$error = true;
	$pwd_error = "Kata Laluan maksimum 12 aksara";
}

if (!$error) {
	// tambah rekod baru ke jadual pengurus
	if (mysqli_query($con, "INSERT INTO pengurus VALUES ('', '".$namapengurus."', '".$pwd."')")) {
		// paparan jika gagal tambah rekod
		echo "<script>alert('Daftar berjaya! Sila log masuk.');</script>";
	} else {
		// paparan jika gagal tambah rekod
		echo "<script>alert('Ralat! Sila daftar semula.');</script>";
	}
}
}
/* PROSES TAMBAH REKOD PENGURUS TAMAT */
?>

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
    	<div class="w3-border">
    	<h4>DAFTAR MASUK</h4>
    	<div class="w3-container w3-margin w3-grey">
    		<p>Panel Pengurusan</p>
    		<!-- BORANG DAFTAR MASUK ADMIN -->
    		<form action="daftaradmin.php" method="post">
    			<input class="w3-input w3-center" type="text" name="namapengurus" required placeholder="Nama Pengurus" value="<?php if($error) echo $pwd; ?>">
    			<span style="color:red"><?php if (isset($namapengurus_error)) echo $namapengurus_error; ?></span>
    			<input class="w3-input w3-center" type="password" name="pwd" required placeholder="Kata Laluan" value="<?php if($error) echo $pwd; ?>">
    			<span style="color:red"><?php if (isset($pwd_error)) echo $pwd_error; ?></span>
    			<br>
    			<button class="w3-btn w3-black" type="submit" name="daftar">DAFTAR</button>
    			<hr>
    			<h6><a href="adminlogin.php">Log Masuk di sini</a></h6>
    		</form>
    		<!-- BORANG DAFTAR MASUK ADMIN TAMAT -->
    	</div>
    </div>
</div>
<!-- USER INTERFACE TAMAT -->
</body>
</html>
