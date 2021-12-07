<h3>Create Database</h3>

<form method="post">
	<label>Enter Host Name</label> <input type="text" name="host"> <br>
	<label>Enter Database Name</label> <input type="text" name="dbname"> <br>
	<label>Enter Password</label> <input type="Password" name="dbpass"> <br>
	<label>Enter Username</label> <input type="text" name="username"> <br>
	<input type="submit" name="savedb">
</form>

<?php

if (isset($_POST['savedb'])) {
	$dbname = $_POST['dbname'];
	$dbpass = $_POST['dbpass'];
	$host = "localhost";
	$username = $_POST['username'];

	$sql = "Create Database $dbname";

}

?>