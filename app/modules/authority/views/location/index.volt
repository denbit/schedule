{% extends 'layouts/location.volt' %}
{% block subhead %}
	Огляд локацій
{% endblock %}
{% block content %}
	{{ super() }}
	<style>
		.location::after {
			content: " add";
			font-size: 12px;
			color: #888888;
			margin-left: 10px;
			margin-bottom: -14px;
			position: relative;
			bottom: 10px;
		}

		.location::after:hover {
			color: #484e53;
		}
	</style>
	<div class="clearfix m-2  text-right ">
		{{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':'form'],'Створити нову локацію',['class':'btn btn-info float-right']) }}
	</div>
	<div class="row justify-content-start navbar navbar-expand-sm navbar-light"
		 style="background-color: #484e53d4; width: 100%;  margin: auto;">
		<div class="col navbar-collapse">
			<ul class="navbar-nav mr-auto">
				{% for item,index in overview.list %}
					<li class="nav-link"><b>{{ item }}</b> - {{ index }}</li>
				{% endfor %}
			</ul>

		</div>
	</div>
	<div class="row">
		<div class="col">{{ list_tree }}</div>
	</div>

{% endblock %}