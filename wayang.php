
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 17 : wayang.php -->

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
	<div class="w3-content">
		<div class="w3-wrap">
			<div class="w3-card-2 w3-center">
				<?php 
				// dapatkan rekod data pada jadual wayang berdasarkan id wayang
				$query = mysqli_query($con, "SELECT * FROM wayang WHERE idwyg = '".$_GET['id']."'");
				$row = mysqli_fetch_array($query);
			?>
			<p></p>
			<table class="w3-table">
				<td><img width="360" height="240" src="img/<?php echo $row['image'];?>" /></td>
				<td>
					<h3><?php echo $row['tajuk']; ?></h3>
					<b><?php echo $row['pengkelasan']; ?></b> <br><br>
					Sinopsis<br> <?php echo $row['sinopsis']?> <br>
					<hr>
					<h4><b><?php echo $row['hall']?></b></h4>
					<button class="w3-button w3-border"><?php echo $row['masatayangan']?></button>
					<h5>Harga Tiket : <b><?php echo "RM " .$row['harga']?></b></h5>
					<hr>
				</td>
			</table>
		</div>
		<div class="w3-clear"></div>
		<hr>
		<table class="w3-table w3-border w3-centered" style="width:60%; margin: 0px auto;">
			<tr>
				<td>Tarikh</td>
				<td>
					<?php
					// tetapkan nama pembolehubah bagi tarikh semasa
					$date = date('Y-m-d');
				?>
				<form action="tempahan.php" method="post">
					<input type="date" name="date" min="<?php echo $date ?>" max="<?php echo date('Y-m-d',strtotime($date . "+6 days")) ?>" style="text-align:center" required>
				</td>
			</tr>
			<tr>
				<td>Bilangan tiket</td>
				<td>
					<input type="number" name="biltiket" max="6" min="0" style="text-align:center" required>
					<input type="hidden" name="idwyg" value="<?php echo $row['idwyg']; ?>">
					<input type="hidden" name="price" value="<?php echo $row['harga']; ?>">
				</td>
			</tr>
		</tr>
				<td colspan="2">
					<a href="tempahan.php?movie=<?php echo $row['idwyg'];?>"><button class="w3-button w3-green" style="width:100%">TEMPAH SEKARANG</button></a>
				</form>
			</td>
		</tr>
	</table>
</div>
</div>
<!-- USER INTERFACE TAMAT -->
<!-- <body> / isi kandungan tamat ----->

	<!-- sambungan pada footer.php ----->
	<?php include 'footer.php'; ?>
