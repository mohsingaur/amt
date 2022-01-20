<?php
include 'bin/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include "templates/headers.php" ?>
</head>
<body>

<div class="header">
	<div class="logo">
		<span> DMI Master </span>
	</div>
	
	<div class="navigation">
		<?php include "templates/nav.php" ?>
	</div>
</div>

<div class="main">
	
	<div class="side-bar">
			<ul>
				<li>
				    <i class="fa fa-folder"></i> <a href="?addEmployee">Add Employee</a> 
				</li>
                <li>
				    <i class="fa fa-folder"></i> <a href="?addAssetType">Add Asset Type</a> 
				</li>
                <li>
				    <i class="fa fa-file"></i> <a href="?addBrand">Add New Brand</a>  
				</li>
				<li>
				    <i class="fa fa-clipboard"></i> <a href="?addModels">Add New Model</a> 
				</li>

				<li>
				    <i class="fa fa-clipboard"></i> <a href="?addOS">Add Operating System</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addProcessor">Add New Processor</a> 
				</li>
                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addRamType">Add RAM Type</a> 
				</li>
                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addAssetStatus">Add Asset Status</a> 
				</li>
                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addStorageType">Add Storage Type</a> 
				</li>
                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addStorageSize">Add Storage Size</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addEntity">Add Entity</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addDepartment">Add Department</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addVendor">Add Vendor</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addVendorAccount">Add Vendor Accounts</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addEmpStatus">Add Employee Status</a> 
				</li>

                <li>
				    <i class="fa fa-clipboard"></i> <a href="?addEmpDesignation">Add Employee Designation</a> 
				</li>               
				
				<li>
				    <i class="fa fa-home"></i> <a href="?generateQuote">Generate New Quote</a> 
				</li>

				<li>
				    <i class="fa fa-home"></i> <a href="?purchaseAsset">New Asset Purchase (PO)</a> 
				</li>

				<li>
				    <i class="fa fa-user"></i> <a href="?addAsset">Add Assets</a> 
				</li>
				
			</ul>
	</div>

	<div class="content-area">
			<?php
			if (isset($_GET['generateQuote'])) {
				include 'pages/genrateQuote.php';
			}
			elseif (isset($_GET['addEmployee'])) {
				include 'pages/addEmployee.php';
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
            elseif (isset($_GET['addProcessor'])) {
				include 'pages/addProcessor.php';
			}
            elseif (isset($_GET['addRamType'])) {
				include 'pages/addRamType.php';
			}
            elseif (isset($_GET['addAssetStatus'])) {
				include 'pages/addAssetStatus.php';
			}
            elseif (isset($_GET['addStorageType'])) {
				include 'pages/addStorageType.php';
			}
            elseif (isset($_GET['addStorageSize'])) {
				include 'pages/addStorageSize.php';
			}            
            elseif (isset($_GET['addDepartment'])) {
				include 'pages/addDepartment.php';
			}
            elseif (isset($_GET['addEntity'])) {
				include 'pages/addEntity.php';
			}
            elseif (isset($_GET['addVendor'])) {
				include 'pages/addVendor.php';
			}
			elseif (isset($_GET['addVendorAccount'])) {
				include 'pages/addVendorAccount.php';
			}
			elseif (isset($_GET['addEmpStatus'])) {
				include 'pages/addEmpStatus.php';
			}
			elseif (isset($_GET['addEmpDesignation'])) {
				include 'pages/addEmpDesignation.php';
			}
			elseif (isset($_GET['addOS'])) {
				include 'pages/addOS.php';
			}
            elseif (isset($_GET['addAsset'])) {
				include 'pages/addAsset.php';
			}
			?>
	</div>

</div>

</body>
</html>
