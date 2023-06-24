
<?php
	include_once("ketnoi.php");
	
	class modelCompany{
		function selectAllCompany(){
			//khai bao ket noi
			$con;
			// tao moi doi tuong clsketnoi tu file ketnoi.php
			$p = new clsketnoi();
			//goi ham ketnoiDB, thuc hien ket den CSDL va kiem tra noi duoc hay khong?
			if($p->ketnoiDB($con))
			{
				//lenh truy van toan bo CSDL bang company
				$string = "select *from company";
				//thuc thi lenh truy van, ket qua tra ve la 01 table chua toan bo DL bang company
				$table = mysql_query($string);
				//dong ket noi
				$p->dongketnoi($con);
				//tra ve DL vua thuc thi duoc (de controller nhan va thuc thi)
				return $table;
					
			}
			else 
			{
				return false;	
			}	
		}	
	}
?>
