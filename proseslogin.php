<?php 
session_start();
include 'config.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($konek,"select * from users where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);
echo $cek;

     if($cek > 0){
 
	$data = mysqli_fetch_assoc($query);
 
	// cek jika user login sebagai admin
	if($data['level']=="user"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard admin
		header("location:halaman_user.php");
	}
		else if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
	}
		else{
 
		// alihkan ke halaman login kembali
		header("location:index.html?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>