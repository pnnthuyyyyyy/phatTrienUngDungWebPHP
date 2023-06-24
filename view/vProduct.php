<?php
	include("controller/cProduct.php");
	class viewProduct{
		function viewAllProduct(){
			$p = new controlProduct();
			$tblProduct = $p->getAllProduct();
			$this->displayProduct($tblProduct);	
		}	
		function viewAllProductPage()
		{
			
			$p = new controlProduct();
			$page = !empty($_GET["page"])? $_GET["page"]:1;
			$item_per_page = !empty($_GET["per_page"])? $_GET["per_page"]:8;
			$tblProduct = $p->getAllProductPage($item_per_page, $page);
			$this->displayProduct($tblProduct);
		}
		function viewAllCountPage($item_per_page){
			$p = new controlProduct();
			$count = $p->countProduct();
			$totalPages = ceil($count/$item_per_page);
			return $totalPages;
			
		}
		//admin 
		function viewAdminProductPage()
		{
			
			$p = new controlProduct();
			$page = !empty($_GET["page"])? $_GET["page"]:1;
			$item_per_page = !empty($_GET["per_page"])? $_GET["per_page"]:5;
			$tblProduct = $p->getAllProductPage($item_per_page, $page);
			$this->displayAdminProduct($tblProduct);
		}
		//view theo mã
		function viewProductByID($ma)
		{
			$p = new controlProduct();
			$tblProduct = $p->getProductByID($ma);
			$this->displayProduct($tblProduct);	
		}
		function viewAllProductByCompany($comp)
		{
			$p = new controlProduct();
			$tblProduct = $p->getAllProductByCompany($comp);
			$this->displayProduct($tblProduct);	
		}
		function viewAllProductBySearch($search)
		{
			$p = new controlProduct();
			$tblProduct = $p->getAllProductBySearch($search);
			$this->displayProduct($tblProduct);	
		}
		//lọc giá 
		function viewProductPrice($value)
		{
			$p = new controlProduct();
			$tblProduct = $p->searchProductPrice($value);
			$this->displayProduct($tblProduct);	
		}
		function viewAdminProduct(){
			$p = new controlProduct();
			$tblProduct = $p->getAllProduct();
			$this->displayAdminProduct($tblProduct);	
		}
		function displayProduct($tblProduct){
			if($tblProduct)
			{
				if(mysql_num_rows($tblProduct)>0){
					$p = new controlProduct();
					$dem =0;
					echo "<table style='width:100%'>";
					while($row = mysql_fetch_assoc($tblProduct))
					{
						
						$img = $row["ProdImage"];
						if($dem==0)
						{
							echo "<tr>";	
						}
					$format_price = number_format($row['ProdPrice'], 0, ',', '.');
					echo "<td style='border:1px solid #fff; border-radius:10px; background-color: #fff; padding:20px'>";
					echo "<img width=150px height=150px src='image/$img'/>";
					echo "<br><B>".$row['ProdName']."</B><br><div style='color: red'>".$format_price." VNĐ</div><br><br>";
					echo "</td>";
					//echo "<img width=100px height=150px src='image/$img'/>";
					$dem++;
					if($dem%4==0)
					{
						echo "</tr>";
						$dem =0;
					}
				}
				
				echo "</table>";
			}else{
				echo "0 result";	
			}
		}else{
			echo "Khong co gia tri"	;
		}
		
	}
	
	function displayAdminProduct($tblProduct){
			
			if($tblProduct)
			{
				if(mysql_num_rows($tblProduct)>0){
					
					$p = new controlProduct();
					echo "<h2>Quản lý sản phẩm</h2><br>";
					echo "<a href='admin.php?addProd' style='padding:10px;background-color:#99F; color:#fff; border: 1px solid; border-radius: 7px; text-decoration:none;'>Thêm sản phẩm</a><br><br><br>";
					echo "<table border='1px solid black' style='margin: auto; width=100%'>";
					echo "<tr><th style='text-align: center;'> ID </th><th style='text-align: center;'>Product Name</th><th style='text-align: center;'>Product Price</th><th style='text-align: center;'>Product Image</th><th style='text-align: center;'>Action</th></tr>";
					while($row = mysql_fetch_assoc($tblProduct))
					{
						$img = $row["ProdImage"];
						$format_price = number_format($row['ProdPrice'],0, ',', '.');
						echo "<tr><td>".$row["ProdID"]."</td><td>".$row["ProdName"]."</td><td>".$format_price." VNĐ</td><td><img width=150px height=150px src='image/$img'/></td><td><a style='padding:10px;background-color:#99F; color:#fff; border: 1px solid; border-radius: 7px; text-decoration:none;' href='admin.php?editProd=".$row["ProdID"]."'>Sửa</a>  <a style='padding:10px;background-color:red; color:#fff; border: 1px solid; border-radius: 7px; text-decoration:none;' href='admin.php?delProd=".$row["ProdID"]."' onclick='return confirm(\"Ban co chac la xoa khong?\")'>Xóa</a></td>"."</tr>";	
					}
					echo "</table><br><br>";
			}else{
				echo "0 result";	
			}
		}else{
			echo "Khong co gia tri"	;
		}
	}
}
	
		

?>
