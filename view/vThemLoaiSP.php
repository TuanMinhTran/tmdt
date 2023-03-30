	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Sản Phẩm</title>
</head>
<?php
	include_once("Controller/cProduct.php");
	if(isset($_REQUEST['txtSub'])){
		//lấy dữ liệu từ form php vào sql
		$tenhieu = $_REQUEST['txtTenhieu'];

		$p = new controllerProduct();
		//gọi thêm hàm dữ liệu vào database từ controller
		$kq = $p -> AddLoaiSP($tenhieu);
		//hiển thị các thông báo càn thiết
		if($kq==1){
			echo "<script>alert('Thêm dữ liệu thành công')</script>";
			echo header("refresh:0; url = 'index.php?addLoaisp'");
		}else if($kq==0){
			echo "<script>alert('Không thể thêm dữ liệu')</script>";
		}else{
			echo "lỗi dữ liệu ";
		}
	}
?>
<body>
	<h3>THÊM LOẠI SẢN PHẨM</h3>
    <form action="#" method="post" enctype="multipart/form-data">
        <table style="margin:auto; text-align:left" >
            <tr>
                <td>Tên Hiệu SP:</td>
                <td><input type="text" name="txtTenhieu" required /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="txtSub" value="Thêm Vào" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>