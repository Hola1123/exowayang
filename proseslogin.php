<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 15 : proseslogin.php -->

<?php
	// fail sambungan ke pangkalan  data
include 'dbconfig.php';
// mulakan session
session_start();

// tetapkan nama pembolehubah untuk data
$username = $_POST['username'];
$pwd = $_POST['pwd'];

// semak jika terdapat rekod dalam jadual pengguna
$query = mysqli_query($con, "SELECT * FROM pengguna WHERE username = '$username' AND pwd = '$pwd'");
if (mysqli_num_rows($query)) {
	$user = mysqli_fetch_array($query);

	// tetapkan $_SESSION
	$_SESSION['user'] = $user['userid'];
	// ke laman utama
	header('location:index.php');
} else {
	// paparan jika gagal log masuk
	echo "<script>alert('Log Masuk Gagal!')</script>";
	// ke laman log masuk
	header("location:login.php");
}
?>