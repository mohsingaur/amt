&nbsp;
<?php

$link = mysqli_connect("localhost","root","","expense");

// $create_table = mysqli_query($link, "CREATE TABLE group2 (id int, name1 varchar(255), name2 varchar(255), name3 varchar(255), name4 varchar(255)) ");
// if ($create_table) {
// 	echo "New Table has been created.";
// }
// else{
// 	echo "Table Already exist.";
// }

$drop_table = mysqli_query($link, "DROP TABLE group1");
if ($drop_table) {
	echo "Table has been deleted.";
}
else{
	echo "No Table found";
}

?>