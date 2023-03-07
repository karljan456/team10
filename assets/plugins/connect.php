<?php

//$hostname = "db";
//$db_name = "team10_lfc";
//$db_user= "team10_lfc";
//$db_password = "wCZF*Pw[=gML";

$hostname = "localhost";
$db_name = "wp_bbcap22_10";
$db_user= "bbcap22_10";
$db_password = "b0R5EHMX";


$con = new mysqli($hostname, $db_user, $db_password, $db_name);

if ($con->connect_error)
{
     die("error error: ". $con->connect_error) ;
}
?>