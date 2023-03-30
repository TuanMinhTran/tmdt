<?php
//include_once('connect.php');
	$con = mysqli_connect("localhost","root","","dbmnm");
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
			$id=$_GET['id'];
			$sql = "DELETE FROM donhang WHERE ID='$id'";
		if ($con -> query($sql) === TRUE) {
			echo "<script>alert('Hủy Đơn Thành Công!')</script>";
			header ("refresh:0, url='../index.php'");
		} else {
			echo "Xóa thất bại !";
		}
 
$conn->close();
}
?>