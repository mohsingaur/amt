function genrateField(n){
	var inp = document.getElementById('newfield');
	for (var i = 1; i <= n; i++) {
		var txt = document.createTextNode("Service Tag "+i+" ");
		var br = document.createElement("br");
		var feild = document.createElement("input");
		var type = document.createAttribute("type");
		// var id = document.createAttribute("id");
		// var name = document.createAttribute("name");
		var clas = document.createAttribute("class");
		type.value = "text";
		// id.value = "id"+i;
		// name.value = "sn[]";
		clas.value = "serial";
		inp.appendChild(txt);
		inp.appendChild(feild);
		inp.appendChild(br);
		feild.setAttributeNode(type);
		// feild.setAttributeNode(id);
		// feild.setAttributeNode(name);
		feild.setAttributeNode(clas);
	}
}

// function saveData() {
// 	var str = document.getElementsByTagName('input');
// 	var inputValues = new Array();
// 	var singleInput = "";
// 	for(x in str){
// 		singleInput = str[x].value;
// 		inputValues.push(singleInput);
// 	}
// 	console.log(inputValues);
	
	// var xhttp = new XMLHttpRequest();
	// xhttp.onreadystatechange = function () {
	// 	if (this.readyState == 4 && this.status == 200) {
	// 		document.getElementById('saveres').innerHTML = this.responseText;
	// 	}
	// };
	// xhttp.open("POST","handlers/newPurchase.php?str="+str,true);
	// xhttp.send(null);
//}
