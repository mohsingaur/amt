<!DOCTYPE html>
<html>
<head>
	<title>Get rgb color</title>
	<script type="text/javascript">
		function color() {
			var red = document.getElementById('red').value;
			var green = document.getElementById('green').value;
			var blue = document.getElementById('blue').value;
			if (red>256 || red<0) {
				alert("Please Enter value between 0-256 only.");
			}
			else if (green>256 || green<0) {
				alert("Please Enter value between 0-256 only.");
			}
			else if (blue>256 || blue<0) {
				alert("Please Enter value between 0-256 only.");
			}
			else{
				document.getElementById('col').style.background = "rgb("+red+","+green+","+blue+")";
			}
			
		}
		
	</script>
</head>
<body>

<table style="float: left; margin: 20px;">
	<tr>
		<td>Red</td> <td> <input type="number" min="0" max="256" name="red" id="red"> </td>
	</tr>
	<tr>
		<td>Green</td> <td> <input type="number" min="0" max="256" name="green" id="green"> </td>
	</tr>
	<tr>
		<td>Blue</td> <td> <input type="number" min="0" max="256" name="Blue" id="blue"> </td>
	</tr>
	<tr>
		<td> <input type="button" name="click" value="Click Here" onclick="color()"> </td>
	</tr>

</table>

	<div id="col" style="height: 100px; width: 100px; padding: 25px; margin: 20px; box-sizing: border-box; border: 1px solid #ddd; float: left; background: rgb(0,0,0);"> Dekha Kamal </div>

</body>
</html>