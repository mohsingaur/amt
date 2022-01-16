<h3>All Branches</h3>
<div class="resp-table">
<!-- <table>
	<tr>
		<?php
			// $brcols = mysqli_query($con, "SHOW COLUMNS FROM branchmaster");
			// $i = mysqli_num_rows($brcols);
			// while ($cols=mysqli_fetch_assoc($brcols)) {
			// 	echo "<th>".$cols['Field']."</th>";
			// }
		?>
        <th>StateName</th>
		<th>Modify</th>
	</tr>
 <?php 
// $brsql = mysqli_query($con, "SELECT * FROM branchmaster");
// while ($row=mysqli_fetch_array($brsql)) {
//     $stateid = $row['BranchState'];
//     $statesql=mysqli_query($con, "SELECT StateName FROM indiastatesmaster where StateId=$stateid");
//     $statearr = mysqli_fetch_array($statesql);
//     $statename = $statearr['StateName'];
// 	echo "<tr>";
// 	for ($j=0; $j < $i ; $j++) { 
// 		echo "<td>".$row[$j]."</td>";
// 	}
// 	echo "<td>$statename</td> <td> <a href=''>Edit</a> / <a href=''>Delete</a> </td> </tr>";
// }
  ?>
</table> -->

<table>
	<tr>
		<th>Branch Name</th>
        <th>Branch Status</th>
        <th>State</th>
        <th>Branch Inchrage</th>
        <th>Branch Address</th>
		<th>Modify</th>
	</tr>
<?php
$brsql = mysqli_query($con, "SELECT * FROM branchmaster");
while ($row=mysqli_fetch_array($brsql)) {
    $stateid = $row['BranchState'];
    $branchname = $row['BranchName'];
    $inchargeid = $row['BranchIncharge'];
    $branchaddress = $row['BranchFullAddress'];
    $branchstatus = $row['isActive'];
    
    if($branchstatus == 1){
        $brstatus = "Active";
    }
    else{
        $brstatus = "In-Active";
    }

    $statesql=mysqli_query($con, "SELECT StateName FROM indiastatesmaster where StateId=$stateid");
    $statearr = mysqli_fetch_array($statesql);
    $statename = $statearr['StateName'];
	
    echo "<tr>
        <td>$branchname</td>
        <td>$brstatus</td>
        <td>$statename</td> 
        <td>$inchargeid</td>
        <td>$branchaddress</td>
            
        <td> <a href='#'>Edit</a> / <a href='#'>Delete</a> </td> 
    </tr>";
}
?>
</table>


</div>

<div class="container">
    <div class="card">
        <h1 class="card_title">Add New Branch</h1>
        <p class="card_title-info"></p>
        <form class="card_form" method="post">
            <div class="input">
                <input type="text" name="branchname" class="input_field" required />
                <label class="input_label">Branch Name</label>
            </div>
			<div class="input">
                <input type="text" name="branchaddress" class="input_field" required />
                <label class="input_label">Branch Full Address</label>
            </div>
			<div class="input">
                <input type="text" name="branchlocation" class="input_field" required />
                <label class="input_label">Branch Location</label>
            </div>
            <div class="select">
                <select name="branchstate" class="select_option">
                <option>Select branch State</option>
            <?php
                $statesql=mysqli_query($con, "SELECT StateId,StateName FROM indiastatesmaster");
                while($statearr = mysqli_fetch_array($statesql)){
                    echo "<option value=".$statearr['StateId'].">".$statearr['StateName']."</option>";
                }
                $statename = $statearr['StateName'];
            ?>
                </select>
            </div>

			<div class="input">
                <input type="text" name="branchincharge" class="input_field" required />
                <label class="input_label">Branch Inchrage</label>
            </div>
            <div class="radio">                
                <input type="radio" name="isactive" value="0"> In-Active
                <input type="radio" name="isactive" value="1" checked> Active
            </div>            
            <input type="submit" class="card_button" name="save" value="Save">
        </form>
        <div class="card_info">
            <p>
            <?php
                if (isset($_POST['save'])) {
                    extract($_POST);
                    $sql = mysqli_query($con,"INSERT INTO branchmaster (BranchName,BranchFullAddress,BranchLocation,BranchState,BranchIncharge,isActive) VALUES ('$branchname','$branchaddress','$branchlocation','$branchstate','$branchincharge','$isactive')");
                    if ($sql) {
                        echo "Saved Successfully...";
                    }
                    else{
                        echo "Sorry!";
                    }
                }
            ?>
            </p>
        </div>
    </div> 
</div>

<?php
include 'templates/footer.php';
?>
