<?php
	include_once("model/mCompany.php");
	class controlCompany
	{
		function getAllCompany()
		{
			$p = new modelCompany();
			$tblCompany = $p->selectAllCompany();
			return $tblCompany;	
		}	
	}
?>