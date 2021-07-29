<!-- Sistem Pengurusan Pembelian Tiket Wayang -->
<!-- Disediakan oleh :- m.husnizaim@sma_al-irsyadiah -->
<!-- File 08 : logout.php -->

<!-- hapuskan session dan kembali ke index.php -->
<?php
session_start();
session_destroy();
header('location:index.php');
?>