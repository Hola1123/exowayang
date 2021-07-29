<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 04 : template.php -->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';
//mulakan session
session_start();

// sekatan pengguna - jika tiada pengguna yang log masuk
if(!isset($_SESSION['user'])) {
	// ke laman login.php
	header('location:login.php');
}
?>

<!-- sambungan pada header.php ----->
<?php include 'header.php'; ?>

<!-- <body> / isi kandungan ----->

<!-- <body> / isi kandungan tamat ----->

<!-- sambungan pada footer.php ----->
<?php include 'footer.php'; ?>