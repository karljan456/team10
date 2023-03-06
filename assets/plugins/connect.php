<?php

$hostname = "db";
$db_name = "team10_lfc";
//$db_name = "lfc_blog";
$db_user= "team10_lfc";
//$db_user = "root";
$db_password = "wCZF*Pw[=gML";
//$db_password = "password";


$con = new mysqli($hostname, $db_user, $db_password, $db_name);

if ($con->connect_error)
{
     die("error error: ". $con->connect_error) ;
}
?>