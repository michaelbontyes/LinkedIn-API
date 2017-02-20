<?php
	include("../../config.php");

	//$conn_res_all=mysql_query("SELECT distinct userid FROM connections ");
	$conn_res_all=mysql_query("SELECT distinct users.firstname, users.lastname FROM users INNER JOIN connections ON users.id=connections.userid;");
	$nr_cons=mysql_num_rows($conn_res_all);
	$ret=array();
	$i=0;
	
	while($row=mysql_fetch_array($conn_res_all)){
	
		
		$ret[$i]=substr($row['firstname'], 0, 1).".".$row['lastname'];
		$i++;
	}

	
	$json = json_encode($ret);     
  echo $json;
	
	

?>	