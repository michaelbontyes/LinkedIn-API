<?php
	include("../config.php");

	$cer_res_all=mysql_query("SELECT * FROM certifications");
	$nr_cer=mysql_num_rows($cer_res_all);
	
	$cer_user_res_all=mysql_query("SELECT id FROM users");
	$nr_users=mysql_num_rows($cer_user_res_all);
	
	$avarage=$nr_cer/$nr_users;
	
	$lang_res=mysql_query("SELECT DISTINCT `userid` FROM certifications ");
	$skills=array();
	
	$language_count=array();
	$i=0;
	$ret=array();
	
	$accurance=0;
	
	$ret[0]=array("Average of certificate per person",$avarage);
	while($row=mysql_fetch_array($lang_res)){
	
		$nr_per_skill=mysql_query("select count(`userid`) from certifications where `userid`='".$row['userid']."' ");
		$a=(int) mysql_result($nr_per_skill,0);
		if($a>$accurance){
		$accurance=$a;
		}
		
	}
	$quer=mysql_query("select count(authority) from certifications where authority like '%epoka%'");
	 $cer_by_epoka=(int) mysql_result($quer,0);
			
	
	$ret[1]=array("Most certificated person",$accurance);
	$ret[2]=array("Cerfiticates given by Epoka",$cer_by_epoka);

	
	$json = json_encode($ret);     
                echo $json;
	
	

?>	