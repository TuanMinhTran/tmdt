<?php
	include_once("ketnoi.php");
	class modelCompany{
		function SelectAllCompany(){
			$p = new ketnoiSQL();
			$con;
			if($p -> ketnoidb($con)){
				$query = "Select * from company";
				$tblCompany = mysqli_query($con,$query);
				$p -> dongketnoi($con);
				return $tblCompany;
			}
		}
	}
?>