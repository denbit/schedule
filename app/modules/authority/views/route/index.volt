{% extends 'layouts/route.volt' %}
{% block content %}
    {{ super() }}
<div class="clearfix m-2"> {{ link_to((url.get(['for':'action-auth','controller':router.getControllerName(),'action':'form'])~"?edit=1"), 'Стоврити новий рейс/маршрут','edit', 'class':'btn btn-primary') }}  </div>
{% if routes is not empty %}
    <table class="table">
        <tr><th>URL</th><th>Назва маршруту</th><th>Початкова станція</th><th>Кінцева станція</th><th>Проміжні станції</th></tr>
{% for route in routes  %}
    <tr>
        <td>{{ link_to(['for':'action-edit','controller':router.getControllerName(),'id':route['url']],route['url']) }}</td>
        <td>{{ route['name'] }}</td>
        <td>{{ route['start'] }}</td>
        <td>{{ route['end'] }}</td>
        <td>{{ route['transit_stations'] }}</td>
    </tr>
{% endfor %}
    </table>
    {% else %}
    <h2> Ще не існує маршрутів</h2>
{% endif %}
{% endblock %}