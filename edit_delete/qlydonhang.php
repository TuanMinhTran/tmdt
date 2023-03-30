<!DOCTYPE html>
<html>
<head>
<title>Quản Lý Đơn Hàng</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>


<form method="POST" class="form">
	<table border="1">
        <tr>
            <td style="text-align:center">Tên Khách Hàng</td>
            <td style="text-align:center">Tên Sản Phẩm</td>
            <td style="text-align:center">Email</td>
            <td style="text-align:center">SĐT</td>
            <td style="text-align:center">Đ/C Nhận Hàng</td>
            <td style="text-align:center">Số Lượng Mua</td>
            <td style="text-align:center">Tổng Thanh Toán</td>
            <td style="text-align:center">Trạng Thái</td>
            <td style="text-align:center" colspan="2">Action</td>
        </tr>
        <?php
		// Kết nối Database
			//include 'connect.php';
			$con = mysqli_connect("localhost","root","","dbmnm");
			//$id=$_GET['id'];
				$query=mysqli_query($con, "select * from `donhang` ");
				
				while($row=mysqli_fetch_assoc($query)){
		?>
        <tr>
            <td style="text-align:center"><?php echo $row['tenkhachhang']; ?></td>
            <td><?php echo $row['tensanpham']; ?></td>
            <td style="text-align:center"><?php echo $row['email']; ?></td>
            <td><?php echo $row['dienthoai']; ?></td>
            <td><?php echo $row['diachinhanhang']; ?></td>
            <td style="text-align:center"> <?php echo $row['soluongmua']; ?></td>
            <td style="text-align:center"><?php echo number_format($row['thanhtien']*$row['soluongmua'],0,',','.').'VNĐ'; ?></td>
            <td style="text-align:center"> 
              	<input type="text" value="<?php 
				if($row['trangthai']==0){
					echo 'Đang Chờ';
				}else{
					echo 'Hoàn Tất';} ?>" name="txttrangthai">
                <input type="submit" value="Cập Nhật" name="update">
          </td>
          <td>
			  <?php $id = $row['ID'];?> 
              <button><a style="text-decoration:none" href="xacnhan.php?id=<?php echo $id; ?>">Xác nhận Đơn Hàng</a></button>
          </td>  
        </tr>
        <?php
        }
        ?>
</table>
      
<?php

	if (isset($_POST['update'])){
		
		//$id=$_GET['id'];
		$trangthai=$_POST['txttrangthai'];
 
	// Create connection
	$conn = new mysqli("localhost", "root", "", "dbmnm");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
 
		//$sql = "UPDATE `donhang` SET soluongmua='$slmua' WHERE ID='$id'";
		$sql = "UPDATE `donhang` SET trangthai='$trangthai'";
 
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Thêm Dữ Liệu Thành Công!')</script>";
		header ("refresh:1, url='qlydonhang.php'");
	} else {
		echo "Không tìm được id sản phẩm !";
	}
 
	$conn->close();
}
?>

</form>
<table>
	<tr>
    	<td>
        	<a href="../admin.php"> &#8678; Về Trang Admin</a>
        </td>
    </tr>
</table>
</body>
</html>

