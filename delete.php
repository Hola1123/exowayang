<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 22 : delete.php -->

<?php
	// fail sambungan ke pangkalan data
include 'dbconfig.php';
// mulakan session
session_start();

// dapatkan id dari url delete pada profile.php
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// hapus rekod pada jadual tempahan berdasarkan user
	mysqli_query($con, "DELETE FROM tempahan WHERE notempahan ='".$id."'");
	// paparan rekod berjaya dihapuskan dan kembali ke laman profile.php
	echo "<script>alert('Rekod berjaya dihapuskan');
	window.location='profile.php'</script>";
} else {
	// paparan rekod gagal dihapus dan kembali ke laman profile.php
	echo "<script>alert('Sila cuba sebentar lagi!');
	window.location='profile.php'</script>";
}
?>