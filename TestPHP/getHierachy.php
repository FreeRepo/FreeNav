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

		

		$db = new foo_mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		//echo 'Success... ' . $db->host_info . "\n";

		$result = $db->query("SELECT level2 FROM Data GROUP BY level2");
		//echo "SELECT * FROM Data WHERE level2 = '".$var."'";

		//printf("Select returned %d rows.\n", $result->num_rows);
		$output = array();
		$key = 0;
		
		while($row=mysqli_fetch_array($result)){
			echo $row[0]."<br>";	
			if ($row[0]!="")
			{
				$output[$key]= urlencode($row[0]);
				$key ++;
			}
		}
		$str = json_encode($output);
		echo urldecode($str);
		
		$db->close();
		
		?>

	</p>
</body>
</html>
