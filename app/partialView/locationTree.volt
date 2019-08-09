<li data-id={{ key }}  data-category="{{nodeNames[item['category']] }}">
	<button class="btn btn-link collapsed" data-toggle="collapse" href="#{{ item['name'] }}_collapse" role="button" aria-expanded="false" aria-controls="collapse">
		{{ item['name'] }}
	</button>
	{% if item['children'] %}
	<ul class="collapse" id="{{ item['name'] }}_collapse">
	{% endif %}