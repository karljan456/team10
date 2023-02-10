<?php

$servername = "";
$db_user="";
$db_password = "";
$db_name = "";

$con = new mysqli($servername, $db_user, $db_password, $db_name);

if ($con->connect_error)
{
     die("error error erro err er e ....zzzz". $con->connect_error) ;
}





?>