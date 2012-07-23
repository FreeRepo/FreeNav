<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Basic PHP Page</title>
</head>
<body>

	<p>
		<?php  
		include("data.php");
		
		include("connector.php");
	

		
		$mysql_server_name='223.4.134.183:3306';
		$mysql_username='root';
		$mysql_password='eagle';
		$mysql_database='FreexueNav';

		$var = $_GET["level2"];

		$db = new foo_mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		//echo 'Success... ' . $db->host_info . "\n";

		$result = $db->query("SELECT * FROM Data ORDER BY Click DESC LIMIT 12");
		
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

	</p>
</body>
</html>
