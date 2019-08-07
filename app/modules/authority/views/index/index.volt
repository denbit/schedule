{% extends 'layouts/index.volt' %}
 {% block subhead %} Огляд системи{% endblock %}
{% block content %}

    {{ super() }}
	<div class="card">
		<div class="card-title"> System statistics</div>
		<div class="card-body">
			{% for index,item in statistics %}
			<p><b>{{ index|upper }}: </b> {{ item }}</p>
			{% endfor %}
		</div>
	</div>


    <script>
		$(document).ready(function() {
			$('#example23').dataTable( {
				bProcessing: true,
				"order": [[ 3, "desc" ]],
				sAjaxSource:"/volt/sucursales/get/"
			} );
		} );
    </script>
{% endblock %}
