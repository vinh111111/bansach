<?php session_start();?>
<html>
    <head>
	    <title>Quản lý user</title>
        <link href="quanlyuser.css" rel="stylesheet" type="text/css"/>
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
		<div class="khung">
			<?php	
				if(isset($cv)){
					if($cv=="admin"){		
						$sql="select*from user where chucvu!='admin'";
						$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
						while($row=mysqli_fetch_assoc($ketqua)){
							$username=$row['username'];
							$sql1="select*from khachhang where username='$username'";
							$kq=mysqli_query($cn,$sql1)or die("Kết nối thất bại!");
							while($row1=mysqli_fetch_assoc($kq)){
								$ten=$row1['tenkh'];
						?>			
								<div class="khunghienthi">
									<div class="nhom">
										<div class="tenkhachhang">
											<a>Tên user: <?php echo $ten;?></a>
										</div>
										<div class="nut">
											<button><a style="text-decoration:none" href="http://localhost/baithi/capnhatuser.php?username=<?php echo $username; ?>"><font color="#ffffff">Cập nhật</font></a></button>
											<button><a style="text-decoration:none" href="http://localhost/baithi/xoauser.php?username=<?php echo $username; ?>"><font color="#ffffff">Xóa</font></a></button>
										</div>
									</div>
								</div>
						<?php				
							}
						}
					}
				}
			?>
		</div>
	</body>
</html>