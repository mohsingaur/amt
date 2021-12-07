<!DOCTYPE html>
<html>
<head>
	<title>DMI Asset Inventory form</title>
	
	<style type="text/css">
		*{
			padding: 0; 
			margin: 0;
			box-sizing: border-box;
			font-family: sans-serif;
		}
		.header{
			height: 100px;
			width: auto;
			background: #f30;
			padding: 35px;
		}
		.header h2{
			color: #fff;
		}
		.sec {
			float: left;
			color: #ffffff;
			border: 1px solid black;
			display: block;
			background: #641889;
			margin: 10px;
			padding: 10px;
			width: 550px;
		}
		#fkey{
			display: none;
		}
		#lsubsec, #tsubsec, #dsubsec, #jsubsec {
			color: #ffffff;
			border: 1px solid black;
			display: none;
			background: #121889;
			margin: 10px;
			padding: 10px;
			width: 420px;
		}
		#lap:checked ~ #lsubsec{
			display: block;
		}
		#tab:checked ~ #tsubsec{
			display: block;
		}
		#don:checked ~ #dsubsec{
			display: block;
		}
		#jio:checked ~ #jsubsec{
			display: block;
		}
		#fina:checked ~ #fkey{
			display: block;
		}

		input[type="text"], [type="number"], [type="date"], select {
			margin: 5px;
			border:none;
			outline: none;
			padding: 5px 10px;
			border-radius: 15px;
		}
	</style>

	<script type="text/javascript">
		var x = document.getElementById('lap');
		//alert(x);
		if (x.checked==true) {
			document.getElementById('lsubsec').style.display = "block";	
		}
		else{
			document.getElementById('lsubsec').style.display = "none";	
		}
	</script>
	
</head>
<body>

<div class="header">
	<h2>DMI Finance Pvt Ltd</h2>
</div>

<div class="form">
	<form method="post" action="" enctype="multipart/form-data">
		<div class="sec">
			<table>
				<tr>
					<td>Employee Id</td> <td><input type="number" name="eid"></td>
				</tr> 
				<tr>
					<td>Employee Name</td> <td><input type="text" name="ename"></td>
				</tr>
				<tr>
					<td>Joinig Date</td> <td><input type="date" name="joindate"></td>
				</tr>
				<tr>
					<td>Supervisor Name</td> <td><input type="text" name="supname"></td>
				</tr>
				<tr>
					<td>Mobile No</td> <td><input type="text" name="mno"></td>
				</tr>
				<tr>
					<td>Personal Email Id</td> <td><input type="text" name="pemail"></td>
				</tr>
				<tr>
					<td>Official Email Id</td> <td><input type="text" name="oemail"></td>
				</tr>
				<tr>
					<td>Entity Name</td> <td><select name="entityname"> <option value="hfc">HFC</option> <option value="nbfc">NBFC</option> </select> </td>
				</tr>
				<tr>
					<td>Branch</td> <td><select name="branch"> <option value="delhiho"> Delhi HO</option> <option value="noida">Noida</option> <option value="ghaziabad">Ghaziabad</option> </select></td>
				</tr>
				<tr>
					<td>Status</td> <td><input type="checkbox" name="empstatus"> Active</td>
				</tr>
			</table>
		</div>

		<div class="sec">
			<input type="checkbox" id="lap" name="laptop" value="1"> Laptop
			
			<div id="lsubsec">
				<label>Laptop S/N</label> <input type="text" name="lapsn"><br>
				<label>Laptop Brand</label> <input type="text" name="lapbrand"> <br>
				<label>Laptop Model</label> <input type="text" name="lapmodel"> <br>
				<label>Laptop Hostname</label> <input type="text" name="laphname"><br>
				<label>Bag</label> <input type="checkbox" name="bag" value="1"><br>
				<label>Mouse</label> <input type="checkbox" name="mouse" value="1"><br>
				<label>Power Adapter</label> <input type="checkbox" name="powercord" value="1"><br>
			</div>
		</div>

		<div class="sec">
			<input type="checkbox" id="tab" name="tablet" value="1"> Tablet 

			<div id="tsubsec">
				Tablet S/N <input type="text" name="tabsn"> <br>
				Tablet Model <input type="text" name="tabmodel"> <br>
				Tablet Model <input type="text" name="tabbrand"> <br>
				Tablet IMEI <input type="text" name="tabimei"> <br>
				Application Installed ~ Gonogo <input type="checkbox" name="gng"> &nbsp;&nbsp;&nbsp;  Finahub <input type="checkbox" id="fina" name="fina"> <br>
				<span id="fkey"> Finahub Iris Key <input type="text" name="fkey"> </span>
			</div>
		</div>

		<div class="sec">
			<input type="checkbox" id="don" name="dongle" value="1"> Dongle

			<div id="dsubsec">
				Mobile No <input type="text" name="dongleno"> <br>
				Dongle Model <input type="text" name="donglemodel"> <br>
				Dongle Model <input type="text" name="donglebrand">
			</div>
		</div>

		<div class="sec">
			<input type="checkbox" id="jio" name="jiofi" value="1"> JioFi

			<div id="jsubsec">
				JioFi S/N <input type="text" name="jiosn"> <br>
				JioFi Model <input type="text" name="jiomodel">
			</div>
		</div>
		<div class="sec">
			<input type="submit" name="save">
		</div>
	</form>
</div>




</body>
</html>

<?php

include 'bin/config.php';

extract($_POST);

if (isset($_POST['save'])) {

	if (isset($laptop)) {
		$l = "1";
	}
	else{
		$l = "0";
	}
	// 	$ins = mysqli_query($con,"INSERT INTO asset_details (laptop,lapsn,laphname,lapmodel,bag,mouse,powcord,lapbrand) VALUES ('$laptop','$lapsn','$laphname','$lapmodel','$bag','$mouse','$powercord','$lapbrand')");
	// }
	// else{
	// 	$ins = mysqli_query($con,"INSERT INTO asset_details (laptop) VALUES ('0')");
	// }
	// if ($ins) {
	// 	echo "Save";
	// }
	// else{
	// 	echo "Sorry";
	// }

/*
	if (isset($tablet)) {
		mysqli_query($con,"INSERT INTO asset_details (tablet,tabsn,tabmodel,tabbrand,tabimei,gng,finahub,fkey) VALUES ('$tablet','$tabsn','$tabmodel',$tabbrand','$tabimei','$gng','$fina',$fkey)");
	}
	else{
		mysqli_query($con,"INSERT INTO asset_details (tablet) VALUES ('0')");
	}

	if (isset($dongle)) {
		mysqli_query($con,"INSERT INTO asset_details (dongle,dongleno,donglemodel,donglebrand) VALUES ('$dongle','$dongleno','$donglemodel','$donglebrand')");
	}
	else{
		mysqli_query($con,"INSERT INTO asset_details (dongle) VALUES ('0')");
	}

	if (isset($jiofi)) {
		mysqli_query($con,"INSERT INTO asset_details (jio,jiosn,jiomodel) VALUES ('$jiofi','$jiosn','jiomodel')");
	}
	else{
		mysqli_query($con,"INSERT INTO asset_details (jio) VALUES ('0')");
	}
	*/

//	$ins = mysqli_query($con, "INSERT INTO asset_details (empid,empname,supervisor,omail,pmail,entityname,branch,empstatus,joiningdate,mnumb,laptop,lapsn,laphname,lapmodel,bag,mouse,powcord,lapbrand) VALUES ('$eid','$ename','$supname','$oemail','$pemail','$entityname','$branch','$empstatus','$joindate','$mno','$l','$lapsn','$laphname','$lapmodel','$bag','$mouse','$powercord','$lapbrand') ");

	
	// if ($ins) {
	// 	echo "Saved";
	// }
	// else{
	// 	echo "Something went wrong";
	// }
	
}


?>