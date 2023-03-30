<?php
	class ketnoiSQL{
		function ketnoidb(& $con){
			$con = mysqli_connect("localhost","root","");
			mysqli_set_charset($con,"utf-8");
			if($con){
				return mysqli_select_db($con,"dbmnm");
			}else{
				return false;
			}
		}
		
		function dongketnoi($con){
			mysqli_close($con);
		}
	}
?>
