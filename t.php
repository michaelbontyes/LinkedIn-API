<?php
include("../config.php");
$nr_q=mysql_query("select distinct userid from languages");
$nr_users=mysql_num_rows($nr_q);
$nr_u=mysql_query("select distinct id from users");
$nr_us=mysql_num_rows($nr_u);

echo  " <b> From ".$nr_us." </b> registered users <b> omly ".$nr_users." </b> of them have provided their known languages";

?>