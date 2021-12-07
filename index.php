<?php
include 'bin/config.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>DMI Assets</title>
	<?php include "templates/headers.php"; ?>
</head>
<body>

<?php

?>

<div class="header">
	<div class="logo">
		<span> DMI Dashboard </span>
	</div>
	
	<div class="navigation">
		<?php include "templates/nav.php" ?>
	</div>
</div>

<div class="main">
	
	<div class="side-bar">
			<ul>
				<li>
				<i class="fa fa-home"></i> <a href="index.php?assets">Asset Dashboard</a> 
				</li>
				<li>
				<i class="fa fa-user"></i> <a href="index.php?branches">Branches Dashboard</a> 
				</li>
				<li>
				<i class="fa fa-file"></i> <a href="index.php?printers">Printers Dashboard</a>  
				</li>
			</ul>
	</div>

	<div class="content-area">
			<?php
			if (isset($_GET['dashboard'])) {
				include 'includes/dashboard.php';
			}
			elseif (isset($_GET['addAsset'])) {
				include 'addAsset.php';
			}
			elseif (isset($_GET['addBrand'])) {
				include 'addBrand.php';
			}
			elseif (isset($_GET['addModels'])) {
				include 'addModel.php';
			}
			elseif (isset($_GET['addAssetType'])) {
				include 'addAssetType.php';
			}
			?>
	</div>

</div>

</body>
</html>
