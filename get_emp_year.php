<?php
	include("../config.php");

	$lang_res_all=mysql_query("SELECT * FROM positions");
	$nr_lang=mysql_num_rows($lang_res_all);
	
	$lang_res=mysql_query("SELECT DISTINCT `start-year` FROM positions order by `start-year` asc");
	$skills=array();
	
	$language_count=array();
	$i=0;
	$ret=array();
	while($row=mysql_fetch_array($lang_res)){
	
		$nr_per_skill=mysql_query("select count(`start-year`) from positions where company like '%epoka%' and `start-year`='".$row['start-year']."' ");
		$accurance=(int) mysql_result($nr_per_skill,0);

		$ret[$i]=array(	$row['start-year'],$accurance);
		
		 $skills[$i]=$row['start-year'];
		$i++;
	}
	substr_replace($ret, "", -1);

	
	$json = json_encode($ret);     
  echo $json;
	
	

?>	