{% extends 'layouts/page.volt' %}
{% block content %}
    {{ super() }}
<div class="clearfix m-2"> {{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':'form'],'Create new page','class':'btn btn-primary float-right']) }}  </div>
{% if pages %}
    <table class="table">
        <tr><th>URL</th><th>Module Name</th><th>Languages</th></tr>
{% for page in pages  %}
    <tr>
        <td>{{ page['url'] }}</td>
        <td>{{ page['module_name'] }}</td>
        <td>
            {% for name, value in page['available_langs'] %}
                <a href="form/{{ page['module_name'] }}?lang={{ name }}&edit=1">{{ value }}</a>
            {% endfor %}
        </td>
    </tr>
{% endfor %}
    </table>
{% endif %}
{% endblock %}