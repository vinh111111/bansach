<?php session_start();?>
<html>
    <head>
	    <title>Trang cá nhân</title>
        <link href="trangcanhan.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<ul>
			<li><a href="http://localhost/baithi/trangchu.php">Trang chủ</a></li>
			<?php
				$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
				if(isset($_SESSION['TK'])){
					$tk=$_SESSION['TK'];
					$cv=$_SESSION['CV'];
					$sql="select*from khachhang where username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
					while($row=mysqli_fetch_assoc($ketqua)){
						$tenkh=$row['tenkh'];
						$sdt=$row['sdt'];
						$diachi=$row['diachi'];
					}
					$sql="select*from user where username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
					while($row=mysqli_fetch_assoc($ketqua)){
						$password=$row['password'];
						$avatar=$row['avatar'];
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
		<form action="" method="post" enctype="multipart/form-data">
			<div class="khung">
				<div class="hinhanh">
					<img src="<?php echo $avatar;?>"/>
				</div>
				<div class="khungnhap">
					<label>Tài khoản</label><br>
					<input type="text" disabled value="<?php echo$tk?>"/>
					<label for="t">Tên</label><br>
					<input type="text" name="tenkh" id="t" value="<?php if(isset($_POST['tenkh'])){$tenkh=$_POST['tenkh'];echo"$tenkh";}else{echo$tenkh;}?>"/>
					<label for="m">Mật khẩu</label><br>
					<input type="text" name="matkhau" id="m" value="<?php if(isset($_POST['matkhau'])){$password=$_POST['matkhau'];echo"$password";}else{echo$password;}?>"/>
					<label for="d">Địa chỉ</label><br>
					<input type="text" name="diachi" id="d" value="<?php if(isset($_POST['diachi'])){$diachi=$_POST['diachi'];echo"$diachi";}else{echo$diachi;}?>"/>
					<label for="s">Số điện thoại</label><br>
					<input type="text" name="sdt" id="s" value="<?php if(isset($_POST['sdt'])){$sdt=$_POST['sdt'];echo"$sdt";}else{echo$sdt;}?>"/>	
					<label>Avatar</label><br>
					<input type="file" name="file_upload"/>
				</div>
				<div class="nut1">
					<button type="submit" name="capnhat">Cập nhật</button><br>
				</div>
				<hr>
				<div class="nut2">
					<button type="submit" name="dangxuat">Đăng xuất</button><br>
				</div>
			</div>
		</form>
		<?php
			if(isset($_POST['capnhat'])){
				$hinhanh=$_FILES['file_upload'];
				$tenfile=$hinhanh['name'];
				if(empty($tenfile)){
					$sql="UPDATE user SET password='$password',avatar='$avatar' WHERE username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Cập nhật thất bại!");
					$sql="UPDATE khachhang SET tenkh='$tenkh',sdt='$sdt',diachi='$diachi' WHERE username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Cập nhật thất bại!");
					header('Location:http://localhost/baithi/trangcanhan.php');
				}
				else{		
					$dgdan="img/".$tenfile;
					$sql="UPDATE user SET password='$password',avatar='$dgdan' WHERE username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Cập nhật thất bại!");
					$sql="UPDATE khachhang SET tenkh='$tenkh',sdt='$sdt',diachi='$diachi' WHERE username='$tk'";
					$ketqua=mysqli_query($cn,$sql)or die("Cập nhật thất bại!");
					move_uploaded_file($hinhanh['tmp_name'],"img/".$tenfile);
					header('Location:http://localhost/baithi/trangcanhan.php');
				}
			}
			if(isset($_POST['dangxuat'])){
				session_destroy();
				header('Location:http://localhost/baithi/trangchu.php');
			}
		?>
	</body>
</html>