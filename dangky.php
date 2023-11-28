<html>
    <head>
        <title>Đăng ký</title>
        <link href="dangky.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	    <div class="khung">
		    <form action="" method="post" enctype="multipart/form-data">
                <h1>Đăng ký</h1>
				<div class="khungnhap">
                    <label for="dangnhap">Tài khoản</label><br>
					<input type="text" name="a" id="dangnhap" placeholder="Nhập tài khoản" value="<?php if(isset($_POST['a'])){$a=$_POST['a'];echo"$a";}?>"/>
					<?php
                        if(isset($_POST['bt'])){
						    $thongbao=null;
						    if($a==null){
							    $thongbao="<p><font color=red>*Bạn chưa nhập tài khoản</font></p>";
						    }	
						    $cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
                            $sql="select*from user where username='$a'";
		                    $ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
			                $dem=mysqli_num_rows($ketqua);
							if($dem>0){
				                $thongbao="<p><font color=red>*Tài khoản đã tồn tại</font></p>";
							}
							echo $thongbao;
			            }						
					?>
                </div>
				<div class="khungnhap">
                    <label for="password">Mật khẩu</label><br>
					<input type="password" name="b" id="password" placeholder="Nhập mật khẩu" value="<?php if(isset($_POST['b'])){$b=$_POST['b'];echo"$b";}?>"/>
					<?php
					    if(isset($_POST['bt'])){
						    if($b==null){
						        echo"<p><font color='red'>*Bạn chưa nhập mật khẩu</font></p>";
							}
					    }	
					?>
                </div>
				<div class="khungnhap">
                    <label for="ht">Họ tên</label><br>
					<input type="text" name="ht" id="ht" placeholder="Nhập Họ tên" value="<?php if(isset($_POST['ht'])){$ht=$_POST['ht'];echo"$ht";}?>"/>
                </div>
				<div class="khungnhap">
                    <label for="diachi">Địa chỉ</label><br>
					<input type="text" name="c" id="diachi" placeholder="Nhập địa chỉ" value="<?php if(isset($_POST['c'])){$c=$_POST['c'];echo"$c";}?>"/>
                </div>
				<div class="khungnhap">
                    <label  for="SODT">Số điện thoại</label><br>
					<input type="text" id="SODT" name="d" placeholder="Nhập số điện thoại" value="<?php if(isset($_POST['d'])){$d=$_POST['d'];echo"$d";}?>"/>
                </div>
				<div class="khungnhap">
                    <label>Avatar</label><br>
					<input type="file" name="file_upload"/>
                </div>
				<div class="nut" align=center>
                        <button type="submit" name="bt">Đăng ký</button>
                </div>
		<?php
		    if(isset($_POST['bt'])){
		        if(($a!=null)and($b!=null)){
				    if($dem==0){
					    $avartar=$_FILES['file_upload'];
			            $tenfile=$avartar['name'];
			            $dgdan="img/".$tenfile;
						echo"Đăng ký thành công!<a href=http://localhost/baithi/dangnhap.php>Trang đăng nhập!</a>";
				        $sql="insert into user values('$a','$b','$dgdan','khachhang')";
		                $ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
						$sql="insert into khachhang values('$a','$ht','$c','$d')";
						$ketqua=mysqli_query($cn,$sql);
				        move_uploaded_file($avartar['tmp_name'],"img/".$tenfile);
					}
				}
			}
		?>
		</form>
		</div>
	</body>
</html>