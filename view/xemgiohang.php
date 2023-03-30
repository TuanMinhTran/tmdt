<!DOCTYPE html>
<html>
<head>
<title>Chi Tiết Đơn Hàng</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php
	//sửa ở đây
?>
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
            <td style="text-align:center">Action</td>
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
            <td style="text-align:center"> 
                <input type="number" value="<?php echo $row['soluongmua']; ?>" name="txtslmua">
                <input type="submit" value="Cập Nhật" name="update">
            </td>
            <td style="text-align:center"><?php echo number_format($row['thanhtien']*$row['soluongmua'],0,',','.').'VNĐ'; ?></td>
            <td style="text-align:center">
				<?php if($row['trangthai']==0){
						echo 'Đang Chờ';
					}else{
						echo 'Hoàn Tất';} 
				?>
            </td>
            <td style="text-align:center">
            	<button><a style="text-decoration:none" href="/TMDT/edit_delete/huydon.php?id=<?php echo $row['ID']; ?>">Hủy Đơn</a></button>
            </td>
        </tr>
        <?php
        }
        ?>
</table>
      
<?php

		if (isset($_POST['update'])){
			
			//$id=$_GET['id'];
			$slmua=$_POST['txtslmua'];
	 
		// Create connection
		$conn = new mysqli("localhost", "root", "", "dbmnm");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	 
			//$sql = "UPDATE `donhang` SET soluongmua='$slmua' WHERE ID='$id'";
			$sql = "UPDATE `donhang` SET soluongmua='$slmua'";
	 
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('Thêm Dữ Liệu Thành Công!')</script>";
			header ("refresh:1, url='xemgiohang.php'");
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
        	<a href="../index.php"> &#8678; Tiếp tục mua sắm</a>
        </td>
    </tr>
</table>
<?php
	//đóng ngoặc ở đây
?>
</body>
</html>

