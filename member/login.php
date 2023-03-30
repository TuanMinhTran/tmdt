<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="style.css"/> 
</head> 
<?php
	//Khai báo sử dụng session
	session_start();
	//Khai báo utf-8 để hiển thị được tiếng việt
	header('Content-Type: text/html; charset=UTF-8');
	//Xử lý đăng nhập
	if (isset($_POST['txtSub'])){
	//Kết nối tới database
	//include('connect.php');
	$con = mysqli_connect("localhost","root","",'dbmnm'); 
	//Lấy dữ liệu nhập vào
	$username = $_POST['txtname'];
	$password = $_POST['txtmk']; 
	//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
	if (!$username || !$password) {
		echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.')</script>";
		header ("refresh:0; url ='login.php'");
		exit;
	} 
	// mã hóa pasword
	//$password = md5($password);	  
	//Kiểm tra tên đăng nhập có tồn tại không
	$query = mysqli_query($con,"SELECT username, password FROM member WHERE username='$username'");
	if (mysqli_num_rows($query) == 0){
		echo "<script>alert('Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.')</script>";
		header ("refresh:0; url ='login.php'");
		exit;
	}	  
	//Lấy mật khẩu trong database ra
	$row = mysqli_fetch_array($query);
	  
	//So sánh 2 mật khẩu có trùng khớp hay không
	if ($password != $row['password']) {
		echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại.')</script>";
		header ("refresh:0; url ='login.php'");
		exit;
	}	  
	//Lưu tên đăng nhập
	$_SESSION['username'] = $username;
		echo "<script>alert('Xin chào ".$username." Bạn đã đăng nhập thành công.')</script>";
		header ("refresh:0; url ='../index.php'");
	die();
	}
?>

<body> 
	<form name="member" method="post" action="#" enctype="multipart/form-data">
    	<table border="1px solid" style="width:300; height:100; margin:auto">
        	<tr>
            	<td colspan="2"><h2>THÔNG TIN ĐĂNG NHẬP</h2></td>
            </tr>
            <tr>
            	<td>Tài Khoản:</td>
                <td><input type="text" name="txtname" placeholder="nhập tài khoản..." /></td>
            </tr>
            <tr>
           		<td>Mật Khẩu:</td>
                <td><input type="password" name="txtmk" placeholder="nhập mật khẩu..." /></td> 
            </tr>
            <tr>
            	<td style="text-align:center"><a style="text-decoration:none" href="register.php">Đăng Ký ?</a></td>
            	<td style="text-align:center" colspan="2" ><input type="submit" name="txtSub" value="Login" /></td>
            </tr>
        </table>
    </form>
</body> 
</html>