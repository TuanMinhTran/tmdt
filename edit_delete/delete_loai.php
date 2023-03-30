<?php
//include_once('connect.php');
	$conn = mysqli_connect("localhost","root","","dbmnm");
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
			$id=$_GET['id'];
			$sql = "DELETE FROM company WHERE ID='$id'";
		if($conn -> query($sql) === TRUE) {
			echo "<script>alert('Xóa Thành Công!')</script>";
			header ("refresh:0, url='../index.php'");
		} else {
			echo "Xóa thất bại, hệ thống tự chuyển về trang admin trong 5s !";
			header ("refresh:5, url='../admin.php'");
		} 
	$conn->close();
	}
?>