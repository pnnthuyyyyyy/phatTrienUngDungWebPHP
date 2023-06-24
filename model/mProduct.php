<?php
	include_once("ketnoi.php");
	class modelProduct{
		function selectAllProduct(){
			$conn;
			$p = new clsketnoi();
			if($p->ketnoiDB($conn))
			{
				//thêm 
				
				//
				//$string = "select *from Product LIMIT $item_per_page OFFSET $offset";
				$string = "select *from Product";
				$table = mysql_query($string);
				$p->dongketnoi($conn);
				return $table;	
			}
			else 
			{
				return false;	
			}
		}
		//lấy sp theo công ty
		function selectAllProductByCompany($comp)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				$string = "SELECT *FROM product where CompID = ".$comp;
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
					
			}
			else{
				return false;	
			}
		}
		//tìm kiếm
		function selectAllProductBySearch($search)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				$string = "SELECT *FROM product where ProdName like N'%".$search."%'";
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
					
			}
			else{
				return false;	
			}
		}
		
		//phân trang
		function selectAllProductPage($item_per_page, $page)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				//$item_per_page = !empty($_GET['per_page'])? $_GET['per_page']:4;
				//$current_page = !empty($_GET['page'])? $_GET['page']:1;
				//$offset = ($current_page - 1)*$item_per_page;
				//truy vấn dữ liệu lấy danh sách sqp từ vị trí limit đến vị trí count
				
				//$string = "SELECT * FROM product order by ProID desc LIMIT $limit OFFSET $count";
				$string = "select *from Product LIMIT $item_per_page OFFSET $page";
				$table = mysql_query($string);
				
				//thêm
				//$totalRecord = mysql_query("SELECT * FROM product");
				//$totalRecord = $totalRecord->num_rows;
				//$totalPages = ceil($totalRecord/$item_per_page);
				//
				$p->dongketnoi($con);
				return $table;	
			}
			else{
				return false;	
			}
			
		}
		function insertProduct($ten, $gia, $mota, $hinh, $cty)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				$string = "INSERT INTO product(ProdName, ProdPrice, ProdDescription, ProdImage, CompID) VALUES";
				$string .= "(N'".$ten."', N'".$gia."',N'".$mota."',N'".$hinh."',N'".$cty."')";
				$kq = mysql_query($string);
				$p->dongketnoi($con);
				return $kq;	
			}else{
				return false;	
			}
		}
		function deleteProduct($ma)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				$string = "DELETE FROM product WHERE ProdID=$ma";
				$kq = mysql_query($string);
				$p->dongketnoi($con);
				return $kq;	
			}else{
				return false;	
			}
		}
		function updateProduct($ma, $ten, $gia, $mota, $hinh, $cty)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				$string = "UPDATE product SET ProdName=N'".$ten."', ProdPrice=N'".$gia."', ProdDescription=N'".$mota."', ProdImage=N'".$hinh."', CompID=$cty WHERE ProdID=N'".$ma."'";
				$kq = mysql_query($string);
				$p->dongketnoi($con);
				return $kq;	
			}else{
				return false;	
			}
		}
		//select sp theo id
		function selectProductByID($ma){
			$conn;
			$p = new clsketnoi();
			if($p->ketnoiDB($conn))
			{
				//thêm 
				
				//
				//$string = "select *from Product LIMIT $item_per_page OFFSET $offset";
				$string = "select * from Product where ProdID=$ma";
				//$resultSelect = mysql_query($string);
    			//$res = mysql_fetch_array($resultSelect, MYSQL_ASSOC); // 1 record
				$res = mysql_query($string);
				$p->dongketnoi($conn);
				return $res;	
			}
			else 
			{
				return false;	
			}
		}
		//loc theo gia
		function searchProductByPrice($value)
		{
			$con;
			$p = new clsketnoi();
			if($p->ketnoiDB($con))
			{
				$string = "SELECT * FROM product WHERE ".$value;
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
					
			}
			else{
				return false;	
			}
		}
	}
?>