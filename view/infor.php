<?php 		
	
	if(isset($_POST['txtSub'])){
	  //lấy dữ liệu từ form php vào sql
	            
		$tenkh = $_REQUEST['txttenkh'];
		$email = $_REQUEST['txtemail'];
		$dienthoai = $_REQUEST['txtdienthoai'];
		$diachinhanhang = $_REQUEST['txtdiachinhanhang'];
		$soluongmua = $_REQUEST['txtsoluongmua'];
		$thanhtien = $_REQUEST['txtthanhtien'];
		$tensanpham = $_REQUEST['txttensanpham'];
 		
		// Create connection
		$conn = new mysqli("localhost", "root", "", "dbmnm");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "INSERT INTO `donhang`(`tenkhachhang`, `tensanpham`, `email`, `dienthoai`, `diachinhanhang`, `soluongmua`, `thanhtien`) 
				VALUES (N'$tenkh', N'$tensanpham', N'$email',$dienthoai,N'$diachinhanhang',$soluongmua,$thanhtien)";
			
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('ĐẶT HÀNG THÀNH CÔNG!')</script>";
			header ("refresh:0, url='xemgiohang.php'");
		} else {
			echo "ĐẶT HÀNG THẤT BẠI !";
		}
	 
		$conn->close();	
		//xoa addDonHang
	} 	
?>