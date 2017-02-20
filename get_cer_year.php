<?php
	include("../config.php");

	$lang_res_all=mysql_query("SELECT * FROM certifications");
	$nr_lang=mysql_num_rows($lang_res_all);
	
	$lang_res=mysql_query("SELECT DISTINCT `end-date` FROM certifications ");
	$skills=array();
	
	$language_count=array();
	$i=0;
	$ret=array();
	while($row=mysql_fetch_array($lang_res)){
	
		$nr_per_skill=mysql_query("select count(`end-date`) from certifications where `end-date`='".$row['end-date']."' ");
		$accurance=(int) mysql_result($nr_per_skill,0);

		$ret[$i]=array(	$row['end-date'],$accurance);
		
		 $skills[$i]=$row['skill'];
		$i++;
	}
	substr_replace($ret, "", -1);

	
	$json = json_encode($ret);     
                echo $json;
	
	

?>	