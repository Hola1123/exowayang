<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 01 : dbconfig.php -->

<!-- sambungan ke pangkalan data -->
<!-- localhost, root, password, pangkalan data -->
<?php
$con = mysqli_connect("localhost", "root", "", "dbexo") or die("Error " . mysqli_error($con));
?>