<?php

//print_r($_SERVER);

//echo "<br><b>".$_SERVER['HTTP_HOST'];

if ($_SERVER['HTTP_HOST']=="localhost") {
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "dmimaster";
}
else{
	$host = "";
	$user = "";
	$password = "";
	$database = "";
}

$con = mysqli_connect($host,$user,$password,$database);

?>