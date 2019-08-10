{{ form(url.get(['for':'action-save-location','category':params.category,'parent_category':params.parent_category,'parent_id':params.parent_id])) }}
	{% for el in fields %}<label>{{ el }} :</label>
		{{ text_field(el) }}
	{% endfor %}
	{{ submit_button() }}
{{ endform() }}