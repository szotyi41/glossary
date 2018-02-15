var glosarSearch = document.getElementById("word");
var glosarResult = document.getElementById("jsonResult");
var xhttp        = new XMLHttpRequest();

xhttp.onreadystatechange = function() {

	if (xhttp.readyState == 4 && xhttp.status == 200) {
		results = xhttp.responseText;
		
		if (results.length == 0) {
			glosarResult.placeholder = "Nincs találat!";
			glosarResult.innerHTML = "";
		} else {
			glosarResult.innerHTML = results;
		}
	}
}

glosarSearch.addEventListener("keyup", function() {
	if (this.value.length < 2) {
		glosarResult.placeholder = "Először gépeljen valamit…";
		return false;
	}
	
	xhttp.open("POST", "../classes/OpenScope/Glossary/Glossary.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=search&term=" + this.value);
});
