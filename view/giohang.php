<title>Giỏ Hàng</title>
<table border="1">
<tr>
    <td style="text-align:center">Tên Sản Phẩm</td>
    <td style="text-align:center">Giá Giảm</td>
    <td style="text-align:center">Giá Đề Xuất</td>
    <td style="text-align:center">Hình Ảnh</td>
    <td style="text-align:center">Loại Sản Phẩm</td>
    <td style="text-align:center">Mô tả</td>
    <td style="text-align:center">Số Lượng</td>
    <td style="text-align:center">Thành Tiền</td>
</tr>
<?php
	//include_once('../Model/ketnoi.php');
	$con = mysqli_connect("localhost","root","","dbmnm");
		$id = $_GET['id'];
		$sql = "SELECT * FROM product where ID = '".$id."' ";
		$query=mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $row['tensp']; ?></td>
    <td><?php echo number_format($row['giagiam'],0,',','.').'VNĐ'; ?></td>
    <td><strong style="text-decoration:line-through"><?php echo number_format($row['giadexuat'],0,',','.').'VNĐ'; ?></strong></td>
    <td><?php echo "<img width=115px height=100px src='../img/".$row['tenanh']."' />"; ?></td>
    <td style="text-align:center"><?php echo $row['IDCty'];?></td>
    <td><?php echo $row['Mota']; ?></td>
    <td style="text-align:center"><?php echo $row['soluong']; ?></td>
    <td><?php echo number_format($row['giagiam']*$row['soluong'],0,',','.').'VNĐ'; ?></td>
</tr>
<tr>
	<td colspan="8" style="text-align:center"><button style="width:100px"><a style="text-decoration:none; width:300px" href="thongtin.php?id=<?php echo $id; ?>">Thanh Toán</a></button></td>
</tr>
<?php
}
?>
</table>