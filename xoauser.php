<?php session_start();?>
<?php
	if((isset($_SESSION['TK']))and(isset($_SESSION['CV']))){
		$cv=$_SESSION['CV'];
		if($cv=="admin"){
			$username=$_GET['username'];
			$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
			$sql="delete from user where username='$username'";
			$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
			$sql="delete from khachhang where username='$username'";
			$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
			header('location:http://localhost/baithi/quanlyuser.php');
		}
		else{
			header('location:http://localhost/baithi/trangchu.php');
		}
	}
?>