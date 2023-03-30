<?php
	include("Model/mCompany.php");
	class controllerCompany{
		function getAllCompany(){
			$p = new modelCompany();
			$tblCompany = $p -> SelectAllCompany();
			return $tblCompany;
		}
	}
?>