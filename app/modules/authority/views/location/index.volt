{% extends 'layouts/location.volt' %}
{% block subhead %}
	Огляд локацій
{% endblock %}
{% block content %}
	{{ super() }}
	<div class="clearfix m-2  text-right ">
		{{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':'form'],'Створити нову локацію',['class':'btn btn-info float-right']) }}
	</div>
	<div class="row">
		<div class="col">
			<ul>
				{% for item,index in overview.list %}
					<li><b>{{ item }}</b> - {{ index }}</li>
				{% endfor %}
			</ul>

		</div>
	</div>
	<div class="row">
		<div class="col">{{ dump(overview.per_state) }}</div>
	</div>

{% endblock %}