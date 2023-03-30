<title>Chi tiết sản phẩm</title>
<a style="text-decoration:none" href="../index.php">Trang chủ</a></strong>

<form method="POST" class="form">
  <table border="1px solid" width="500" height="250" style="margin:auto">
    <?php

        $con = mysqli_connect("localhost","root","","dbmnm");
            $id = $_GET['id'];
            $sql = "SELECT * FROM product where ID = '".$id."' "; //$sql = "SELECT * FROM product where ID ='1'";
            $query=mysqli_query($con, $sql);
            while($row=mysqli_fetch_array($query)){
    ?>
    <tr>
        <td rowspan="7"><?php echo "<img width=165px height=150px src='../img/".$row['tenanh']."' />"; ?></td>
    </tr>
    <tr>
        <td>Tên Sản Phẩm: <br><b><?php echo $row['tensp']; ?></b></td>
    </tr>
    <tr>
        <td>Giá Giảm: <br><?php echo number_format($row['giagiam'],0,',','.').'VNĐ'; ?></td>
    </tr>
    <tr>
        <td>Giá Đề Xuất:<strong style='text-decoration: line-through'><br><?php echo  number_format($row['giadexuat'],0,',','.').'VNĐ'; ?></strong></td> 
    </tr>
    <tr>
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
      <td>Số Lượng: <br /><input type="number" name="soluong" value="<?php echo $row['soluong']; ?>" /></td>
    </tr>
    <tr>
        <td><b>Mô tả:</b> <br><?php echo $row['Mota']; ?></td>
    </tr>
    

        <td style="text-decoration:none">
        	<a href="thongtin.php?id=<?php echo $id; ?>?sl=<?php echo $sl; ?>">
            	<input type="submit" name="Subsoluong" value="Thêm Vào Giỏ" />
            </a>        
        </td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>