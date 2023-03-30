<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
</head>
<?php

	if(isset($_POST['txtSub'])){
		$taikhoan = $_POST['txttaikhoan'];
		$matkhau = $_POST['txtmatkhau'];
	
		$sql = "select * from nguoidung where taikhoan='".$taikhoan."' and matkhau='".$matkhau."' limit 1";
		$con = mysqli_connect("localhost","root","","dbmnm"); 
		$row= mysqli_query($con, $sql);
		$count = mysqli_fetch_assoc($row);
		
		if($count > 0){
			$_SESSION['dangnhap']=$taikhoan;
			echo '<script>alert("Đăng Nhập thành công!")</script>';
			header ('refresh:0, url="admin.php"');
		}else{
			echo '<script>alert("Đăng Nhập thất bại!")</script>';
			header ('refresh:0, url="login.php"');
		}
	}
?>
<body>
<form name="login" action="#" method="post" enctype="multipart/form-data">
	<table border="1px solid" width="300" height="100" style="margin:auto">
    	<tr>
        	<td colspan="2" style="text-align:center"><h2>Đăng Nhập Admin</h2></td> 
        </tr>
        <tr>
        	<td style="text-align:center">Tài Khoản:</td>
            <td><input type="text" name="txttaikhoan" placeholder="nhập tài khoản ..." /></td>
        </tr>
        <tr>
        	<td style="text-align:center">Mật Khẩu:</td>
            <td><input type="password" name="txtmatkhau" placeholder="nhập mật khẩu ..." /></td>
        </tr>
        <tr>
        	<td colspan="2" style="text-align:center"><input type="submit" name="txtSub" value="Đăng Nhập"/></td> 
        </tr>
        <tr>
        	<td colspan="2">Gợi ý Ad ->tk: taikhoan1, mk: taikhoan1</td>
        </tr>
    </table>
</form>
</body>
</html>