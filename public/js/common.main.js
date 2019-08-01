$(document).ready(function () {
	$('.city.from, .city.to').each(function(i, e){

		$(this).autocomplete({
			source: function (request, response) {
				if (typeof suggestPath === 'undefined'){
					var suggestPath=window.suggestPath;
				}
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
						 if( typeof value =="object"){ con
							 $(event.target).data('category',value.category);
							 $(event.target).data('id',value.id);
						 }else {
							 $(event.target).attr('data-value',ui.item.value);
						 }
					 }

					console.log($(event.target));
					event.preventDefault();

				}
		});
	});
});
