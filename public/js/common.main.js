$(document).ready(function () {
	$('.city.from, .city.to').each(function(i, e){

			$(this).autocomplete({
				'source': function (request, response) {

					$.ajax({
						url: '/suggest',
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
						$(event.target).attr('data-value',ui.item.value);
					console.log($(event.target));
					event.preventDefault();

				}

		});
	})

});
