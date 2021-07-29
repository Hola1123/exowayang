
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 19 :- resit.php -->

<?php
// fail sambungn ke pangkalan data 
include 'dbconfig.php';
// mulakan session
session_start();

// sekatan pengguna - jika tiada pengguna yang log masuk 
if(!isset($_SESSION['user'])) {
	// ke laman login.php
	header('location:login.php');
}

// semak rekod data pada jadual tempahan berdasarkan no tempahan
$query = mysqli_query($con, "SELECT * FROM tempahan WHERE notempahan = '".$_GET['id']."'");
$row = mysqli_fetch_array($query);
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
	<hr>
	<?php
	// semak rekod data pada jadual wayang dan tempahan berdasarkan no tempahan
	$query_run = mysqli_query($con, "SELECT wayang. *, tempahan.* FROM wayang INNER
JOIN tempahan ON wayang.idwyg = tempahan.idwyg WHERE notempahan = 
'".$row['notempahan']."'");
	$show = mysqli_fetch_array($query_run);
    ?>
    <div class="w3-content w3-border" style="width:50%; margin: 0px auto;">
	  <div class="w3-wrap">
		<div class="w3-center">
			<h1>e x o  w a y a n g</h1>
		</div>
		<h6>No Tempahan</h6>
		<h5><b><?php echo $row['notempahan']?></b></h5>
		<h3><?php echo $show['tajuk']?></h3>
		<h4><?php echo $show['hall']?></h4>
		<h5><?php echo $show['masatayangan']?></h5>
		<h5><?php echo date('d-M-Y', strtotime($row['tarikhtayangan']))?></h5>
		<h6>Bil Tiket</h6>
		<h6><?php echo $row['biljualan']?></h6>
		<h6>Jum Bayaran</h6>
		<h6>RM <?php echo $row['jumbyrn']?></h6>
		 </div>
		</div>
		<hr>
		<center>
			<!-- butang untuk mencetak -->
			<input type="button" class="w3-btn w3-khaki" value="PRINT" 
		onClick="window.print()">
			<!-- butang untuk kembali ke menu utama -->
			<a href="index.php"><button class="w3-btn w3-khaki">HOME</button></a>
		</center>
		<!-- USER INTERFACE TAMAT -->
	</body>
	</html>
