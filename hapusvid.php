<?php
$url = $_GET['url'];
mysqli_query($konek,"DELETE FROM videos WHERE url='$url'")or die(mysqli_error());
 
header("location:hapusvideo.php?pesan=hapus");

?>