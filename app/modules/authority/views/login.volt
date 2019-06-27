{% extends "index.volt" %}
{% block content %}
	<div class="card w-50 p-3" style="margin: auto;">
		<style>
			.control-label{width: 100px;}
		</style>
{{ form(router.getRewriteUri(), 'method': 'post') }}
{% for element in form %}
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
{% endblock %}