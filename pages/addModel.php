<h3>All Models</h3>
<div class="resp-table"> 
<table>
	<tr>
		<?php
			$mdcols = mysqli_query($con, "SHOW COLUMNS FROM assetmodelmaster");
			$i = mysqli_num_rows($mdcols);
			while ($cols=mysqli_fetch_assoc($mdcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$mdsql = mysqli_query($con, "SELECT * FROM assetmodelmaster");
while ($row=mysqli_fetch_array($mdsql)) {
	echo "<tr>";
	for ($j=0; $j < $i ; $j++) { 
		echo "<td>".$row[$j]."</td>";
	}
	echo "<td> <a href=''>Edit</a> / <a href=''>Delete</a> </td> </tr>";
}
?>
</table>
</div>

<div class="container">
    <div class="card">
        <h1 class="card_title">Add Asset Models</h1>
        <p class="card_title-info"></p>
        <form class="card_form" method="post">
            <div class="input">
                <input type="text" name="modelname" class="input_field" required />
                <label class="input_label">Asset Model</label>
            </div>
			<div class="select">
				<select name="brandname" class="select_option">
					<option>Select Brand Name</option>
					<?php
					$bnsql = mysqli_query($con, "SELECT * FROM assetbrandmaster");
					while ($row=mysqli_fetch_array($bnsql)) {
						echo "<option value='$row[AssetBrandId]'>$row[AssetBrandName]</option>";
					}
					?>
				</select>
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
                    $sql = mysqli_query($con,"INSERT INTO assetmodelmaster (AssetModelName,AssetBrandId,IsActive) VALUES ('$modelname','$brandname','$isactive')");
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