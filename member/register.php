<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<?php
	header('Content-Type: text/html; charset=utf-8');
	// Kết nối cơ sở dữ liệu
	$conn = mysqli_connect('localhost', 'root', '', 'dbmnm') or die ('Lỗi kết nối');
	
	mysqli_set_charset($conn, "utf8");

	// Dùng isset để kiểm tra Form
	if(isset($_POST['txtSub'])){
		
		$taikhoan = trim($_POST['txttaikhoan']);
		$matkhau = trim($_POST['txtmatkhau']);
		$email = trim($_POST['txtemail']);
		$sdt = trim($_POST['txtsdt']);
	
	
	if (empty($taikhoan)) {
		array_push($errors, "Tên người dùng bắt buộc"); 
	}
	if (empty($email)) {
		array_push($errors, "Chưa nhập email !"); 
	}
	if (empty($sdt)) {
		array_push($errors, "Chưa nhập Số Điện Thoại"); 
	}
	if (empty($matkhau)) {
		array_push($errors, "Mật Khẩu trống"); 
	}
	
	// Kiểm tra username hoặc email có bị trùng hay không
	$sql = "SELECT * FROM member WHERE username = '$taikhoan' OR email = '$email'";
	
	// Thực thi câu truy vấn
	$result = mysqli_query($conn, $sql);
	
	// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
	if (mysqli_num_rows($result) > 0){
		echo '<script>alert("Bị trùng tên hoặc chưa đăng ký tài khoản!")</script>';
		header("refresh:0; url = 'register.php'");
	// Dừng chương trình
	die ();
	}else {
		$sql = "INSERT INTO member (username, password, email, sdt) VALUES ('$taikhoan','$matkhau','$email','$sdt')";
		echo '<script>alert("Đăng ký thành công!")</script>';
		
		mysqli_query($conn, $sql);
		header("refresh:0; url = 'login.php'");
	
	}
	}
?>
<body>
<form name="dangky" method="post" action="#" enctype="multipart/form-data">
	<table border="1px solid" style="width:500; height:250; margin:auto">
    	<tr>
        	<td colspan="2"><h2>THÔNG TIN ĐĂNG KÝ</h2></td>
        </tr>
        <tr>
        	<td>Tài khoản:</td>
            <td><input type="text" name="txttaikhoan" value="" required /></td>
        </tr>
        <tr>
        	<td>Mật Khẩu:</td>
            <td><input type="password" name="txtmatkhau" value="" required /></td>
        </tr>
        <tr>
        	<td>Email:</td>
            <td><input type="email" name="txtemail" value="" required /></td>
        </tr>
        <tr>
        	<td>Số Điện Thoại:</td>
            <td><input type="tel" name="txtsdt" value="" required /></td>
        </tr>
        <tr>
        	<td ><a style="text-decoration:none" href="login.php">Đã có tài khoản</a></td>
            <td ><input type="submit" name="txtSub" value="Đăng Ký" /></td>           
        </tr>
    </table>
</form>
</body>
</html>