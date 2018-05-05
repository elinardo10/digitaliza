(function() {

	var client = algoliasearch('GX7U9KSN20', '9302c7171b805caafa82ce373ca89a8a');
	var index = client.initIndex('links');
	//initialize autocomplete on search input (ID selector must match)
	autocomplete('#aa-search-input',
		{ hint: false }, {
			source: autocomplete.sources.hits(index, {hitsPerPage: 10}),
	    //value to be displayed in input control after user's suggestion selection
	    displayKey: 'name',
	    //hash of templates used when rendering dataset
	    templates: {
	        //'suggestion' templating function used to render a single suggestion
	        suggestion: function(suggestion) {
	        	return '<span><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ' +
	        	suggestion._highlightResult.name.value + '</span><span>' +
	        	suggestion._highlightResult.link.value + '</span>';
	        },
	        empty: function (result) {
	        	return 'Sorry, we did not find any results for "' + result.query + '"';
	        }
	    }
	}).on('autocomplete:selected', function (event, suggestion, dataset) {
	console.log(suggestion);
//window.location.href = window.location.origin + '/sistema/' + suggestion.slug;
})

})();