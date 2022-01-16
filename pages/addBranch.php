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