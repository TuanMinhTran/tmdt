<?php
	@session_start(); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang Chủ</title>
</head>
<body>
	<table style="width:1100px;height:50px; margin:auto", border="1px solid">
    	<tr style="height:50px; text-align:center">
        	<td colspan="2">BÀI BÁO CÁO MÃ NGUỒN MỞ</td>
        </tr>
        <tr style="height:50px; text-align:center">
        	<?php include_once('menu.php'); ?>
        </tr>
        <tr style="width:100%; text-align:center">
        	<td style="width:20%">
            	<h2>Loại Sản Phẩm</h2> <br/>
            	<?php
					include_once("view/vCompany.php");
				?>
            </td>
            <td style="width:80%">
            	<?php
					include_once("view/vProduct.php");
				?>
            </td>
        </tr>
        <tr style="height:50px; text-align:center">
        	<td colspan="2"><b>Copyright</b> &copy; Trần Minh Tuấn - 19456451</td>
        </tr>
    </table>
</body>
</html>
