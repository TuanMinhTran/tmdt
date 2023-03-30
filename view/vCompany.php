<?php
	include_once ("Controller/cCompany.php");
	$p = new controllerCompany();
	$tbl = $p -> getAllCompany();
	if(mysqli_num_rows($tbl) > 0){
		while($row = mysqli_fetch_assoc($tbl)){
			echo "<a style='text-decoration:none' href='index.php?IDCty=".$row["ID"]."'>".$row["tenhieu"]."</a><br><br>";
		}
	}
?>