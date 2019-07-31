{% extends 'layouts/index.volt' %}
 {% block subhead %} Огляд системи{% endblock %}
{% block content %}

    {{ super() }}


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
