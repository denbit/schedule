var autocompleteObj;
$(document).ready(function () {
	$('.city.from, .city.to').each(function(i, e){
		autocompleteObj =getObject(e);
		$(this).autocomplete(autocompleteObj);
	});
});


function getObject(e) {
	 return {
		source: function (request, response) {
		if (typeof suggestPath === 'undefined'){
			var suggestPath=window.suggestPath;
		} console.log(e);
		$.ajax({
			url: suggestPath ||'/suggest',
			data: {suggest: $(e).val()},
			dataType:"json"
		}).done(function (data, status) {
			response(data);
			console.log(data.length);
		});
	},
		select: function( event, ui ) {
			$(event.target)
				.val(ui.item.label);
			let value;
			try {
				value = JSON.parse(ui.item.value)
			}
			finally {
				if( typeof value =="object"){
					$(event.target).data('category',value.category);
					$(event.target).data('id',value.id);
				}else {
					$(event.target).attr('data-value',ui.item.value);
				}
			}

			console.log($(event.target));
			event.preventDefault();

		}
	};

}