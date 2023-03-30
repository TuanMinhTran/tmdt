<!DOCTYPE html>
<html>
<head>
<title>Sửa Dữ Liệu</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
	//include 'connect.php';
	$con = mysqli_connect("localhost","root","","dbmnm");
	$id=$_GET['id'];
		$query=mysqli_query($con, "select * from `company` where id='$id'");
		$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
	<h2>Sửa Loại Sản Phẩm</h2>
      <label>Loại Sản Phẩm: <input type="text" value="<?php echo $row['tenhieu']; ?>" name="tenhieu"></label><br/>
      <input type="submit" value="Cập Nhật" name="update">
<?php

	if (isset($_POST['update'])){
		
		$id=$_GET['id'];
		$tenhieu=$_POST['tenhieu'];
 
	// Create connection
	$conn = new mysqli("localhost", "root", "", "dbmnm");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
 
		$sql = "UPDATE `company` SET tenhieu='$tenhieu' WHERE ID='$id'";
 
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Sửa Loại Dữ Liệu Thành Công!')</script>";
		header ("refresh:1, url='../index.php'");
	} else {
		echo "Không tìm được id loại sản phẩm !";
	}
 
	$conn->close();
}
?>

</form>
</body>
</html>