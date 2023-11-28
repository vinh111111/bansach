<html>
	<head></head>
	<body>
		<?php
			if((isset($_GET['masach']))and(($_GET['username']))){
				$ms=$_GET['masach'];
				$tk=$_GET['username'];
				$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
				$sql="delete from giohang where username='$tk' and masach='$ms' and dactinh=''";
				$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
				header('Location:http://localhost/baithi/giohang.php');
			}
		?>
	</body>
</html>