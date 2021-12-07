<?php
include 'bin/config.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Form Type</title>
	<?php include "templates/headers.php"; ?>
    
</head>
<body>

<?php

?>

<div class="header">
	<div class="logo">
		<span> Form Type </span>
	</div>
	
	<div class="navigation">
		<?php include "templates/nav.php" ?>
	</div>
</div>

<div class="main">
	
	<div class="side-bar">
			<ul>
				<li>
				<i class="fa fa-home"></i> <a href="?assets">Asset Form</a> 
				</li>
				<li>
				<i class="fa fa-user"></i> <a href="?branches">Branches Form</a> 
				</li>
				<li>
				<i class="fa fa-file"></i> <a href="?printers">Printers Form</a>  
				</li>
			</ul>
	</div>

	<div class="content-area">
        <?php
            if(isset($_GET['assets'])){
                include "pages/assetForm.php";
            }
        ?>
    </div>

</body>
</html>
