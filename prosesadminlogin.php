<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 06 : prosesadminlogin.php -->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';
// mulakan session
session_start();

// tetapkan pembolehubah bagi data yang dimasukkan dari input
$username = $_POST['username'];
$pwd = $_POST['pwd'];

// semak jika terdapat rekod di jadual pengurus
$query = mysqli_query($con,"SELECT * FROM pengurus WHERE namapengurus= '$username' AND pwd = '$pwd'");
if (mysqli_num_rows($query)) {
	$user = mysqli_fetch_array($query);
	// tetapkan session
	$_SESSION['user'] = $user['userid'];
	// hantar ke laman adminwyg.php
	header('location:adminwyg.php');
} else {
	// paparan jika gagal log masuk
	echo "<script>alert('Log Masuk Gagal!')</script>";
	// hantar ke laman login.php
	header("location:login.php");
}
?>
