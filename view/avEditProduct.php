<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="image/logo/icons8-the-flash-sign-100.png" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>FlashTel - ADMIN</title></head>
</head>

<body>
<?php
	include("controller/cProduct.php");
	$p = new controlProduct();
	$table = $p->getProductByID($_REQUEST["editProd"]);
	if($table){
		$row = mysql_fetch_assoc($table);
		$id = $row['ProdID'];
		$ten = $row['ProdName'];
		$gia= $row['ProdPrice'];
		$mota = $row['ProdDesciption'];
		$hinh= $row['ProdImage'];
		$cty= $row['CompID'];
	}
?>
	<h2>SỬA SẢN PHẨM</h2>
	<form action="" method="post" enctype="multipart/form-data">
    	<table style="margin:auto; text-align:justify; line-height:40px;">
        			<input  type="hidden" name="txtMa" value="<?php echo $id?>">
              
        	<tr>
            	<td>Tên sản phẩm</td>
                <td>
                	<input width="200" style="text-align:center; width:300px;"  type="text" name="txtTenSP" value="<?php echo $ten;	?>" required>
                </td>
               
            </tr>
          
            <tr>
            	<td>Giá sản phẩm</td>
                <td>
                	<input style="text-align:center; width:300px;" type="number" name="txtGiaSP" value="<?php echo $gia ?>" required>
                </td>
                
            </tr>
            
            <tr>
            	<td>Hình ảnh </td>
                <td>
                	<input type="file" name="fFile">
                    <input type="hidden" name="fFile-old" value="<?php echo $hinh?>" />
                    <br />
                    <br />
                   	<img width="200px" height="200px" src="image/<?php echo $hinh?>" />
                    <br />
                    <br />
                </td>
            </tr>
            
            <tr>
            	<td>Mô tả</td>
                <td>
                	<textarea rows="3" cols="38" value="<?php echo $mota ?>"></textarea>
                </td>
            </tr>
            <tr>
            	<td>Loại sản phẩm</td>
                <td>
                	<select name="cboCty" style="text-align:center; width:300px;">
                   		<?php
							include("controller/cCompany.php");
							$comp = new controlCompany();
							$table = $comp->getAllCompany();
							if(mysql_num_rows($table)){
								while($row = mysql_fetch_assoc($table)){
									if($row['CompID']==$cty){
										echo "<option value=".$row['CompID']." selected>".$row['CompName']."</option>"; 	
									}else{
										echo "<option value=".$row['CompID'].">".$row['CompName']."</option>";
									}
								}	
							}
						?>
                    </select>
                </td>
            </tr>
             <tr>
            	<td></td>
                <td>
                	<input type="submit" name="btnSubmit" value="Cập nhật">
                    <input type="reset" value="Nhập lại" />
                </td>
            </tr>
        </table>
        <br />	
    </form>
<?php
	
	if(isset($_REQUEST["btnSubmit"]))
	{
		$ma = $id;
		$ten = $_REQUEST['txtTenSP'];
		$gia = $_REQUEST['txtGiaSP'];
		$mota = $_REQUEST['txtMota'];
		$cty = $_REQUEST['cboCty'];
		$old_image = $_REQUEST['fFile-old'];
		$file = $_FILES['fFile']["tmp_name"];
		$type = $_FILES['fFile']["type"];
		$name = $_FILES['fFile']['name'];//new image
		$size = $_FILES['fFile']["size"];
		
		
		$p = new controlProduct();
		if($name!='')
		{
			$update_filename = $_FILES['fFile']['name'];
		}
		else 
		{
			$update_filename = $old_image;
		}
		
		if($name!=''){
			$kq = $p->editProduct($ma, $ten, $gia, $mota, $cty, $file , $update_filename, $type, $size);
			//hiển thị các thông báo cần thiết 
			if($kq == 1)
			{
				echo "<script>alert('update dữ liệu thành công !')</script>";
				echo header("refresh:0; url='admin.php?aProd'");
			}elseif($kq==0){
				echo "<script>alert('không thể update !')</script>";
			
			}elseif($kq==-1){
				echo "<script>alert('Không thể upload ảnh!')</script>";
				
			}elseif($kq==-2){
				echo "<script>alert('Size > 2MB !')</script>";
			
			}elseif($kq==-3)
			{
				echo "<script>alert('Không đúng định dạng !')</script>";
			}else {
				echo "Lỗi gì đó !"	;
			}
		}
		else{
			//gọi làm thêm dữ liệu vào DB từ controller
			$kq = $p->updateProductTest($ma, $ten, $gia, $mota, $update_filename, $cty);
			//$kq = $p->editProductTest($ma, $ten, $gia, $mota, $cty, $file, $update_filename);
			//hiển thị các thông báo cần thiết 
			if($kq)
			{
				if($_FILES['fFile']['name']!=''){
				move_uploaded_file($_FILES['fFile']['tmp_name'], "image/".$_FILES['fFile']['name']);
				//unlink("image/".$old_image);
				}
				echo "<script>alert('Update dữ liệu thành công !')</script>";
				echo header("refresh:0; url='admin.php?aProd'");
			}else{
				echo "<script>alert('Update dữ liệu không thành công !')</script>";
				echo header("refresh:0; url='admin.php?aProd'");
			}
		}
		
	}
?>
</body>
</html>