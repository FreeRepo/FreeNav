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

		$id = $_GET["id"];
		
		
		$db = new foo_mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		//echo 'Success... ' . $db->host_info . "\n";
 		$db->query("UPDATE Data SET Click = Click +1 WHERE ID ='".$id."'");
		//echo "SELECT * FROM Data WHERE level2 = '".$var."'";
		//printf("Select returned %d rows.\n", $result->num_rows);
		$db->close();
		?>

	</p>
</body>
</html>