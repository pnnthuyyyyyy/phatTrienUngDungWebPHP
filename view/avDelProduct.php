<?php
	include("controller/cProduct.php");
	$p = new controlProduct();
	$res = $p->delProduct($_REQUEST["delProd"]);
	if($res){
		echo "<script>alert('Xoa thanh cong !')</script>";
			
	}else
	{
		echo "<script>alert('Khong xoa duoc !')</script>";
		
	}
	echo header("refresh:0; url='admin.php?aProd'");
	
?>