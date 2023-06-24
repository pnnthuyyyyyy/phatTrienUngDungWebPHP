<?php
	include_once("model/mProduct.php");
	class controlProduct{
		function getAllProduct()
		{
			$p = new modelProduct();
			$tblProduct = $p->selectAllProduct();
			return $tblProduct;	
		}
		//thay thế 
		function countProduct()
		{
			$p = new modelProduct();
			$tblProduct = $p->selectAllProduct();
			$totalRecord = mysql_num_rows($tblProduct);
			return $totalRecord;	
		}
		//bổ sung
		function getAllProductPage($item_per_page, $page)
		{
			$p = new modelProduct();
			$tblProduct = $p->selectAllProductPage($item_per_page, ($page-1)*$item_per_page);
			return $tblProduct;	
		}
		
		//lấy sp theo công ty	
		function getAllProductByCompany($comp)
		{
			$p = new modelProduct();
			$tblProduct =  $p->selectAllProductByCompany($comp);
			return $tblProduct;	
		}
		//tìm kiếm theo tên
		function getAllProductBySearch($search)
		{
			$p = new modelProduct();
			$tblProduct =  $p->selectAllProductBySearch($search);
			return $tblProduct;	
		}
		//tìm kiếm theo giá
		//xem thoe mã
		function getProductByID($ma)
		{
			$p = new modelProduct();
			$tblProduct = $p->selectProductByID($ma);
			return $tblProduct;	
		}
		
		//thêm sp
		function addProduct($ten, $gia, $mota, $cty, $file, $tenanh, $loaianh, $sizeanh)
		{
			if($loaianh == 'image/jpeg' || $loaianh == 'image/png' || $loaianh=='image/jpg')
			{
				if($sizeanh <= 2*1024*1024)
				{
					
						if(move_uploaded_file($file, "image/".$tenanh)){
							$p = new modelProduct();
							$edit = $p->insertProduct($ten, $gia, $mota, $tenanh, $cty);
							if($edit)
							{
								return 1;	
							}else{
								return 0; //không thể insert	
							}
						
					}else{
						return -1; //không thể upload	
					}
				}else{
					return -2; //Size ảnh quá lớn	
				}	
			}else{
				return -3;//Không đúng loại file 	
			}	
		}
		
		// xóa theo mã
		function delProduct($ma)
		{
			$p = new modelProduct();
			$res =  $p->deleteProduct($ma);
			return $res;	
		}
		
		function updateProductTest($ma, $ten, $gia, $mota, $tenanh, $cty)
		{
			$p = new modelProduct();
			$res =  $p->updateProduct($ma, $ten, $gia, $mota, $tenanh, $cty);
			return $res;
		}
		
		function editProduct($ma, $ten, $gia, $mota, $cty, $file , $tenanh, $loaianh, $sizeanh)
		{
			if($loaianh == 'image/jpeg' || $loaianh == 'image/png' || $loaianh=='image/jpg')
			{
				if($sizeanh <= 2*1024*1024)
				{
					if(move_uploaded_file($file, "image/".$tenanh)){
						$p = new modelProduct();
						$edit = $p->updateProduct($ma, $ten, $gia, $mota, $tenanh, $cty);
						if($edit)
						{
							return 1;	
						}else{
							return 0; //không thể insert	
						}
						
					}else{
						return -1; //không thể upload	
					}
				}else{
					return -2; //Size ảnh quá lớn	
				}	
			}else{
				return -3;//Không đúng loại file 	
			}	
		}
		
		//lọc giá 
		function searchProductPrice($value){
			$p = new modelProduct();
			$res =  $p->searchProductByPrice($value);
			return $res;
		}
	}
?>