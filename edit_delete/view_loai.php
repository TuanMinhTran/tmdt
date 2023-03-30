<table border="1">
<tr>
    <td style="text-align:center">Loại Sản Phẩm</td>
    <td style="text-align:center" colspan="2">Action</td>
</tr>
<?php
	//include_once('../Model/ketnoi.php');
	$con = mysqli_connect("localhost","root","","dbmnm");
		$query=mysqli_query($con,"SELECT * FROM `company`");
		while($row=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $row['tenhieu']; ?></td>
    <td style="text-align:center">
    <a href="edit_loai.php?id=<?php echo $row['ID']; ?>"><img src="../img/edit.png" width="30" height="30"/></a>
    </td>
    <td style="text-align:center">
    <a href="delete_loai.php?id=<?php echo $row['ID']; ?>"><img src="../img/delete.png" width="30" height="30"/></a>
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