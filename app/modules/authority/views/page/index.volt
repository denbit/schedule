{% extends 'layouts/page.volt' %}
{% block content %}
    {{ super() }}
<div class="clearfix m-2  text-right ">
    {{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':'form'],'Створити нову сторінку',['class':'btn btn-info float-right']) }}
</div>
<table class="table">
    {% if pages is not empty %}
   <tr><th>URL</th><th>Module Name</th><th>Мови</th></tr>
        {% for page in pages  %}
    <tr>
        <td>{{ page['url'] }}</td>
        <td>{{ page['module_name'] }}</td>
        <td>
            {% for name, value in page['available_langs'] %}
                <a href="{{ url.get(['for':'action-auth','controller': router.getControllerName(),'action':'form']) }}/{{ page['module_name'] }}?lang={{ name }}&edit=1">{{ value }}</a>
            {% endfor %}
        </td>
    </tr>
        {% endfor %}
   {% else %}
     <tr>
         <td> {{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':'form'],'Створити нову сторінку',['class':'btn btn-primary']) }}</td>
     </tr>
   {% endif %}
    </table>

{% endblock %}