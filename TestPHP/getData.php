

		<?php
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		include("data.php");
		include("connector.php");
	

		$mysql_server_name='223.4.134.183:3306';
		$mysql_username='root';
		$mysql_password='eagle';
		$mysql_database='FreexueNav';

		$var = $_GET["level2"];
		$var = iconv("GBK", "UTF-8", $var); 
 		
		//=================================
		if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9.0"))
		{$browser = "Internet Explorer 9.0";   }
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8.0"))
		{$browser = "Internet Explorer 8.0";   }
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0"))      
		{$browser = "Internet Explorer 7.0";  }    
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0"))      
		{$browser = "Internet Explorer 6.0";}
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/5"))      
		{$browser = "Firefox 5";  
		$var = $_GET["level2"];}
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/4"))      
		{$browser = "Firefox 4";  
		$var = $_GET["level2"];}
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/3"))      
		{$browser = "Firefox 3";   
		$var = $_GET["level2"];
		 }  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/2"))      
		$browser = "Firefox 2";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome"))
		{$browser = "Google Chrome";
		$var = $_GET["level2"];
		 }     
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Safari"))      
		{$browser = "Safari";}      
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Opera"))      
		{$browser = "Opera";  }    
	else 	
	{$browser =  $_SERVER["HTTP_USER_AGENT"]; }


		//==================================
		$db = new foo_mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		//echo 'Success... ' . $db->host_info . "\n";

		$result = $db->query("SELECT * FROM Data WHERE level2 = '".$var."'");
		
		$output =  array();
		$key = 0;
		while($row=mysqli_fetch_array($result))
		{
			$id = $row[0];
			$level1 = $row[1];
			$level2 = $row[2];
			$level3 = $row[3];
			$name = $row[4];
			$URL = $row[5];
			$introduction = $row[6];

			$data = new Data();
			$data->id = urlencode($id);
			$data->level1 = urlencode($level1);
			$data->level2 = urlencode($level2);
			$data->level3 = urlencode($level3);
			$data->name = htmlspecialchars_decode(urlencode($name));
			$data->URL = urlencode($URL);
			$data->content = urlencode($introduction);

			
			$output[$key] = $data;
			$key ++;
		}
		//echo "  ".$id."  ".$name."  ".$level1."  ".$level2."  ".$level3."  ".$URL."  ".$introduction."<br>";
		$str = json_encode($output);
		echo urldecode($str);
		
		$db->close();
		?>
