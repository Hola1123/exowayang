
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 21 :- profile.php -->

<?php
// file sambungan ke pangkalan data
include 'dbconfig.php';
// mulakan session
session_start();

// sekataan pengguna - jika tiada pengguna yang log masuk
if(!isset($_SESSION['user'])) {
	// ke laman login.php
	header('location:login.php');
}
?>

<!-- sambungan pada header.php -->
<?php include 'header.php'; ?>

<!-- <body> / isi kandungan ----->
	<div class="w3-content">
		<div class="w4-wrap">
			<p>Tempahan</p>

			<table class="w3-table w3-border w3-centered">
				<tr>
					<th>Bil.</th>
					<th>No Tempahan</th>
					<th>Batal Tempahan</th>
				</tr>

				<?php
				// semak rekod pada jadual tempahan berdasarkan user
				$query = mysqli_query($con, "SELECT * FROM tempahan WHERE userid = '".$_SESSION['user']."'");
				if (mysqli_num_rows($query) == 0) {
					// paparan jika tiada rekod data dalam jadual
					echo '<tr><td>Tidak ada data dijumpai!</td></tr>';
				} else {
					// tetapkan nombor = 1
					$no = 1;
					// selagi terdapat rekod dalam jadual
					while($row = mysqli_fetch_array($query)) {
						echo '<tr>';
						echo '<td>'.$no.'</td>';
						echo '<td><a href="resit.php?id='.$row['notempahan'].'">'.$row['notempahan'].'</a></td>';
						echo '<td><a href="delete.php?id='.$row['notempahan'].'">BATAL</a></td>';
						echo '</tr>';
						// membuat nombor dalam urutan
						$no++;
					}
				}
			?>
		</table>
	</div>
</div>
<!-- <body> / isi kandungan tamat -->

	<!-- sambungan pada footer.php -->
	<?php include 'footer.php'; ?>