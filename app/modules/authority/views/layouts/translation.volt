{% extends "index.volt" %}
 {% block title %}{%  set title ='Over all status' %}   {% endblock %}
{% block head %}

 <div class="col" align="left">
  <h1>Translations</h1>
     {% if router.getActionName()!=='index' %}
         <div class="navbar navbar-light bg-light"> {{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':''],'До списку перекладів','class':'nav-item nav-link') }}</div>
     {% endif %}
 </div>

{% endblock %}

{% block content %}
    {{ super() }}
{% endblock %}



