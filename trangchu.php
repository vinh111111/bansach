<?php session_start();?>
<html>
    <head>
	    <title>Trang chủ</title>
        <link href="trangchu.css" rel="stylesheet" type="text/css"/>
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
        <div class="bangsanpham">
			<?php
				$sql="select*from sach";
				$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
				while($row=mysqli_fetch_assoc($ketqua)){
			?>
				<div class="sanpham">
				    <p class="hinhanh"><img src="<?php echo$row['hinhanh']?>"></p><br>
					<a style="text-decoration:none;color:black;" href="http://localhost/baithi/chitietsanpham.php?masach=<?php echo $row['masach']?>"><center><?php echo$row['tensach']; ?></center></a>
					<div class= "nhom1">
						<b class="gia"><?php echo$row['giaban']?>đ</b>
						<?php
							if(isset($_SESSION['TK'])){
						?>
								<button class="nut"><a style="text-decoration:none" href="http://localhost/baithi/giohang.php?masach=<?php echo$row['masach']?>"><font color="#ffffff">Thêm vào giỏ hàng</font></a></button>
						<?php
							}
							else{
						?>
								<button class="nut" onclick="alert('Chưa đăng nhập!Không thể thêm vào giỏ hàng!');"><font color="#ffffff">Thêm vào giỏ hàng</font></button>
						<?php
							}	
						?>
					</div>
				</div>
		    <?php
			    }
			?>
        </div>	
    </body>
</html>