<?php
	include("../config.php");

	$lang_res_all=mysql_query("SELECT * FROM positions");
	$nr_lang=mysql_num_rows($lang_res_all);
	
	$lang_res=mysql_query("SELECT distinct company FROM positions where company not like '%epoka%'");
	$skills=array();
	
	$language_count=array();
	$i=0;
	$ret=array();
	while($row=mysql_fetch_array($lang_res)){
	
		$nr_per_skill=mysql_query("select count(company) from positions where company='".$row['company']."' ");
		$accurance=mysql_result($nr_per_skill,0);
		
		$skills_count[$row['company']]=($accurance/$nr_lang)*100;
		$nr=(round(($accurance/$nr_lang)*100,2));  
		(round(7.055,2));
		$ret[$i]=array(	$row['company'],$nr);
		
		 $skills[$i]=$row['company'];
		$i++;
	}
	substr_replace($ret, "", -1);
	//$ret=$ret."]";
	
	$json = json_encode($ret);     
                echo $json;
	
	

?>	