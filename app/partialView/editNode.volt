<div id="form-wrapper">
{{ form(url.get(['for':'action-edit-process-location','category':params.category,'id':params.id]),'method':'put','id':"edit_form") }}
	{% for key,el in fields %}
		<div>
			<label>{{ key|capitalize|replace('_', ' ') }} :</label>
			{{ text_field('name': key,'id':key,'value':el, 'class':'form-control') }}
		</div>
	{% endfor %}
	{{ submit_button("Зберегти", 'class':'form-control') }}
{{ endform() }}
</div>