<?php session_start();?>
<html>
	<head></head>
	<body>
		<?php
			if(isset($_GET['masach'])){
				$ms=$_GET['masach'];
				if(isset($_SESSION['CV'])){
					$cv=isset($_SESSION['CV']);
					if($cv=="admin"){
						$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
						$sql="delete from sach where masach='$ms'";
						$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
						header('Location:http://localhost/baithi/trangchu.php');
					}
					else{
						header('Location:http://localhost/baithi/trangchu.php');
					}
				}
			}
		?>
	</body>
</html>