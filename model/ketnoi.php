<?php
	class clsketnoi
	{
		function ketnoiDB(& $conn)
		{
			$conn = mysql_connect("localhost", "meomeo", "meo123");
			mysql_set_charset("utf8");
			//kiem tra neu ket noi thanh cong
			if($conn)
			{
				//chon db can thao tac
				//$db = mysql_select_db("dbtest");
                //return $db;
				return mysql_select_db("flashtel");
			}
			else{
				return false;	
			} 
		}	
		//dong ket noi
		function dongketnoi($conn)
		{
			mysql_close($conn);	
		}
		
	}
?>

  
