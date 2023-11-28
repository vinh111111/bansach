<?php session_start();?>
<html>
    <head>
	    <title>Cập nhật sản phẩm</title>
        <link href="capnhatsanpham.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<ul>
			<li><a href="http://localhost:8080/baithi/trangchu.php">Trang chủ</a></li>
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
					<li><a href="http://localhost:8080/baithi/trangcanhan.php"><?php if(empty($tenkh)){echo $tk;}else{echo $tenkh;}?></a></li>
			<?php
			    }
				else{
			?>
				<li><a href="http://localhost:8080/baithi/dangnhap.php">Đăng nhập</a></li>	
			<?php
				}
			?>
			<li><a href="http://localhost:8080/baithi/giohang.php">Giỏ hàng</a></li>
			<?php	
				if(isset($cv)){
					if($cv=="admin"){		
			?>
						<li><a href="http://localhost:8080/baithi/themsanpham.php">Thêm sản phẩm</a></li>
						<li><a href="http://localhost:8080/baithi/quanlyuser.php">Quản lý user</a></li>
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
					$loaisach=$row['loaisach'];
					$soluong=$row['soluong'];
					$gia=$row['giaban'];
					$hinhanh=$row['hinhanh'];
					$chitiet=$row['chitiet'];
				}
			}		
		?>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="khung">
				<div class="hinhanh">
					<img src="<?php echo $hinhanh;?>"/>
				</div>
				<div class="khungnhap">
					<label>Mã sách</label><br>
					<input type="text" disabled value="<?php echo$ms?>"/>
					
					<label for="t">Tên sách</label><br>
					<input type="text" name="tensach" id="t" value="<?php if(isset($_POST['tensach'])){$tensach=$_POST['tensach'];echo"$tensach";}else{echo$tensach;}?>"/>
					
					<label for="m">Loại sách</label><br>
					<input type="text" name="loaisach" id="m" value="<?php if(isset($_POST['loaisach'])){$loaisach=$_POST['loaisach'];echo"$loaisach";}else{echo$loaisach;}?>"/>
					
					<label for="d">Số lượng</label><br>
					<input type="text" name="soluong" id="d" value="<?php if(isset($_POST['soluong'])){$soluong=$_POST['soluong'];echo"$soluong";}else{echo$soluong;}?>"/>
					
					<label for="s">Giá bán</label><br>
					<input type="text" name="gia" id="s" value="<?php if(isset($_POST['gia'])){$gia=$_POST['gia'];echo"$gia";}else{echo $gia;}?>"/>
					<label>Hình ảnh</label><br>
					<input type="file" name="file_upload"/>
				</div>
				<div class="nut1">
					<button type="submit" name="capnhat">Cập nhật</button><br>
				</div>
			</div>
		</form>
		<?php
			if((isset($_POST['capnhat']))and(($cv=='admin'))){
				$hinhanh1=$_FILES['file_upload'];
				$tenfile=$hinhanh1['name'];
				if(empty($tenfile)){
					echo $hinhanh;
					$sql="UPDATE sach SET tensach='$tensach',loaisach='$loaisach',soluong='$soluong',giaban='$gia',hinhanh='$hinhanh',chitiet='$chitiet' WHERE masach='$ms'";
					$ketqua=mysqli_query($cn,$sql)or die("Cập nhật thất bại!");
					header('Location:http://localhost:8080/baithi/trangchu.php');
				}
				else{		
					$dgdan="img/".$tenfile;
					echo $dgdan;
					$sql="UPDATE sach SET  tensach='$tensach',loaisach='$loaisach',soluong='$soluong',giaban='$gia',hinhanh='$dgdan',chitiet='$chitiet' WHERE masach='$ms'";
					$ketqua=mysqli_query($cn,$sql)or die("Cập nhật thất bại!");
					move_uploaded_file($hinhanh['tmp_name'],"img/".$tenfile);
					header('Location:http://localhost:8080/baithi/trangchu.php');
				}
			}
		?>
	</body>
</html>