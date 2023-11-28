<html>
	<head></head>
	<body>
		<?php
			if((isset($_GET['masach']))and(($_GET['username']))){
				$ms=$_GET['masach'];
				$tk=$_GET['username'];
				$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
				$sql="select*from giohang where username='$tk' and masach='$ms' and dactinh=''";
				$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
				while($row=mysqli_fetch_assoc($ketqua)){
					$sl=$row['soluong'];
				}
				$sl=$sl+1;
				$sql="update giohang set soluong='$sl' where username='$tk' and masach='$ms' and dactinh=''";
				$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
				header('Location:http://localhost/baithi/giohang.php');
			}
		?>
	</body>
</html>