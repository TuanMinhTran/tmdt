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
		$tensp = $_REQUEST['txtTenSP'];
		$gia1 = $_REQUEST['txtGiaSP1'];
		$gia2 = $_REQUEST['txtGiaSP2'];
		$mota = $_REQUEST['txtMota'];
		$trangthai = $_REQUEST['txttrangthai'];
		$cty = $_REQUEST['cboCty'];
		$file = $_FILES["ffile"]["tmp_name"];
		$loaianh = $_FILES["ffile"]["type"];
		$tenanh = $_FILES["ffile"]["name"];
		$sizeanh = $_FILES["ffile"]["size"];
		$p = new controllerProduct();
		//gọi thêm hàm dữ liệu vào database từ controller
		$kq = $p -> AddProducts($tensp, $gia1, $gia2, $mota, $cty, $file, $tenanh, $loaianh, $sizeanh, $trangthai);
		//hiển thị các thông báo càn thiết
		if($kq==1){
			echo "<script>alert('Thêm dữ liệu thành công')</script>";
			echo header("refresh:0; url = 'index.php?addProd'");
		}else if($kq==0){
			echo "<script>alert('Không thể thêm dữ liệu')</script>";
		}else if($kq==-1){
			echo "<script>alert('Không thể upload ảnh')</script>";
		}else if($kq==-2){
			echo "<script>alert('kich thước ảnh phải <= 2MB')</script>";
		}else if($kq==-3){
			echo "<script>alert('Không đúng định dạng')</script>";
		}else{
			echo "lỗi dữ liệu ";
		}
	}
?>
<body>
	<h3>THÊM SẢN PHẨM</h3>
    <form action="#" method="post" enctype="multipart/form-data">
        <table style="margin:auto; text-align:left" >
            <tr>
                <td>Tên Sản Phẩm:</td>
                <td><input type="text" name="txtTenSP" required /></td>
            </tr>
            <tr>
                <td>Giá Giảm:</td>
                <td><input type="number" name="txtGiaSP1" required /></td>
            </tr>
            <tr>
                <td>Giá Đề Xuất:</td>
                <td><input type="number" name="txtGiaSP2" required /></td>
            </tr>
            <tr>
                <td>Mô tả:</td>
                <td><textarea cols="22" rows="5" name="txtMota"></textarea></td>
            </tr>
            <tr>
                <td>Chọn ảnh:</td>
                <td>
                    <input type="file" name="ffile" />
                </td>
            </tr>
            <tr>
                <td>Tên Công Ty:</td>
                <td>
                    <select name="cboCty">
                        <?php
                            include_once("Controller/cCompany.php");	
                            $comp = new controllerCompany();
                            $tables = $comp -> getAllCompany();
                            if(mysqli_num_rows($tables) >0){
                                while($r = mysqli_fetch_assoc($tables)){
                                    echo "<option value='".$r["ID"]."'>".$r["tenhieu"]."</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trạng Thái:</td>
                <td><input type="text" name="txttrangthai" required /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="txtSub" value="Lưu" />
                    <input type="reset" name="txtReset" value="Tạo Lại" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>