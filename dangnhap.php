<?php session_start();?>
<html>
    <head>
        <title>Đăng nhập</title>
        <link href="dangnhap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	    <div class="khung">
		    <form action="" method="post" enctype="multipart/form-data">
                <h1>Đăng nhập</h1>
				<div class="khungnhap">
                    <label for="dangnhap">Tài khoản</label><br>
					<input type="text" name="a" id="dangnhap" placeholder="Nhập tài khoản" value="<?php if(isset($_POST['a'])){$a=$_POST['a'];echo"$a";}?>"/>
					<?php
                        if(isset($_POST['bt'])){
							$thongbao=null;
                            if($a!=null){									
						        $cn=mysqli_connect("localhost","root","","ban_sach")or die("Kết nối thất bại!");
                                $sql="select*from user where username='$a'";
		                        $ketqua=mysqli_query($cn,$sql)or die("Kết nối thất bại!");
			                    $dem=mysqli_num_rows($ketqua);
							    if($dem==0){
				                    $thongbao="<p><font color=red>*Tài khoản không tồn tại</font></p>";
							    }
							    else{
								    while($row=mysqli_fetch_assoc($ketqua)){
										$tk=$row['username'];
									    $mk=$row['password'];
										$ha=$row['avatar'];
										$cv=$row['chucvu'];
								    }
							    }
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
							if(isset($mk)){
						        if($b!=$mk){
						            $thongbao="<font color='red'>*Sai mật khẩu! Vui lòng nhập lại!</font>";
							    }
							echo$thongbao;
							}
					    }	
					?>
                </div>
				<div class="nut" align=center>
                        <button type="submit" name="bt">Đăng nhập</button><br>
						<p><font color="808080">Chưa có tài khoản?</font><a style="text-decoration:none" href="http://localhost/baithi/dangky.php"><font color="009999">Đăng kí</font></a></p>
                </div>
			</form>
		<?php
		    if(isset($_POST['bt'])){
				if((isset($tk))and(isset($mk))){
		            if(($a==$tk)and($b==$mk)){
						$_SESSION['TK']=$tk;
						$_SESSION['CV']=$cv;
					    header('Location:http://localhost/baithi/trangchu.php');
					}
				}
			}
		?>
		</div>
	</body>
</html>