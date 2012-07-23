
		<?php
		include("data.php");
		include("connector.php");
		
	

		$mysql_server_name='223.4.134.183:3306';
		$mysql_username='root';
		$mysql_password='eagle';
		$mysql_database='FreexueNav';

		
		
		$db = new foo_mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		//echo 'Success... ' . $db->host_info . "\n";

		$result = $db->query("SELECT level1, level2 FROM Data GROUP BY level2 ORDER BY level1");
		//echo "SELECT * FROM Data WHERE level2 = '".$var."'";

		//printf("Select returned %d rows.\n", $result->num_rows);
		$output = array();
		$last = "";
		
		$subset = array();
		$subkey = 0;
		$juststart = 1;
		while($row=mysqli_fetch_array($result)){
		  if($last != $row[0])
		  {
		  	if ($juststart == 0)
		  	$output[urlencode($last)] = $subset;
		  	else $juststart = 0;
			$subset = array();
			$subkey = 0;
		  }
			if ($row[0]!="")
			{
				$subset[$subkey] = urlencode($row[1]);
				$subkey ++;
			}
			$last = $row[0];
		}
		$str = json_encode($output);
		echo urldecode($str);
		
		$db->close();
		?>
