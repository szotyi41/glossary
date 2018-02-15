require(['openscope/api'], function (api) {
	// Init search
	var searchForm = document.forms['searchForm'];
	searchForm.addEventListener('submit', function(event) {
		event.preventDefault();
		var word = searchForm.word.value;
		console.log('Searching for \'' + word + '\'...');
		api.searchGlossary(word, function(result) {
			searchForm.jsonResult.value = result;
		});
	});
});
