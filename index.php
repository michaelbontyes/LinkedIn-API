<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="UTF-8">
	
	<!-- Remove this line if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width">
	
	<meta name="description" content="Designa Studio, a HTML5 / CSS3 template.">
	<meta name="author" content="Sylvain Lafitte, Web Designer, sylvainlafitte.com">
	
	<title>Company Stats</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/png" href="favicon.png">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	

</head>


<body>

<div class="container">

	<header id="navtop">
		<a href="index.php" class="logo fleft">
			Company Stats
		</a>
		
		<nav class="fright">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About</a></li>
			</ul>
			
		</nav>
	</header>


	<div class="blog-page main grid-wrap">

		<header class="grid col-full">
			<hr>
			
		</header>
		
				
		<section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
		
	<?php
include("../config.php");
// Change these
define('API_KEY',      '771wxmxqp0nyw9'                                          );
define('API_SECRET',   'qvfuBCW432Xq2KZv'                                       );
define('REDIRECT_URI', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
define('SCOPE','r_fullprofile r_basicprofile r_network rw_nus');
 
// You'll probably use a database
session_name('linkedin');
session_start();
 
// OAuth 2 Control Flow
if (isset($_GET['error'])) {
    // LinkedIn returned an error
    print $_GET['error'] . ': ' . $_GET['error_description'];
    exit;
} elseif (isset($_GET['code'])) {
    // User authorized your application
    if ($_SESSION['state'] == $_GET['state']) {
        // Get token so you can make API calls
        getAccessToken();
    } else {
        // CSRF attack? Or did you mix up your states?
        exit;
    }
} else { 
    if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
        // Token has expired, clear the state
        $_SESSION = array();
    }
    if (empty($_SESSION['access_token'])) {
        // Start authorization process
        getAuthorizationCode();
    }
}
 
// Congratulations! You have a valid token. Now fetch your profile 

$user2 = fetch('GET', '/v1/people/~/network(updates)');

$user = fetch('GET', '/v1/people/~:(id,firstName,lastName,headline,picture-url,skills,public-profile-url,industry,connections,network:(updates),positions:(title,start-date,end-date,is-current,company:(id,name,size)),languages:(id,language,proficiency),num-recommenders,volunteer,educations,certifications:(id,name,authority,start-date,end-date),publications)');
$user3 = fetch('GET', '/v1/people/~:(id,firstName,lastName,picture-url,skills,industry)');

$userid=$user->id;
$firstname=$user->firstName;
$lastname=$user->lastName;
$headline=$user->headline;
$industry=$user->industry;
$picture=$user->public-profile-url;
$skills=$user->skills;
$languages=$user->languages;
$positions=$user->positions;
$certifications=$user->certifications;
$publications=$user->publications;
$educations=$user->educations;

$connections=$user->connections;


$network=$user->network;

//var_dump($user->network);

//positions
/*
foreach ($positions->values as $pos) {
	echo $pos->company->id ."  id<br/>";
	echo $pos->company->name ."  name<br/>";
	echo $pos->company->size ."  size<br/>";
	echo $pos->isCurrent ."  isCurrent<br/>";
	echo $pos->startDate->month."  month<br/>";
	echo $pos->startDate->year."  year<br/>";
	echo $pos->title."  title<br/>";
	
}

*/

//langauges
/*
foreach ($languages->values as $pos) {
	echo $pos->id;
	
	echo $pos->language->name ."  <br/>";
	echo $pos->proficiency->name ."  <br/>";
}
*/

//educations
/*
	if ($user->educations->_total!=0){
		foreach ($educations->values as $edu) {

			echo $edu->degree ."  degree<br/>";
			echo $edu->endDate->year ."  enddate year<br/>";
			echo $edu->fieldOfStudy ."  fieldOfStudy<br/>";
			echo $edu->id ."  id<br/>";
			echo $edu->schoolName ."  schoolName<br/>";
			echo $edu->startDate->year ."  startDate<br/>";
}
}
*/

//certifications
/*
foreach ($certifications->values as $cer) {

	echo $cer->id ."  id<br/>";
	echo $cer->name ."  name<br/>";
	echo $cer->authority->name."  month<br/>";
	echo $cer->startDate->year."  month<br/>";
	echo $cer->endDate->year."  year<br/>";

}

*/


//skills
/*
foreach ($skills->values as $arr) {
		echo $skill_id=$arr->id." ";
		echo $skill_name=$arr->skill->name." <br/>";
}
*/


//publications

//var_dump($user->publications);
/*
if ($publications->_total!=0){
	foreach ($publications->values as $pab) {

		echo $pab->date->day ."  day<br/>";
		echo $pab->date->month ."  month<br/>";
		echo $pab->date->year ."  year<br/>";
		echo $pab->id ."  id<br/>";
		echo $pab->title ."  title<br/>";
		//echo $pab->name->publisher."  publisher<br/>";

	}
} else echo "pub null ";

*/
// connections

/*
if($user->connections->_total!=0){
	foreach ($connections->values as $con) {

		echo "Name  ". $con->firstName;
		echo " ".$con->lastName ."  ";
		echo $con->id ."  <br/>";

	}
} else echo "con is null, ";
*/


// network

/*
if($network != null){
	foreach ($network->values as $net) {

		echo "is commen  ". $net->networkStats->isCommentable;
		//echo " ".$net->updateComments ."  ";

	}
}
*/



	//echo " total ".$user->connection->_total."<br/>";
/*
	var_dump($user->network);
	echo " conns<br/>";
	if(($user->connections->_total)==0) echo " is 0";
	echo "<br/>skills==== ";
	var_dump($user->skills);
	echo "<br/> positions==== ";
	var_dump($user->positions);
	echo "<br/>lang==== ";
	var_dump($user->languages);
	echo "<br/>edu==== ";
	var_dump($user->educations);
	echo "<br/>publicat==== ";
	var_dump($user->publicatons);
	echo "<br/>cert==== ";
	var_dump($user->certifications);
*/
	
	//if(($user->certifications->_total)==0) echo " is 0";
	echo "<h5>Welcome ".$firstname ." ".$lastname."</h5> Thank you for your contribution!<br/>" ;  
	//echo  " User Id ".$userid ;
	//echo  "<br/> Firstname ".$firstname ;
	//	echo  "<br/> Lastname ".$lastname ;
	//echo  "<br/> industry ".$industry ;
	//echo  "<br/> picture ".$picture ;

	
//print_r($user->skills->value[0]);
//var_dump($user2->updates);



//print "Hello $user->firstName $user->lastName  <br/> Your ID:  $user->id  <br/>";



$query="select id from users where id= '".$userid."' ";
	$res=mysql_query($query);
	$exist=mysql_num_rows($res);
	
	if($exist >0){
	// update user info

	//echo "Welcome Back! ";
	
	$keys = array("firstname", "lastname");
	
	//foreach($keys as $key){
	//mysql_query("UPDATE users SET  ".$key."='".$$key."'  WHERE id = '".$userid."'") or die(mysql_error());
	
	//}
	
	}
	else{	
	// insert user data for the first time
	
	//echo "Welcome!>";
	
	//insert user details at users table
	 
		 $insert_users=mysql_query("insert into users(`id`,`firstname`,`lastname`,`industry`) values( '".$userid."',  '". $firstname."' , '".$lastname."',\"".$industry ."\" )");
	
	//insert user's skills
	
	
	if($user->skills->_total!=0){
		foreach ($skills->values as $arr) {
			$skill_id=$arr->id;
			$skill_name=$arr->skill->name;
			//echo $skill_name."<br/>";
			
			 $insert_skills=mysql_query("insert into skills(`id`,`userid`,`skill`) values( '".$skill_id."',  '". $userid."' , \"".$skill_name."\" )") ;
		}
	} //else  echo "skills is null <br/>";
	
	
	// insert user's connections
	//var_dump($user->connections);
	//echo "total cons ".$user->connections->_total;
if($user->connections->_total!=0){
	//echo "sizeof ".sizeof($connections);
	//echo "is in ";
	foreach ($connections->values as $con) {

		$con_name= $con->firstName;
		$con_sname=$con->lastName;
		$con_id=$con->id;
		$con_industry=$con->industry;
		$con_location=$con->location->name;
		$con_url=$con->url;
		
		 $insert_conn=mysql_query("INSERT INTO connections (`id`, `userid`, `firstName`, `lastName`, `industry`, `location`, `url`) VALUES ('".$con_id."', '".$userid."', '".$con_name."', '".$con_sname."', \"".$con_industry ."\", '".$con_location."', '".$con_url."'); ") ;

	
	}
} 	//else echo "con is null <br/>";
			
	//insert user's publications
	if ($publications->_total!=0){
		foreach ($publications->values as $pub) {
			 $bup_id=$pub->id;
			 $bup_tittle=$pub->title ;
			 $bup_day=$pub->date->day ;
			 $bup_month=$pub->date->month ;
			 $bup_year=$pub->date->year ; 
			 
			
			 $insert_publications=mysql_query("INSERT INTO publications (`id`, `userid`, `title`, `publisher`, `authors`, `date`, `url`, `summary`) VALUES ('". $bup_id."', '".$userid."', \"".$bup_tittle."\", NULL, NULL, '".$bup_year."', NULL, NULL);") ;
			
		}
	}	// else echo "publications is null <br/>";
	
	//insert user's certifications
	
	if ($certifications->_total!=0){
	
		foreach ($certifications->values as $cer) {
			$cer_name= $cer->name;
			$cer_id= $cer->id;
			$authority_cer=$cer->authority->name;
			 $sdate=$cer->startDate->year;
			 $edate=$cer->endDate->year;
			 $insert_certifications=mysql_query("INSERT INTO certifications(`id`, `userid`, `authority`, `number`, `start-date`, `end-date`,`name`) VALUES ('".$cer_id."', '".$userid."', \"".$authority_cer."\", NULL, ".$sdate.", ".$edate.",\"".$cer_name."\");");
			
		}
	} //  else echo "cert is null <br/>";
	
	//insert user's educations
	
	if ($user->educations->_total!=0){
		//echo "in edu ";
		foreach ($educations->values as $edu) {
			//echo $userid;
			$degree =$edu->degree;
			$endy= $edu->endDate->year;
			$field=$edu->fieldOfStudy ;
			$ed_id= $edu->id;
			$sname= $edu->schoolName;
			$starty= $edu->startDate->year;
			//echo "$sname";
			
			 $insert_educations=mysql_query(" INSERT INTO educations(`id`, `userid`, `school-name`, `field-of-study`, `start-date`, `end-date`, `degree`) VALUES ('".$ed_id ."', '".$userid."', \"" .$sname ."\", \"". $field. "\", '". $starty."', '" .$endy . "', \"". $degree."\"); ") ;
			
			}
	} //  else echo "edu is null <br/>";
	
	
	// insert user's languages  ok
	
	if($user->languages->_total!=0){

			foreach ($languages->values as $pos) {
				$lan_id= $pos->id;
				
				$lan_name= $pos->language->name;
				
				$lan_pro= $pos->proficiency->name ;

				 $insert_languages=mysql_query(" INSERT INTO languages(`id`, `userid`, `language`, `proficiency`) VALUES ('".$lan_id ."', '". $userid ."', \"".$lan_name ."\", \"".$lan_pro."\")");
			}
	}  // else echo "lang is null <br/>";
	
	
	
	// insert user's positions  ok
	
	//echo "tot ".$user->positions->_total;
	if($user->positions->_total!=0){
		
		foreach ($positions->values as $pos) {
			 $com_id=$pos->company->id;
			 $com_name=$pos->company->name;
			 $com_size=$pos->company->size ;
			 $iscurr=$pos->isCurrent;
			 $pos_start_m=$pos->startDate->month;
			 $pos_start_y=$pos->startDate->year;
			 $pos_title=$pos->title;
			
			 $insert_position=mysql_query(" INSERT INTO positions (`id`, `userid`, `title`, `summary`, `start-month`, `start-year`, `is-current`, `company`) VALUES ('". $com_id ."', '".$userid."', '".$pos_title."', NULL, '".$pos_start_m."', '".$pos_start_y."', '".$iscurr."', \"" .$com_name."\"); ") ;
			
			 //if($insert_positions2){echo "pos inserted";} else {echo mysql->error;}
		}
	}	// else echo "position is null <br/>";
	
	
	//if ($insert_users ){
	//echo '</br> inserted ok';

	//}
	//else{
	//echo '</br> not inserted';
	
	//}
	
	}
	?>
	<center>
	
	<h5>Language Statistics </h5>
	
	<iframe src="lang.php" width='800px' height='500px'>  </iframe>
	<br/>
	
	<h5>Skills Statistics</h5>
	<hr/>
	<iframe src="skills.php" width='800px' height='500px'>   </iframe>
	<br/>
	
	<h5>Certifications Statistics</h5>
	
	<iframe src="cer_year.php" width='800px' height='500px'>   </iframe>
	<br/>
	<hr/>
	<iframe src="cer_general.php" width='800px' height='500px'>   </iframe>
	<h5>Employment Statistics</h5>
	
	<iframe src="prev_company.php" width='800px' height='500px'>   </iframe>
	<br/>
	<hr/>
	<iframe src="emp_year.php" width='800px' height='500px'>   </iframe>
	<h5>Staff Connetion Statistics</h5>
	
	<iframe src="network/demo2.php" width='800px' height='500px'>   </iframe>
	<br/>
	<hr/>
	<iframe src="connections.php" width='800px' height='500px'>   </iframe>
	
	
	</center>
	<?php
	//include("lang.php"); 
	//echo "<hr/>";
	//include("skills.php");
	//exit;
	
 
function getAuthorizationCode() {
    $params = array('response_type' => 'code',
                    'client_id' => API_KEY,
                    'scope' => SCOPE,
                    'state' => uniqid('', true), // unique long string
                    'redirect_uri' => REDIRECT_URI,
              );
 
    // Authentication request
    $url = 'https://www.linkedin.com/uas/oauth2/authorization?' . http_build_query($params);
     
    // Needed to identify request when it returns to us
    $_SESSION['state'] = $params['state'];
 
    // Redirect user to authenticate
    header("Location: $url");
    exit;
}
     
function getAccessToken() {
    $params = array('grant_type' => 'authorization_code',
                    'client_id' => API_KEY,
                    'client_secret' => API_SECRET,
                    'code' => $_GET['code'],
                    'redirect_uri' => REDIRECT_URI,
              );
     
    // Access Token request
    $url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query($params);
     
    // Tell streams to make a POST request
    $context = stream_context_create(
                    array('http' => 
                        array('method' => 'POST',
                        )
                    )
                );
 
    // Retrieve access token information
    $response = file_get_contents($url, false, $context);
 
    // Native PHP object, please
    $token = json_decode($response);
 
    // Store access token and expiration time
    $_SESSION['access_token'] = $token->access_token; // guard this! 
    $_SESSION['expires_in']   = $token->expires_in; // relative time (in seconds)
    $_SESSION['expires_at']   = time() + $_SESSION['expires_in']; // absolute time
     
    return true;
}
 
function fetch($method, $resource, $body = '') {
    $params = array('oauth2_access_token' => $_SESSION['access_token'],
                    'format' => 'json',
              );
     
    // Need to use HTTPS
    $url = 'https://api.linkedin.com' . $resource . '?' . http_build_query($params);
    // Tell streams to make a (GET, POST, PUT, or DELETE) request
    $context = stream_context_create(
                    array('http' => 
                        array('method' => $method,
                        )
                    )
                );
 
 
    // Hocus Pocus
    $response = file_get_contents($url, false, $context);
 
    // Native PHP object, please
    return json_decode($response);
}
?>
		
		
		
		
		
	</div> <!--main-->

<div class="divide-top">
	<footer class="grid-wrap">
		<ul class="grid col-one-third social">
			<li><a href="#">RSS</a></li>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Google+</a></li>
			<li><a href="#">Flickr</a></li>
		</ul>
	
		<div class="up grid col-one-third ">
			<a href="#navtop" title="Go back up">&uarr;</a>
		</div>
		
		<nav class="grid col-one-third ">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="works.html">Works</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</nav>
	</footer>
</div>

</div>

<!-- Javascript - jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>

<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr.js"></script>
<![endif]-->

<script src="js/scripts.js"></script>

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>