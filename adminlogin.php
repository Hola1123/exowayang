<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 05 : adminlogin.php -->


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
    	<div class="w3-container w3-center" style="width:50%; margin: 0px auto;">
    	<h4>LOG MASUK</h4>
    	<div class="w3-border">
    		<div class="w3-container w3-margin w3-grey">
    			<p>|ADMIN|</p>
    			<!-- BORANG LOG MASUK ADMIN -->
    			<form action="prosesadminlogin.php" method="post">
    				<input class="w3-input w3-center" type="text" name="username" placeholder="Username">
    				<input class="w3-input w3-center" type="password" name="pwd" placeholder="Katalaluan">
    				<br>
    				<button class="w3-btn w3-black" type="submit" name="login">LOG MASUK</button>
    				<hr>
    				<h6><a href="daftaradmin.php">Daftar</a></h6>
    			</form>
    			<!-- BORANG LOG MASUK ADMIN TAMAT -->
    		</div>
    	</div>
    </div>
    <!-- USER INTERFACE TAMAT -->
</body>
</html>