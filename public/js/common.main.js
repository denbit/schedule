$(document).ready(function () {
	$('.city.from, .city.to').each(function(i, e){

			$(this).autocomplete({
			'source': function (request, response) {
				console.log(this);
				var result;

						$.ajax({
							url: '/suggest',

							data: {suggest: $(e).val()},
							dataType:"json"
						}).done(function (data, status) {
							response(data);
							console.log(data.length);


			});

		}});
	})

});
