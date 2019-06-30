$(document).ready(function () {
	$('.form_container_search .from').autocomplete({
		'source': function (request, response) {
			var result;
			// 		$.ajax({
			// 			url: '/suggest',
			// 			data: {suggest: $('.form_container_search .from').val()}
			// 		}).done(function (data, status) {
			// 			console.log(data);
			// result = data;
			// 		});
			result = ["21", "123", "125", "3342"];
			response(result);
		}
	});
});
