<?php
	header('Location: /TMDT/edit_delete/qlydonhang.php');
	$con = mysqli_connect("localhost","root","","dbmnm");
	
	$id = $_GET['id'];
	
	$sql = "UPDATE `donhang` SET `trangthai`='1' WHERE ID = $id";
	
	$qr = mysqli_query($con, $sql);
	
?>