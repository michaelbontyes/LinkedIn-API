<?php
	include("../config.php");

	$lang_res_all=mysql_query("SELECT * FROM skills");
	$nr_lang=mysql_num_rows($lang_res_all);
	
	$lang_res=mysql_query("SELECT skill, COUNT( skill ) FROM skills
GROUP BY skill 
ORDER BY COUNT( skill ) DESC 
LIMIT 0 , 20");
	$skills=array();
	
	$language_count=array();
	$i=0;
	$ret=array();
	while($row=mysql_fetch_array($lang_res)){
	
		$nr_per_skill=mysql_query("select count(skill) from skills where skill='".$row['skill']."' ");
		$accurance=mysql_result($nr_per_skill,0);
		
		$skills_count[$row['skill']]=($accurance/$nr_lang)*100;
		
		$nr=(round(($accurance/$nr_lang)*100,2));  
		(round(7.055,2));
		$ret[$i]=array(	$row['skill'],$nr);
		
		 $skills[$i]=$row['skill'];
		$i++;
	}
	substr_replace($ret, "", -1);

	
	$json = json_encode($ret);     
   echo $json;
	
	

?>	