{% extends 'layouts/route.volt' %}
{% block content %}
	<div class="row">
		<div class="navbar navbar-light bg-light"> {{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':''],'Go to the List of Routes','class':'nav-item nav-link') }}</div>
	</div>
	<div class="row">
	<div class="col-md-6 card">
		<div class="card-body">
			{% set id='new' %}
			{% if form.id is not empty %}
				{% set id=form.id %}
			{% endif %}
			{{ form(url.get(['for':'action-save','controller':router.getControllerName(),'id':id]), 'method': 'post') }}
			<h3 class="card-title">Routes Editing </h3>

			{% for element in form %}
				{% if element.getUserOption('common')=='true' %}
					<div class="control-group">
						{{ element.label(["class": "control-label"]) }}
						<div class="controls">
							{{ element }}
						</div>
					</div>
				{% endif %}
			{% endfor %}
			<div class="control-group form-group">
				<label class="control-label"> Регулярність </label>
				<div class="btn-group btn-group-sm btn-group-toggle d-block" data-toggle="buttons">
					{% for element in form %}
						{% if element.getUserOption('regularity')=='true' %}

							<label class="btn btn-secondary active">
								{{ element }} {{ element.getLabel() }}
							</label>

						{% endif %}
					{% endfor %}
				</div>
			</div>
			<fieldset class="form-group p-2" style="border: #484e53a8 2px solid;

border-radius: 5px;">
					<legend class="scheduler-border">Маршрут</legend>
				<table>
					<tr><td>Станція відправленя</td><td>Час відправлення </td><td>Станція прибуття</td><td> Час Прибуття</td></tr>
					<tr class="data"><td><input type="text"></td><td><input type="time"></td><td><input type="text"></td><td><input type="time"></td></tr>
					<tr class="blank d-none"><td><input type="text"></td><td><input type="time"></td><td><input type="text"></td><td><input type="time"></td></tr>
				</table>
				<div class="text-center m-2">  {{ tag_html("button", ["type":"button","class": "btn btn-primary"]) }}
					Додати <i class='glyphicon glyphicon-pencil'></i>
					{{ tag_html_close("button") }}</div>
			</fieldset>


			<div class="clearfix my-2">
				{{ submit_button('Save','class': 'btn btn-outline-primary float-left') }}
			</div>
			{{ end_form() }}

		</div>
	</div>
{% endblock %}