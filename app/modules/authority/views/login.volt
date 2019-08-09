{% extends "index.volt" %}
{% block content %}
	<div class="card w-50" style="margin: auto;">
	<div class="card-header">
		<h5 class="card-title">Вхід в панель керування Системою Шлях</h5>
	</div>

		<style>
			.control-label{width: 100px;}
		</style>
		<div class="card-body">
{{ form(router.getRewriteUri(), 'method': 'post') }}
{% for element in loginform %}
	<div class="input-group  form-group">
	<div class="input-group-prepend">
		{{ element.label(["class": "control-label input-group-text"]) }}
	</div>
		<div class="controls">
			{{ element }}
		</div>
	</div>

{% endfor %}
	{{ submit_button('Login') }}
		</div>
	</div>
{% endblock %}