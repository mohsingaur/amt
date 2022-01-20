<?php

//print_r($_SERVER);

//echo "<br><b>".$_SERVER['HTTP_HOST'];

if ($_SERVER['HTTP_HOST']=="localhost") {
	$host = "34.125.183.207";
	$user = "mohsin";
	$password = "root";
	$database = "dmimaster";

	// $host = "localhost";
	// $user = "root";
	// $password = "";
	// $database = "dmimaster";
}
else{
	$host = "http://34.125.183.207/";
	$user = "mohsin";
	$password = "root";
	$database = "dmimaster";
}

$con = mysqli_connect($host,$user,$password,$database);

?>