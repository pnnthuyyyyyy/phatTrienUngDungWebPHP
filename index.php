<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="image/logo/icons8-the-flash-sign-100.png" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>FlashTel</title>
</head>
<style>
	#a-page{
		background-color: #000;  border: none;  color: white;  padding: 10px 10px;
		text-align: center;  text-decoration: none;  display: inline-block;
		font-size: 13px;  margin: 4px 2px;  cursor: pointer;	
	}

.ul-header ul {
  list-style-type: none;
  margin: 0;
  padding: 20px;
  overflow: hidden;
  background-color: #000;
  text-transform:uppercase;
}

.ul-header li {
  float: left;
  border-right:1px solid #bbb;
  width: 150px;
  
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li :hover:not(.active) {
  background-color: #fff;
}

.active {
  background-color: #09F;
}
.footer .social-list{
    font-size: 24px;
}
.footer .social-list a{
    text-decoration: none;
    /* color: rgba(0, 0, 0, 0.7) */
    color: lightgray;
	font-size:20px
}
.copyright a:hover,
.social-list a:hover{
    opacity: 0.6;
}
.copyright ,
.copyright a{
    margin: 15px 0;
    /* color: rgba(0, 0, 0, 0.7) */
    /*color: lightgray;*/
	font-size:20px;
}
#submit-search{
	border : 1px solid; 
  border-radius: 10px; height:30px; background-color:#99F; color:#fff
}
#ip-search{
	width: 30%; height:30px; border : 1px solid; 
  border-radius: 10px;
  background-color: #ffff;
}
.vComp ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;

}
.vComp li{
	padding:20px;
	width:100%
	
}
.vComp li a {
  display: block;
  color: #000;
  padding-top:3px;
  text-decoration: none !important;
  color:#fff;
  border-radius:10px;
	border:1px solid #000;
  text-transform:uppercase;
  background-color:#09C;
  

}
.vComp li a:hover{
	background-color:#99F;
	color:#fff;
}

</style>
<body>
	<table  border="1px solid purple" style="margin:auto; text-align:center; width:100%">
    	<tr class="normal" style="background-image:url(image/flashtel.Inc-banner.png); background-size:cover; height:170px">
        	<td colspan="2"></td>
        </tr>
        <tr class="normal" style="height:50px; background-color:#000" >
        	<td class="ul-header" style="width:27%">
            	<ul>
  					<li><a class="active" href="index.php">Trang Chủ</a></li>
  					<li><a href="admin.php">Quản lý</a></li>

				</ul>
            </td>
            <td style="padding:20px;">
            	
           		<form action="#" name="fsearch" method="get">
            		<input type="text" name="txtSearch" id="ip-search" placeholder="  Nhập tên sản phẩm....">
                	<input type="submit" value="search name" id="submit-search">
                </form>
                <br>
                <form action="#" name="fsearch_price" method="get">
                    <select name="pricerange" size="1" id="ip-search" class="sl-search">
    					
    					<option value="1">< 1.000.000</option>
   						<option value="2">1.000.000 - 6.000.000</option>
    					<option value="3">6.000.000 - 12.000.000</option>
   						<option value="4">12.000.000 - 20.000.000</option>
   						<option value="5">20.000.000 - 30.000.000</option>
    					<option value="6">> 30.000.000</option>
   						
						</select>
                       
                	<input type="submit" value="search price" name="submit-price" id="submit-search">
                </form>
                
                
            </td>
           
        </tr>
        <tr class="normal">
        	<td id="left" style="background-color:#333; color:#fff; width:27%">
				<?php 
					include_once("view/vCompany.php");
					$c = new viewCompany();
					$c -> viewAllCompany();
					
				?>
            </td>
            <td id="main" style="padding: 20px;">
				<?php 
					include_once("view/vProduct.php");
					$p=new viewProduct();
					include_once("controller/cProduct.php");
					$c=new controlProduct();
					if(isset($_REQUEST["Comp"])){
						$p->viewAllProductByCompany($_REQUEST["Comp"]);
					}
					else if(isset($_REQUEST["txtSearch"])){
						$p->viewAllProductBySearch($_REQUEST["txtSearch"]);
					}
					else if(isset($_REQUEST["pricerange"])){
						$pricerange = $_REQUEST["pricerange"];
						switch ($pricerange){
  case 1  :  $pricerange = "ProdPrice BETWEEN 0 AND 1000000 ";  break;  
  case 2  :  $pricerange = "ProdPrice BETWEEN 1000000 AND 6000000 ";  break;   
  case 3  :  $pricerange = "ProdPrice BETWEEN 6000000 AND 12000000 ";  break;     
  case 4  :  $pricerange = "ProdPrice BETWEEN 12000000 AND 20000000 ";  break;       
  case 5  :  $pricerange = "ProdPrice BETWEEN 20000000 AND 30000000 ";  break;         
  case 6  :  $pricerange = "ProdPrice > 30000000 ";  break;
  //default :  $pricerange = " AProdPrice BETWEEN 0 AND 1000000 "; // covers all other cases
  }
  $p->viewProductPrice($pricerange);
					}else{
						$p->viewAllProductPage();
						$item_per_page = 8;
						$totalPages = $p->viewAllCountPage($item_per_page);
						for($page=1; $page <=$totalPages;$page++){
							echo "<a id='a-page' href='?per_page=8 & page=$page'>$page</a>";
             			}
					}
					
				?>
            </td>
           
		
        </tr>
        
        <tr class="normal">
        	<td colspan="2">
            	
                    <div class="social-list" style="background-color:#000; color:#fff; height:170px; padding-top:50px">
                        <a href=""><i class="glyphicon glyphicon-cloud"></i></a>
                        <a href=""><i class="glyphicon glyphicon-remove"></i></a>
                        <a href=""><i class="glyphicon glyphicon-user"></i></a>
                        <a href=""><i class="glyphicon glyphicon-envelope"></i></a>
                        <a href=""><i class="glyphicon glyphicon-thumbs-up"></i></a>
                         <p class="copyright">
                        Powered by <a href="">FlashTel.com</a>
                        <h3>Phùng Nguyễn Như Thùy - 20116141</h3>
                    </p>
                    </div>
                   
                
            </td>
        </tr>
    </table>
    
    
</body>
</html>