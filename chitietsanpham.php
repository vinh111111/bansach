<?php session_start();?>
<html>
    <head>
	    <title>Chi tiết sản phẩm</title>
        <link href="chitietsanpham.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<ul>
			<li><a href="http://localhost/baithi/trangchu.php">Trang chủ</a></li>
			<?php
				$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
				if((isset($_SESSION['TK']))and(isset($_SESSION['CV']))){
					$tk=$_SESSION['TK'];
					$cv=$_SESSION['CV'];
					$sql="select*from khachhang where username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
					while($row=mysqli_fetch_assoc($ketqua)){
						$tenkh=$row['tenkh'];
					}
			?>
					<li><a href="http://localhost/baithi/trangcanhan.php"><?php if(empty($tenkh)){echo $tk;}else{echo $tenkh;}?></a></li>
			<?php
			    }
				else{
			?>
				<li><a href="http://localhost/baithi/dangnhap.php">Đăng nhập</a></li>	
			<?php
				}
			?>
			<li><a href="http://localhost/baithi/giohang.php">Giỏ hàng</a></li>
			<?php	
				if(isset($cv)){
					if($cv=="admin"){		
			?>
						<li><a href="http://localhost/baithi/themsanpham.php">Thêm sản phẩm</a></li>
						<li><a href="http://localhost/baithi/quanlyuser.php">Quản lý user</a></li>
			<?php
					}
				}
			?>
		</ul>
		<?php
			if(isset($_GET['masach'])){
				$ms=$_GET['masach'];
				$sql="select*from sach where masach='$ms'";
				$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
				while($row=mysqli_fetch_assoc($ketqua)){
					$tensach=$row['tensach'];
					$hinhanh=$row['hinhanh'];
					$giaban=$row['giaban'];
					$chitiet=$row['chitiet'];
				}
			}
		?>
		<div class="khunghienthi1">
			<div class="hinhanh">
				<img src="<?php echo$hinhanh?>"><br>
			</div>
			<div class="chitiet">
				<p class="tensach"><?php echo $tensach ?></p>
				<p class="gia"><?php echo $giaban ?>VNĐ</p>
				<div class="soluong">
					<form action="" method="post" >
						<input type="number" min=1 name="sl"value="<?php if(isset($_POST['sl'])){$soluong=$_POST['sl'];echo"$soluong";}else{$soluong=1;echo"$soluong";}?>"/>
						<button type="submit" name="tsp">Thêm vào giỏ hàng</button>
					</form>
				</div><br>
				<?php
				if(isset($cv)){
					if($cv=="admin"){
				?>
						<div class="nhom2">	
							<button class="nut1"><a style="text-decoration:none" href="http://localhost/baithi/capnhatsanpham.php?masach=<?php echo$ms;?>"><font color="#ffffff">Cập nhật</font></a></button>
							<button class="nut2"><a style="text-decoration:none" href="http://localhost/baithi/xoasanpham.php?masach=<?php echo$ms;?>"><font color="#ffffff">Xóa</font></a></button>
						</div>
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="khunghienthi2">
			<h1>Giới thiệu sách:</h1>
			<p><?php echo $chitiet ?></p>
		</div>
		<?php
			if(isset($_POST['tsp'])){
				if(isset($tk)){
					$sql="select*from giohang where (masach='$ms')and(dactinh='')and(username='$tk')";
					$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
					$dem=mysqli_num_rows($ketqua);
					if($dem>0){
		?>
						<script>
							alert('Sản phẩm đã có trong giỏ hàng!Không thể thêm vào giỏ hàng nữa!');
						</script>
		<?php
					}
					else{
						$sql="insert into giohang values ('$tk','$ms','$tensach','$soluong','$giaban','$hinhanh','','')";
						$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
						header('Location:http://localhost/baithi/giohang.php');
					}
				}
				else{
		?>
						<script>
							alert('Bạn chưa đăng nhập!Không thể thêm vào giỏ hàng nữa!');
						</script>
		<?php			
				}
			}		
		?>
	</body>
</html>