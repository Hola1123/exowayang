<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 13 : index.php (menu utama)-->

<?php
// fail sambungan ke pangkalan data
include 'dbconfig.php';
// mulakan session
session_start();

// tetapkan nama pembolehubah untuk mendapatkan tarikh semasa
$today = date('D, d M Y');
?>

<!-- sambungan pada header.php -->
<?php include 'header.php'; ?>

<!-- <body> / isi kandungan -->
	<!-- USER INTERFACE -->
	<div class="w3-container">
		 <div class="w3-content">
		 	<div class="w3-content-top">
		 		<h2><marquee><p style="font-family:courier" class="w3-center">E X O  W A Y A N G</p></marquee></h2>

		 		<h4>Now Showing | <?php echo $today;?></h4>

		 		<?php
		 		// mendapatkan maklumat / rekod dari jadual wayang
		 		$query = mysqli_query($con, "SELECT * FROM wayang");

		 		// selagi terdapat rekod dalam jadual wayang
		 		while ($row=mysqli_fetch_array($query)) { ?>
		 			<div class="w3-panel w3-third">
		 				<div class="w3-card">
		 					<div class="w3-display-container w3-hover-opacity">
		 						<!-- paparan gambar berserta link ke maklumat lanjut wayang -->
		 						<a href="wayang.php?id=<?php echo $row['idwyg'];?>"><img width="360" height="240" src="img/<?php echo $row['image'];?>" style="width:100%"></a>
		 						<div class="w3-display-middle w3-display-hover w3-small">
		 							<a href="wayang.php?id=<?php echo $row['idwyg'];?>"><button class="w3-button w3-teal"><?php echo $row['tajuk'];?> | Tempah Sekarang</button></a>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 			<?php
		 		}
		 	?>
		 </div>
		 </div>
		</div>
		<!-- USER INTERFACE TAMAT -->
		<!-- <body> / isi kandungan tamat ----->

			<!-- sambungan pada footer.php ----->
			<?php include 'footer.php'; ?>
			