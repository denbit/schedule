{% extends 'layouts/route.volt' %}
  {% block head_script %}
  <script>
   var suggestPath ='{{ url.get(['for':'action-auth','controller':router.getControllerName(),'action':'suggest']) }}';
   </script>
  {% endblock %}
 {% block subhead %} Редагувати/Створити маршрут {% endblock %}
{% block content %}
	<div class="row">
	<div class="col-md-8 card">
		<div class="card-body">
			{% set id='' %}
			{% if dispatcher.getParam('id') is not empty %}
				{% set id=dispatcher.getParam('id') %}
			{% endif %}
			{{ form(url.get(['for':'action-save','controller':router.getControllerName(),'id':id]), 'method': 'post','class':'route-form') }}
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

							<label class="btn btn-secondary {% if element.getValue() %}active{% endif %}">
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
					{% set i=0 %}
					{% for element in form %}
						{% if element.getUserOption('transit')=='true' %}
							{% if  (i % 4) == 0 %}
							<tr class="data">
							{% endif %}
							<td>{{ element }}</td>
							{%  set i += +1 %}
							{% if  (i % 4) == 0 %}
							</tr>
							{% endif %}
						{% endif %}
					{% endfor %}
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
		{% block footer %}
		{{ super() }}
		<script>
		let indexPath ='{{ url.get(['for':'action-auth','controller':router.getControllerName(),'action']) }}';
		$('.route-form').submit(function(e) {
		  e.preventDefault();
		  var formData = new FormData($("form").get(0));
		  for(key of formData.keys()){
		      let name=`input[name='${key}']`;
		      let dataValue= $(name).data('value');
		      if (dataValue){
		          formData.set(key,dataValue);
		      }
		  }
		  $('input, select, button').prop('disabled',true);
			let xhr = new XMLHttpRequest();
			xhr.open('POST',$("form").prop('action'));
			xhr.send(formData);
			/*location.href=indexPath;*/
		});
			</script>
{% endblock %}