<?php

$servername = "95.216.139.131";
$db_name = "team10_lfc";
$db_user="team10_lfc";
$db_password = "wCZF*Pw[=gML";


$con = new mysqli($servername, $db_user, $db_password, $db_name);

if ($con->connect_error)
{
     die("error error erro err er e ....zzzz". $con->connect_error) ;
}





?>