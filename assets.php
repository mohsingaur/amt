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
		<span> DMI Assets </span>
	</div>
	
	<div class="navigation">
		<?php include "templates/nav.php" ?>
	</div>
</div>

<div class="main">
	
	<div class="side-bar">
			<ul>
				<li>
				<i class="fa fa-home"></i> <a href="?generateQuote">Generate New Quote</a> 
				</li>
				<li>
				<i class="fa fa-home"></i> <a href="?purchaseAsset">Purchase New Asset (PO)</a> 
				</li>
				<li>
				<i class="fa fa-user"></i> <a href="?addAsset">Add Assets</a> 
				</li>
				<li>
				<i class="fa fa-file"></i> <a href="?addBrand">Add New Brand</a>  
				</li>
				<li>
				<i class="fa fa-clipboard"></i> <a href="?addModels">Add New Model</a> 
				</li>
				<li>
				<i class="fa fa-folder"></i> <a href="?addAssetType">Add Asset Type</a> 
				</li>
			</ul>
	</div>

	<div class="content-area">
			<?php
			if (isset($_GET['generateQuote'])) {
				include 'pages/genrateQuote.php';
			}
			elseif (isset($_GET['purchaseAsset'])) {
				include 'pages/assetPurchase.php';
			}
			elseif (isset($_GET['addAsset'])) {
				include 'pages/addAsset.php';
			}
			elseif (isset($_GET['addBrand'])) {
				include 'pages/addBrand.php';
			}
			elseif (isset($_GET['addModels'])) {
				include 'pages/addModel.php';
			}
			elseif (isset($_GET['addAssetType'])) {
				include 'pages/addAssetType.php';
			}
			?>
	</div>

</div>

</body>
</html>
