
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 20 : carian.php -->

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
	<!-- USER INTERFACE -->
	<hr>
	<div class="w3-container w3-center" style="width:50%; margin: 0px auto;">
		<div class="w3-border">
			<div class="w3-container w3-margin w3-blue">
				<!-- BORANG CARIAN -->
				<form action="carian.php" method="post" enctype="multipart/form-data">
					<p></p>
					<label>Carian</label>
					<input class="w3-input" type="text" name="search">
					<br>
					<input class="w3-btn w3-white" type="submit" name="cari" value="CARI">
					<p></p>
				</form>
				<!-- BORANG CARIAN TAMAT -->
			</div>
		</div>
	</div>
	<hr>
	<!-- USER INTERFACE TAMAT -->

	<!-- PROSES MEMBUAT CARIAN -->
	<?php
	// jika butang cari diklik
	if (isset($_POST['cari'])) {
		// tetapkan nama pembolehubah untuk kotak input carian
		$search = $_POST['search'];

		// semak rekod dari jadual wayang
		$query = "SELECT * FROM wayang WHERE tajuk LIKE '%".$search."%'";
		$result = mysqli_query($con, $query);
		$num_result = mysqli_num_rows($result);

		echo "<center>";
		echo '<p>Bilangan yang dijumpai: '.$num_result. '</p>';

		// paparan rekod carian
		for ($i=0); $i < $num_result; $i++){
	$row = mysqli_fetch_array($result);
	echo '<p><strong>'.($i+1).'. ';
	echo htmlspecialchars(stripcslashes($row['tajuk']));
	echo '</strong><br /> Pengkelasan : ';
	echo stripcslashes($row['pengkelasan']);
	echo '</strong><br /> Masa Tayangan : ';
	echo stripcslashes($row['masatayangan']);
	<br>
	<a href="about.php?id=<?echo $row['idwyg'];?>"><button class="w3-button w3-green">TEMPAH SEKARANG</button></a>
	<?php
	echo '</p>';
}
echo '</center>';
?>
}
<!-- PROSES CARIAN TAMAT -->

<!-- <body> / isi kandungan tamat ----->

<!-- sambungan pada footer.php ----->
<?php include 'footer.php'; ?>
