<?php
	include_once ("Controller/cProduct.php");
	$p = new controllerProduct();
	if(isset($_REQUEST['IDCty'])){
		$ID = $_REQUEST['IDCty'];
		$tbl = $p -> getAllProductByCom($ID);
	}else{
		$tbl = $p -> getAllProduct();
	}
	if($tbl){
		if(mysqli_num_rows($tbl) > 0){
			$dem = 0;
			echo "<table style='width:100%'>";
				while($row = mysqli_fetch_assoc($tbl)){
					if($dem == 0){
						echo "<tr>";
					}
					
					echo "<td style='width:25%; height:100px'>";
					echo "<img width=165px height=150px src='img/".$row['tenanh']."' />"; //lỗi ảnh thì chỗ này thành image					
					echo "<br>Trạng Thái: ".$row['trangthai']."<br/>Tên SP: ".$row['tensp']."<br>Giá Giảm: ".number_format($row['giagiam'],0,',','.')." VNĐ<br>Giá Đề Xuất:<strong style='text-decoration: line-through'>".number_format($row['giadexuat'],0,',','.')."</strong> VNĐ";
					echo "<br><button><a style='text-decoration:none' href='./view/chitiet.php?id=".$row['ID']."'>Xem Nhanh</a></button>"; 
					echo "</td>";
					
					$dem++;
					if($dem%3==0){
						echo "</tr>";
						$dem=0;
					}
				}
			echo "</table>";
		}else{
			echo "Chưa có sản phẩm nào được thêm ...";
		}
	}else{
		echo "Gia tri NULL !";
	}
?>

