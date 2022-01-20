<h3>All Entity</h3>
<div class="resp-table">
<table>
	<tr>
		<?php
			$brcols = mysqli_query($con, "SHOW COLUMNS FROM entitymaster");
			$i = mysqli_num_rows($brcols);
			while ($cols=mysqli_fetch_assoc($brcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$brsql = mysqli_query($con, "SELECT * FROM entitymaster");
while ($row=mysqli_fetch_array($brsql)) {
	echo "<tr> <td>".$row['0']."</td> <td> $row[1] </td> <td> $row[2] </td> <td> $row[3] </td> <td> $row[4] </td> <td> $row[5] </td> <td> <a href=''>Edit</a> / <a href=''>Delete</a> </td> </tr>";
}
?>
</table>
</div>

<div class="container">
    <div class="card">
        <h1 class="card_title">Add Entity</h1>
        <p class="card_title-info"></p>
        <form class="card_form" method="post">
            <div class="input">
                <input type="text" name="entname" class="input_field" required />
                <label class="input_label">Entity Name</label>
            </div>

			<div class="input">
                <input type="text" name="entkey" class="input_field" required />
                <label class="input_label">Entity Abbreviation</label>
            </div>

            <div class="input">                
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
					
				$sql = mysqli_query($con, "INSERT INTO entitymaster (DmiEntityName,DmiEntityAbbreviation,IsActive) VALUES ('$entname','$entkey','$isactive')");
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