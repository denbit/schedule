<li data-id={{ key }}  data-category="{{nodeNames[item['category']] }}" data-child="{{nodesChildren[nodeNames[item['category']]] }}">
	<button class="btn btn-link location collapsed" data-toggle="collapse" href="#{{ item['name'] }}_collapse" role="button" aria-expanded="false" aria-controls="collapse">
		{{ item['name'] }}
		<span class="location-menu" data-url="{{ url(['for':'action-edit-location','category':nodeNames[item['category']],'id':key]) }}"><i class="fa fa-cog fa-lg" aria-hidden="true"></i></span>
	</button>
	{% if item['children'] is not empty %}
	<ul class="collapse" id="{{ item['name'] }}_collapse">
	{% endif %}