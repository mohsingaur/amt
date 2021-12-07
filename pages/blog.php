


<?php
	include 'bin/config.php';
	include 'templates/header.php';
	$blogCategory = mysqli_query($con, "SELECT * FROM dmiblogs");
?>

<div style="margin-top: 10px;">
	<div class="col-md-3">
		<h1>Categories</h1>
		<?php 
			while ($catg=mysqli_fetch_assoc($blogCategory)) { 
			echo "<a href='?getcat=".$catg['BlogCategory']."'>".$catg['BlogCategory']."</a><br>";
		}
		?>

		<button>Add New Category</button>
	</div>
	<div class="col-md-9">
		<?php
		
		@$getCat = $_GET['getcat'];
		$blogContent = mysqli_query($con, "SELECT * FROM dmiblogs WHERE BlogCategory='$getCat'");
		while ($row=mysqli_fetch_assoc($blogContent)) { ?>
		<div class="noteBox">
			<div class="noteTitle">
				<a href='javascript:void()'> <?=$row['BlogTitle']?> </a>
			</div>
			<div class="noteContent">
				<?=$row['BlogContent'];?> <a href="javascript:void()">Read More</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<br><br>
	<table>
		<form method="post" action="">
		<tr>
			<td>Blog Title </td> <td> <input type="text" name="title"> </td>
		</tr>

		<tr>
			<td>Blog Content</td> <td> <textarea name="content" id="summernote"></textarea> </td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" name="save"> </td>
		</tr>
		</form>
	</table>

  <!-- <div id="summernote"><p>Hello Summernote</p></div> -->


<?php
if (isset($_POST['save'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$insblog = mysqli_query($con,"INSERT INTO dmiblogs (BlogTitle,BlogContent) VALUES ('$title','$content')");
	if ($insblog) {
		echo "Saved successfully!";
	}
	else{
		echo "Sorry!";
	}
}
?>



  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


<?php
 include 'templates/footer.php';
?>