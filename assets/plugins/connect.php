<?php

$hostname = "db";
$db_name = "team10_lfc";
$db_user= "team10_lfc";
$db_password = "wCZF*Pw[=gML";



$con = new mysqli($hostname, $db_user, $db_password, $db_name);

if ($con->connect_error)
{
     die("error error: ". $con->connect_error) ;
}
?>