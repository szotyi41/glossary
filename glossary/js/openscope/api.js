define({
	searchGlossary: function(word, callback) {
		var ajax = new XMLHttpRequest();
		ajax.addEventListener('load', function() {
			if (this.readyState = 4 && this.status == 200) {
				callback(this.responseText);
			}
		});
		ajax.open('GET', 'api.php?method=searchGlossary&word=' + word);
		ajax.send();
	}
});
