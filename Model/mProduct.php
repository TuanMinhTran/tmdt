<?php
	include_once("ketnoi.php");
	class modelProduct{
		function SelectAllProduct(){
			$p = new ketnoiSQL();
			$con;
			if($p -> ketnoidb($con)){
				$query = "Select * from product";
				$tblPro = mysqli_query($con,$query);
				$p -> dongketnoi($con);
				return $tblPro;
			}else{
				return false;
			}
		}
		
		function SelectAllProductByCom($IDCty){
			$p = new ketnoiSQL();
			$con;
			if($p -> ketnoidb($con)){
				$query = "SELECT * FROM  `product` WHERE IDCty = ".$IDCty;
				$tblPro = mysqli_query($con,$query);
				$p -> dongketnoi($con);
				return $tblPro;
			}else{
				return false;
			}
		}
		
		
		
		function InsertProducts($tensp, $gia1, $gia2, $mota, $cty, $tenanh, $trangthai){
			$p = new ketnoiSQL();
			$con;
			if($p -> ketnoidb($con)){
				$query = "insert into product (tensp, Mota, IDCty, tenanh, giagiam, giadexuat, trangthai) values (N'$tensp',N'$mota','$cty','$tenanh', '$gia1', '$gia2', '$trangthai')";
				$kq = mysqli_query($con,$query);
				$p -> dongketnoi($con);
				return $kq;
			}else{
				return false;
			}
		}
									
		
		function InsertTrangThai($trangthai, $iduser){
			$p = new ketnoiSQL();
			$con;
			if($p -> ketnoidb($con)){			
				$query = "INSERT INTO `donhang`(`ID`,`trangthai`) VALUES ($iduser, N'$trangthai')";
				$kq = mysqli_query($con,$query);
				$p -> dongketnoi($con);
				return $kq;
			}else{
				return false;
			}
		}
		
		function ThemLoaiSP($tenhieu){
			$p = new ketnoiSQL();
			$con;
			if($p -> ketnoidb($con)){
				$query = "INSERT INTO `company` (`ID`, `tenhieu`) VALUES (NULL, '$tenhieu');";
				$kq = mysqli_query($con,$query);
				$p -> dongketnoi($con);
				return $kq;
			}else{
				return false;
			}
		}
	}
?>
