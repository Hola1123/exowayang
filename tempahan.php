
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<! File 18 : tempahan.php -->

	<?php
	// fail sambungan ke pangkalan data
	include 'dbconfig.php';
	// mulakan session
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
	<?php
	// tetapkan nama pembolehubah bagi dapatan data input
	$userid = $_SESSION['user'];
	$idwyg = $_POST['idwyg'];
	$tarikhtayangan = $_POST['date'];
	$biltiket = $_POST['biltiket'];
	$harga = $_POST['price'];

	// rumus mengira jumlah bayaran harga tiket (harga x bil. tiket)
	$jumbyrn = $harga * $biltiket;

	// menjana nombor secara rawak
	$notempahan = "PIX".rand(1000000,9999999);

	// tambah rekod baru ke jadual tempahan
	mysqli_query($con, "INSERT INTO tempahan VALUES('".$notempahan."', '".$idwyg."', '".$userid."', '".$tarikhtayangan."', '".$biltiket."', '".$jumbyrn."')")
?>

<!-- USER INTERFACE -->
<div class="w3-content">
	<div class="w3-wrap">
		<div class="w3-panel w3-teal">
			<p>Terima Kasih Atas Tempahan Anda</p>
		</div>
		<table class="w3-table w3-border">
			<tr>
				<td>Jumlah Tiket Ditempah </td>
				<td><b><?php echo $biltiket;?></b></td>
			</tr>
			<tr>
				<td>Harga Tiket</td>
				<td><b><?php echo "RM ".number_format($jumbyrn, 2); ?></b></td>
			</tr> 
		</table>
		<hr>
		<a href="resit.php?id=<?php echo $notempahan;?>"><button class="w3-btn w3-green">|RESIT EXO WAYANG|</button></a>
	</div>
</div>
<!-- USER INTERFACE TAMAT -->
<!-- <body> / isi kandungan tamat -->

	<!-- sambungan pada footer.php -->
	<?php include 'footer.php'; ?>
