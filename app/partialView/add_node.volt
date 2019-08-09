{{ form() }}
	{% for el in fields %}<label>{{ el }} :</label>
		{{ text_field(el) }}
	{% endfor %}
	{{ submit_button() }}
{{ endform() }}