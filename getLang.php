<?php
	include("../config.php");

	$lang_res_all=mysql_query("SELECT * FROM languages");
	$nr_lang=mysql_num_rows($lang_res_all);
	
	$lang_res=mysql_query("SELECT distinct language FROM languages");
	$skills=array();
	
	$language_count=array();
	$i=0;
	$ret=array();
	while($row=mysql_fetch_array($lang_res)){
	
		$nr_per_skill=mysql_query("select count(language) from languages where language='".$row['language']."' ");
		$accurance=mysql_result($nr_per_skill,0);
		
		$skills_count[$row['language']]=($accurance/$nr_lang)*100;
		$nr=(round(($accurance/$nr_lang)*100,2));  
		(round(7.055,2));
		$ret[$i]=array(	$row['language'],$nr);
		
		 $skills[$i]=$row['language'];
		$i++;
	}
	substr_replace($ret, "", -1);
	
	$json = json_encode($ret);     
  echo $json;
	
	

?>	