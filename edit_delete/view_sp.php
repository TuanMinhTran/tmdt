<table border="1">
<tr>
    <td style="text-align:center">ID</td>
    <td style="text-align:center">Tên Sản Phẩm</td>
    <td style="text-align:center">Giá Giảm</td>
    <td style="text-align:center">Giá Đề Xuất</td>
    <td style="text-align:center">Hình Ảnh</td>
    <td style="text-align:center">Loại Sản Phẩm</td>
    <td style="text-align:center">Mô tả</td>
    <td style="text-align:center">Trạng Thái</td>
    <td style="text-align:center" colspan="2">Action</td>
</tr>
<?php
	//include_once('../Model/ketnoi.php');
	$con = mysqli_connect("localhost","root","","dbmnm");
		$query=mysqli_query($con,"SELECT * FROM `product`");
		while($row=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $row['ID']; ?></td>
    <td><?php echo $row['tensp']; ?></td>
    <td><?php echo number_format($row['giagiam'],0,',','.').'VNĐ'; ?></td>
    <td><?php echo number_format($row['giadexuat'],0,',','.').'VNĐ'; ?></td>
    <td><?php echo "<img width=115px height=100px src='../img/".$row['tenanh']."' />"; ?></td>
    <td style="text-align:center"><?php echo $row['IDCty'];?></td>
    <td><?php echo $row['Mota']; ?></td>
    <td><?php echo $row['trangthai']; ?></td>
    <td style="text-align:center">
    <a href="edit_sp.php?id=<?php echo $row['ID']; ?>"><img src="../img/edit.png" width="30" height="30"/></a>
    </td>
    <td style="text-align:center">
    <a href="delete_sp.php?id=<?php echo $row['ID']; ?>"><img src="../img/delete.png" width="30" height="30"/></a>
    </td>
</tr>
<?php
}
?>
</table>
<table>
	<tr>
    	<td>
        	<a href="../admin.php"> &#8678; Về Trang Admin</a>
        </td>
    </tr>
</table>