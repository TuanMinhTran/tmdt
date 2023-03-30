<?php
	//include_once("../Model/mProduct.php");
	include_once("Model/mProduct.php");
	class controllerProduct{
		function getAllProduct(){
			$p = new modelProduct();
			$tblPro = $p -> SelectAllProduct();
			return $tblPro;
		}
		
		function getAllProductByCom($IDCty){
			$p = new modelProduct();
			$tblPro = $p -> SelectAllProductByCom($IDCty);
			return $tblPro;
		}
		
		
		
		function  AddProducts($tensp, $gia1, $gia2, $mota, $cty, $file, $tenanh, $loaianh, $sizeanh, $trangthai){
			if($loaianh=="image/jpeg" || $loaianh=="image/png"){
				if($sizeanh <= 40*1024*1024){
					if(move_uploaded_file($file,"img/".$tenanh)){
						$p = new modelProduct();
						$addPro = $p -> InsertProducts($tensp, $gia1, $gia2, $mota, $cty, $tenanh, $trangthai);
						if($addPro){
							return 1;
						}else{
							return 0; //không thể insert
						}
					}else{
						return -1; //không thể upload
					}
				}else{
					return -2; //chỉ được upload file <= 2 MB
				}
			}else{
				return -3; //Không thể upload ảnh (chỉ được upload JPEG hoặc PNG)
			}
		}
		
		
		function  AddTrangthai($trangthai, $iduser){
						$p = new modelProduct();
						$donhang = $p -> InsertTrangThai($trangthai, $iduser);
						if($donhang){
							return 1; //Đổi trạng thái thành công !
						}else{
							return 0; //Đổi trạng thái thất bại !
						}
		}
		
		function AddLoaiSP($tenhieu){
			if($tenhieu){
				$p = new modelProduct();
				$addtenhieu = $p -> ThemLoaiSP($tenhieu);
				if($addtenhieu){
					return 1;
				}else{
					return 0; //vui lòng không để trống
				}
			}
		}
	}
?>