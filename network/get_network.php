<?php
	include("../../config.php");

	$conn_res_all=mysql_query("SELECT distinct userid FROM connections");
	$nr_cons=mysql_num_rows($conn_res_all);
	$ret=array();
	$conns=array();
	$i=0;
	$j=0;

	while($row=mysql_fetch_array($conn_res_all)){
		$conns[$i]=$row['userid'];
		$i++;
	}
	
	$boo=1;
	$nm=array();
	foreach($conns as $con){	
		foreach($conns as $co){
			$connect=mysql_query("select id from connections where userid='".$con."' and id='".$co ."' ");
			$exist_con=mysql_num_rows($connect);
			if($exist_con>0){
				
				for($h=0;$h<count($ret);$h++){
				
					if($ret[$h][0]==$co & $ret[$h][1]==$con){
						$boo=0;
					}
				}
				if($boo==1){
					$qu=mysql_query("select firstname,lastname from users where id='".$con."' or  id='".$co."' ");
					
					$nm=NULL;
					$c=0;
					while($r=mysql_fetch_array($qu)){
						$nm[$c]=substr($r['firstname'], 0, 1).".".$r['lastname'];
					$c++;
					}
					
					
					
					$ret[$j]=array(	$nm[0],$nm[1]);
					$j++;
				}
				$boo=1;
				
			
			}	
		}
		
	}
	
	
	$json = json_encode($ret);     
  echo $json;
	
?>	