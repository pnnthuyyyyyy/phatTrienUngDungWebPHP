<?php
	include("controller/cCompany.php");
	class viewCompany{
		function viewAllCompany(){
			$p = new controlCompany();
			$tblProduct = $p->getAllCompany();
			$this->displayCompany($tblProduct);	
		}
		function viewAdminCompany(){
			$p = new controlCompany();
			$tblProduct = $p->getAllCompany();
			$this->displayAdminCompany($tblProduct);	
		}
		function displayCompany($tblCompany){
			if($tblCompany)
			{
				if(mysql_num_rows($tblCompany)>0)
				{
					while($row = mysql_fetch_assoc($tblCompany)){
					echo "<div class='vComp'><ul><li><a href='index.php?Comp=".$row['CompID']."'><br>".$row['CompName']."</a></li></ul></div>";	
					}	
				}else{
					echo "0 result";	
				}
			}else{
				echo "meomeo";	
			}
		
		}
		function displayAdminCompany($tblCompany){
			if($tblCompany)
			{
				if(mysql_num_rows($tblCompany)>0)
				{
					$p = new controlCompany();
					echo "<h2>Quản lý sản phẩm</h2>";
					//echo "<a href='admin.php?addProd'>Thêm sản phẩm</a>";
					echo "<table border='1px solid black' style='margin: auto; width=100%; '>";
					echo "<tr><th style='text-align: center;'> ID </th><th style='text-align: center;'>Company Name</th><th style='text-align: center;'>Company Address</th><th>Company Phone</th><th style='text-align: center;'>Email</th></tr>";
					while($row = mysql_fetch_assoc($tblCompany))
					{
						//$img = $row["ProdImage"];
						//$format_price = number_format($row['ProdPrice'],0, ',', '.');
						echo "<tr><td>".$row["CompID"]."</td><td>".$row["CompName"]."</td><td>".$row["CompAddress"]."</td><td>".$row["CompPhone"]."</td><td>".$row['Email']."</td></tr>";
						
					}
					echo "</table><br><br>";
				}else{
					echo "0 result";	
				}
			}else{
				echo "meomeo";	
			}
		
		}
	
	}
?>