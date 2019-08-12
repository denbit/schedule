{{ form(url.get(['for':'action-edit-process-location','category':params.category,'id':params.id]),'method':'put') }}

	{% for key,el in fields %}
		<label>{{ key }} :</label>
		{{ text_field('name': key,'id':key,'value':el) }}
	{% endfor %}
	{{ submit_button() }}
{{ endform() }}