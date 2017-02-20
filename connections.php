<?php
	include("../config.php");

	$cer_res_all=mysql_query("SELECT distinct userid FROM connections");
	$nr_cer=mysql_num_rows($cer_res_all);
	
	$user_res_all=mysql_query("SELECT distinct userid FROM connections");
	
	$nr_users=mysql_num_rows($user_res_all);
	
	$conns=array();
	$d=0;
	while($u1=mysql_fetch_array($user_res_all)){
		$conns[$d]=$u1['userid'];
		$d++;		
	}	

	$matrix=array();
	for($aa=0;$aa<$nr_users;$aa++){	
		$matrix[$aa]=array();
		for($bb=0;$bb<$nr_users;$bb++){
			$matrix[$aa][$bb]=0;
		}
	}
	
	for($cc=0;$cc<$nr_users;$cc++){	
		for($dd=0;$dd<$nr_users;$dd++){	
			$u_res=mysql_query("SELECT id FROM connections where userid='".$conns[$cc]."' and id='".$conns[$dd]."'");	
			$nr=mysql_num_rows($u_res);
			if($nr>0){
				$matrix[$cc][$dd]=1;
			}
			
		}	
	}
	
	$tot_ones=0;
	$tot_possib_con=0;
	for($ee=0;$ee<$nr_users;$ee++){	
		
		for($ff=0;$ff<$nr_users;$ff++){	
			
			if($ff>$ee){
			$tot_possib_con++;	
			if($matrix[$ee][$ff]==1){
				$tot_ones++;
			}
		}	
		}
	}
	
	$con_graph=($tot_ones/$tot_possib_con)*100;
	echo "The Epoka University Staff is ".$con_graph." % connected to each other";

?>	