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
		$query=mysqli_query($con, "select * from `product` where id='$id'");
		$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
	<h2>Sửa Sản Phẩm</h2>
      <label>ID: <input type="number" value="<?php echo $row['ID']; ?>" name="id"></label><br/>
      <label>Tên Sản Phẩm: <input type="text" value="<?php echo $row['tensp']; ?>" name="tensp"></label><br/>
      <label>Giá Giảm: <input type="number" value="<?php echo $row['giagiam']; ?>" name="giagiam"></label><br/>
      <label>Giá Đề Xuất: <input type="number" value="<?php echo $row['giadexuat']; ?>" name="giadexuat"></label><br/>
      <label>Hình Ảnh: <input type="text" value="<?php echo $row['tenanh'];?>" name="tenanh"></label><br/>
      <label>Loại Sản Phẩm: <input type="number" value="<?php echo $row['IDCty'];?>" name="idcty"></label><br/>
      <label>Mô tả: 
            <textarea name="mota" style="width:300px; height:100px">
                <?php echo $row['Mota']; ?>
            </textarea>
      </label><br/>
      <label>Trạng Thái: <input type="text" value="<?php echo $row['trangthai'];?>" name="trangthai"></label><br/>
      <input type="submit" value="Cập Nhật" name="update">
<?php

	if (isset($_POST['update'])){
		
		$id=$_GET['id'];
		$tensp=$_POST['tensp'];
		$giagiam=$_POST['giagiam'];
		$giadexuat=$_POST['giadexuat'];
		$tenanh=$_POST['tenanh'];
		$idcty=$_POST['idcty'];
		$mota=$_POST['mota'];
		$trangthai=$_POST['trangthai'];
 
	// Create connection
	$conn = new mysqli("localhost", "root", "", "dbmnm");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
 
		$sql = "UPDATE `product` SET tensp='$tensp', Mota='$mota', IDCty='$idcty', tenanh='$tenanh', giagiam='$giagiam', giadexuat='$giadexuat', trangthai='$trangthai' WHERE ID='$id'";
 
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Thêm Dữ Liệu Thành Công!')</script>";
		header ("refresh:1, url='../index.php'");
	} else {
		echo "Không tìm được id sản phẩm !";
	}
 
	$conn->close();
}
?>

</form>
</body>
</html>