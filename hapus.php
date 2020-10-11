<?php 
include 'config.php';
$user = $_GET['username'];
mysqli_query($konek,"DELETE FROM users WHERE username='$user'")or die(mysqli_error());
 
header("location:nonaktif.php?pesan=hapus");
?>