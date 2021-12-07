<?php

include 'bin/config.php';

$typedelid = $_GET['typedelid'];

$delsql = mysqli_query($con, "DELETE FROM dmi_asset_type WHERE asset_type_id='$typedelid' ");
if ($delsql) {
	echo "Deleted Successfully...";
}
else{
	echo "Sorry!";
}

?>

<a href="main.php">Go to Main Page</a>