{{ form(url.get(['for':'action-save-location','category':request.category,'parent_category':request.parent_category,'parent_id':request.parent_id])) }}
	{% for el in fields %}<label>{{ el }} :</label>
		{{ text_field(el) }}
	{% endfor %}
	{{ submit_button() }}
{{ endform() }}