{% extends "index.volt" %}
 {% block title %}{%  set title ='Over all status' %}   {% endblock %}
{% block content2 %}
    <style>
        td{
            width: 10%;
        }
        hr{
            margin-top:100px;
        }

</style>
    <hr >
    <table id="" class="display" cellspacing="0" width="100%">
 <thead>
 <tr>
  <th>Menu</th>
  <th>Direcci&oacute;n</th>
  <th>Estado</th>
  <th>Modificado</th>
  <th>Modificado por</th>
  <th>Acciones</th>
 </tr>
 </thead>

 <tfoot>
 <tr>
  <th></th>
  <th>Direcci&oacute;n</th>
  <th>Estado</th>
  <th>Modificado</th>
  <th>Modificado por</th>
  <th>Acciones</th>
 </tr>
 </tfoot>
</table>
{% endblock %}

{% block content %}
    {{ super() }}
{% endblock %}



