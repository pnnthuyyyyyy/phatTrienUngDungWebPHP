<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="image/logo/icons8-the-flash-sign-100.png" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>FlashTel - ADMIN</title></head>
<style>
	#a-page{
		background-color: #000;  border: none;  color: white;  padding: 10px 10px;
		text-align: center;  text-decoration: none;  display: inline-block;
		font-size: 13px;  margin: 4px 2px;  cursor: pointer;	
	}
</style>
<body>
	<table  border="1px solid purple" style="margin:auto; text-align:center; width:100%">
    	<tr class="normal" style="background-image:url(image/flashtel.Inc-banner.png); background-size:cover; height:170px">
        	<td colspan="2"></td>
        </tr>
        <tr class="normal" style="height:50px; background-color:#000;">
        	<td colspan="2">
            	<ul>
                <br>
  					<li><a  href="index.php">TRANG CHỦ</a></li><br>
  					<li><a href="admin.php">QUẢN LÝ</a></li>

				</ul>
            </td>
           
        </tr>
        <tr class="normal">
        	<td id="left" style="background-color:#111">
            <br />
            	<a href="admin.php?aComp">QUẢN LÝ LOẠI SẢN PHẨM</a><br /><br />
				<a href="admin.php?aProd">QUẢN LÝ SẢN PHẨM</a>
                <br />
                <br />
                
            </td>
            
            <td id="main">
				<?php 
					if(isset($_REQUEST["aProd"]))
					{
						include("view/vProduct.php");	
						$p = new viewProduct();
						$p->viewAdminProduct();
						
					}elseif(isset($_REQUEST["aComp"])){
						include("view/vCompany.php");	
						$p = new viewCompany();
						$p->viewAdminCompany();
						
					}elseif(isset($_REQUEST["addProd"]))
					{
						include("view/avAddProduct.php");	
					}
					elseif(isset($_REQUEST["delProd"]))
					{
						include("view/avDelProduct.php");	
					}
					elseif(isset($_REQUEST["editProd"]))
					{
						include("view/avEditProduct.php");	
					}
					else{
						echo "TRANG DÀNH CHO ADMIN - FlashTel.INC";	
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