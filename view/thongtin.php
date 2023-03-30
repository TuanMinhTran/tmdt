	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đặt Hàng</title>
</head>

<body>
	<h3 style="text-align:center">Thông Tin Đặt Hàng</h3>
    <form action="infor.php" method="post" enctype="multipart/form-data">
        <table style="margin:auto; text-align:left" >
        <?php

			$con = mysqli_connect("localhost","root","","dbmnm");
				$id = $_GET['id'];
				$sql = "SELECT * FROM product where ID = '".$id."' "; //$sql = "SELECT * FROM product where ID ='1'";
				$query=mysqli_query($con, $sql);
				while($row=mysqli_fetch_array($query)){
		?>
        <?php
        
            if (isset($_POST['Subsoluong'])){
                
                $id=$_GET['id'];
                $sl = $_POST['soluong'];
         
				// Create connection
				$conn = new mysqli("localhost", "root", "", "dbmnm");
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
					$sql = "UPDATE `product` SET soluong='$sl'  WHERE ID='$id' ";
					
				if ($conn->query($sql) === TRUE) {
					echo "<script>alert('Thêm vào giỏ thành công!')</script>";
					header ("refresh:0, url='thongtin.php?id=".$id."?sl=".$sl."");
				} else {
					echo "Thêm vào giỏ thất bại !";
				}
			 
				$conn->close();
			}
        ?>
            <tr>
                <td>Tên Khách hàng:</td>
                <td><input type="text" size="40" name="txttenkh" required /></td>
            </tr>
            <tr>
                <td>Tên Sản Phẩm:</td>
                <td><input type="text" size="40" name="txttensanpham" value="<?php echo $row['tensp']; ?>" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" size="40" name="txtemail" required /></td>
            </tr>
            <tr>
                <td>Số Điện Thoại:</td>
                <td><input type="text" size="40" name="txtdienthoai" required /></td>
            </tr>
            <tr>
                <td>Địa Chỉ Nhận Hàng:</td>
                <td><input type="text" size="40" name="txtdiachinhanhang" required /></td>
            </tr>
            <tr>
                <td>Số Lượng mua:</td>
                <td><input type="text" size="40" name="txtsoluongmua" value="<?php echo $row['soluong']; ?>" /></td>
            </tr>     
            <tr>
                <td>Giá Giảm:</td>
                <td><input type="text" size="40" name="txtthanhtien" value="<?php echo $row['giagiam']; ?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="txtSub" value="Đặt Đơn" />
                </td>
            </tr>
        <?php } ?>
        </table>
    </form>
</body>
</html>