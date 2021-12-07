<?php
include 'bin/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include "templates/headers.php" ?>
</head>
<body>

<?php

?>

<div class="header">
	<div class="logo">
		<span> DMI Branches </span>
	</div>
	
	<div class="navigation">
		<?php include "templates/nav.php" ?>
	</div>
</div>

<div class="main">
	
	<div class="side-bar">
			<ul>
				<li>
				<i class="fa fa-home"></i> <a href="?allBranches">ALL Branches</a> 
				</li>
				<li>
				<i class="fa fa-user"></i> <a href="?addBranch">Add New Branch</a> 
				</li>
			</ul>
	</div>

	<div class="content-area">
        	<?php
			if (isset($_GET['allBranches'])) {
				include 'pages/allBranches.php';
			}
			elseif (isset($_GET['addBranch'])) {
				include 'pages/addBranch.php';
			}
			?>
	</div>

</div>

</body>
</html>
