{% extends 'layouts/users.volt' %}
{% block subhead %} {{ super() }}
	<div class="col" align="left">
	<h5>
		{% if router.getActionName()=='edit' %}
			Редагувати
		{% else %}
			Створити
		{% endif %}
		 профіль користувача
	</h5>
	</div>{% endblock %}
{% block content %}
	<div class="row">
		<div class="col-md-6 card">
			<div class="card-body">
				{% set id='' %}
				{% if dispatcher.getParam('id') is not empty %}
					{% set id = dispatcher.getParam('id') %}
				{% endif %}
				{{ form(usersForm.getAction(), 'method': 'post','class':'users-form') }}

				{% for element in usersForm %}
					{% if element.getName()=='id' %}
						{{ element }}
						{% continue %}
					{% endif %}
					<div class="control-group">
						{{ element.label(["class": "control-label"]) }}
						<div class="controls">
							{{ element }}
						</div>
					</div>

				{% endfor %}
				<div class="clearfix my-2">
					{{ submit_button('Зберегти','class': 'btn btn-outline-primary float-left') }}
				</div>
				{{ end_form() }}
			</div>
		</div>
	</div>
{% endblock %}
{% block footer %}
	{{ super() }}
	<script>
	</script>
{% endblock %}