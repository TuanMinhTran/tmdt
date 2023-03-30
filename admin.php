<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang Quản Lý</title>
</head>

<body>
<table style="width:960px;height:50px; margin:auto", border="1px solid">
    	<tr style="height:50px; text-align:center">
        	<td colspan="2">WELCOME TO ADMIN</td>
        </tr>
        <tr style="height:50px; text-align:center">
        	<td colspan="2" >
            	<a style="text-decoration:none" href="index.php">Trang chủ</a> |
                <a style="text-decoration:none" href="./edit_delete/view_loai.php">Quản Lý Loại Sản Phẩm</a>  |
                <a style="text-decoration:none" href="./edit_delete/view_sp.php">Quản Lý Sản Phẩm</a>  |
                <a style="text-decoration:none" href="./edit_delete/qlydonhang.php">Quản Lý Đơn Hàng</a>
            </td>
        </tr>
        <tr style="width:100%; text-align:center">
        	<td style="width:20%">
            	<h2>Loại Sản Phẩm</h2> <br/>
                <?php
					include_once("view/vCompany.php"); //admin.php?addProd
				?>
                <h3>Quản Lý Sản Phẩm</h3> 
                <a style="text-decoration:none" href="admin.php?addProd">Thêm Sản Phẩm</a>
                <br><br>
                <a style="text-decoration:none" href="admin.php?addLoaisp">Thêm Loại SP</a>
                <br><br>
            </td>
            <td style="width:80%">
            	<?php
					if(isset($_REQUEST["addProd"])){
						include_once("view/vAddProduct.php");
					}else if(isset($_REQUEST["addLoaisp"])){
						include_once("view/vThemLoaiSP.php");
					}else{
						echo "<br>";
						echo "TRANG DÀNH CHO ADMIN";
					}
				?>
            </td>
        </tr>
         <tr style="height:50px; text-align:center">
        	<td colspan="2"><b>Copyright</b> &copy; Trần Minh Tuấn - 19456451</td>
        </tr>
    </table>
</body>
</html>
