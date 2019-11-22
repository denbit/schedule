<div class="form-wrapper">
{{ form(url.get(['for':'action-save-location','category':params.category,'parent_category':params.parent_category,'parent_id':params.parent_id]),'id':"add_form") }}
	{% for el in fields %}
	<div>
		<label>{{ el|capitalize|replace('_', ' ') }} :</label>
		{{ text_field(el, 'class':'form-control') }}
	</div>
	{% endfor %}
	{{ submit_button("Зберегти", 'class':'form-control') }}
{{ endform() }}
</div>