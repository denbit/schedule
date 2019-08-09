<li data-id=$key>
	<button class="btn btn-link collapsed" data-toggle="collapse" href="#{{ item['name'] }}_collapse" role="button" aria-expanded="false" aria-controls="collapse">
		{{ item['name'] }}
	</button>
	<ul class="collapse" id="{{ item['name'] }}_collapse">