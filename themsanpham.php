<?php session_start();?>
<html>
    <head>
	    <title>Thêm sản phẩm</title>
        <link href="themsanpham.css" rel="stylesheet" type="text/css"/>
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
		    <form action="" method="post" enctype="multipart/form-data">
                <h1>Thêm sản phẩm</h1>
				<div class="khungnhap">
                    <label for="masach">Mã sách</label><br>
					<input type="text" name="ms" id="dangnhap" placeholder="Nhập mã sách" value="<?php if(isset($_POST['ms'])){$ms=$_POST['ms'];echo"$ms";}?>"/>
					<?php
                       if((isset($_POST['bt']))and(isset($cv))){
							if($cv=="admin"){
								$thongbao=null;
								if($ms==null){
									$thongbao="<p><font color=red>*Bạn chưa nhập mã sách</font></p>";
								}	
								$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
								$sql="select*from sach where masach='$ms'";
								$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
								$dem1=mysqli_num_rows($ketqua);
								if($dem1>0){
									$thongbao="<p><font color=red>*Mã sách đã tồn tại</font></p>";
								}
							}
							else{
								$thongbao="<p><font color=red>*Không phải admin không được thêm vào!</font></p>";
							}
							echo $thongbao;
			            }						
					?>
                </div>
				<div class="khungnhap">
                    <label for="tensach">Tên sách</label><br>
					<input type="text" name="ts" id="password" placeholder="Nhập tên sách" value="<?php if(isset($_POST['ts'])){$ts=$_POST['ts'];echo"$ts";}?>"/>
					<?php
					    if((isset($_POST['bt']))and(isset($cv))){
							if($cv=="admin"){
								if($ts==null){
									$thongbao="<p><font color='red'>*Bạn chưa nhập Tên sách</font></p>";
								}
								$cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
								$sql="select*from sach where tensach='$ts'";
								$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
								$dem2=mysqli_num_rows($ketqua);
								if($dem2>0){
									$thongbao="<p><font color=red>*Tên sách đã tồn tại</font></p>";
								}
							}
							else{
								$thongbao="<p><font color='red'>*Không phải admin không được thêm vào!</font></p>";
							}
							echo $thongbao;
					    }	
					?>
                </div>
				<div class="khungnhap">
                    <label for="ls">Loại sách</label><br>
					<input type="text" name="ls" id="ht" placeholder="Nhập Loại sách" value="<?php if(isset($_POST['ls'])){$ls=$_POST['ls'];echo"$ls";}?>"/>
                </div>
				<div class="khungnhap">
                    <label for="soluong">Số lượng</label><br>
					<input type="number" name="sl" id="soluong" placeholder="Nhập Số lượng" value="<?php if(isset($_POST['sl'])){$sl=$_POST['sl'];echo"$sl";}?>"/>
                </div>
				<div class="khungnhap">
                    <label  for="giaban">Giá bán</label><br>
					<input type="number" id="giaban" name="gb" placeholder="Nhập giá bán" value="<?php if(isset($_POST['gb'])){$gb=$_POST['gb'];echo"$gb";}?>"/>
                </div>
				<div class="khungnhap">
                    <label  for="chitiet">Giới thiệu sách</label><br>
					<input type="text" id="chitiet" name="ct" placeholder="Nhập giới thiệu sách" value="<?php if(isset($_POST['ct'])){$ct=$_POST['ct'];echo"$ct";}?>"/>
                </div>
				<div class="khungnhap">
                    <label>Hình ảnh</label><br>
					<input type="file" name="file_upload"/>
                </div>
				<div class="nut" align=center>
                        <button type="submit" name="bt">Thêm sản phẩm</button>
                </div>
		<?php
		    if((isset($_POST['bt']))and(isset($cv))){
				if($cv=="admin"){
					if(($ms!=null)and($ts!=null)){
						if(($dem1==0)and($dem2==0)){
							$hinhanh=$_FILES['file_upload'];
							$tenfile=$hinhanh['name'];
							$dgdan="img/".$tenfile;
							$sql="insert into sach values('$ms','$ts','$ls','$sl','$gb','$dgdan','$ct')";
							$ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
							move_uploaded_file($hinhanh['tmp_name'],"img/".$tenfile);
							header('location:http://localhost/baithi/trangchu.php');
						}
					}
				}
			}
		?>
		</form>
	</div>
	</body>
</html>