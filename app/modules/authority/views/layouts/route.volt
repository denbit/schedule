{% extends "index.volt" %}
 {% block title %}{%  set title ='Routes' %}   {% endblock %}
        {% block head %}
<div class="col" align="left">
    <h1>Маршрути</h1>
</div>

            {% if router.getActionName()!=='index' %}
                <div class="navbar navbar-light bg-light"> {{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':''],'До списку маршрутів','class':'nav-item nav-link') }}</div>
            {% endif %}

        {% endblock %}


{% block content %}

{% endblock %}



