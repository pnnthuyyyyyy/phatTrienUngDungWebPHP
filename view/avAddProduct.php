<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="image/logo/icons8-the-flash-sign-100.png" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>FlashTel - ADMIN</title></head>
</head>

<body>
	<h2>THÊM SẢN PHẨM</h2>
    <form action="#" method="post" enctype="multipart/form-data">
    	<table style="margin:auto; text-align:justify; line-height:40px;">
        	<tr>
            	<td>Tên sản phẩm</td>
                <td>
                	<input width="200" style="text-align:center; width:300px; margin:10px" type="text" name="txtTenSP" required>
                </td>
            </tr>
            <tr>
            	<td>Giá sản phẩm</td>
                <td>
                	<input width="200" style="text-align:center; width:300px; margin:10px" type="number" name="txtGiaSP" required>
                </td>
                
            </tr>
            
            <tr>
            	<td>Hình ảnh</td>
                <td>
                	<input width="200" style="text-align:center; width:300px; margin:10px" type="file" name="fFile" required>
                </td>
            </tr>
            <tr>
            	<td>Mô tả</td>
                <td>
                	<textarea rows="3" cols="38" name="txtMota"></textarea>
                </td>
            </tr>
            <tr>
            	<td>Công ty cung cấp</td>
                <td>
                	<select name="cboCty" width="200" style="text-align:center; width:290px; margin:10px">
                   		<?php
							include("controller/cCompany.php");
							$comp = new controlCompany();
							$table = $comp->getAllCompany();
							if(mysql_num_rows($table)){
								while($row = mysql_fetch_assoc($table)){
									$id = $row["CompID"];
									$name = $row["CompName"];
									echo "<option value='$id'>$name</option>";
								}	
							}
						?>
                    </select>
                </td>
            </tr>
             <tr>
            	<td></td>
                <td>
                	<input type="submit" name="btnSubmit" value="Thêm">
                    <input type="reset" value="Nhập lại" />
                </td>
            </tr>
        </table>
        <br />	
    </form>
   
<?php
	include("controller/cProduct.php");
	if(isset($_REQUEST["btnSubmit"]))
	{
		$ten = $_REQUEST['txtTenSP'];
		$gia = $_REQUEST['txtGiaSP'];
		$mota = $_REQUEST['txtMota'];
		$cty = $_REQUEST['cboCty'];
		$file = $_FILES['fFile']["tmp_name"];
		$type = $_FILES['fFile']["type"];
		$name = $_FILES['fFile']["name"];
		$size = $_FILES['fFile']["size"];
		$p = new controlProduct();
		//gọi làm thêm dữ liệu vào DB từ controller
		$kq = $p->addProduct($ten, $gia, $mota, $cty, $file , $name, $type, $size);
		//hiển thị các thông báo cần thiết 
		if($kq == 1)
		{
			echo "<script>alert('Thêm dữ liệu thành công !')</script>";
			echo header("refresh:0; url='admin.php?aProd'");
		}elseif($kq==0){
			echo "<script>alert('không thể insert !')</script>";
			
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
?>
</body>
</html>