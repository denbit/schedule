{% extends 'layouts/index.volt' %}

{% block content %}

    {{ super() }}

    <div align="right">
        <?php echo $this->tag->linkTo(array("sucursales/new", "Create sucursales")) ?>
    </div>
    <div align="center">
        <h1>Sucursales</h1>
    </div>

    <table id="example23" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Sucursal</th>
            <th>Direcci&oacute;n</th>
            <th>Estado</th>
            <th>Modificado</th>
            <th>Modificado por</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Sucursal</th>
            <th>Direcci&oacute;n</th>
            <th>Estado</th>
            <th>Modificado</th>
            <th>Modificado por</th>
            <th>Acciones</th>
        </tr>
        </tfoot>
    </table>

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
