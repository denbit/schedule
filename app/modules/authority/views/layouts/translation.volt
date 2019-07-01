{% extends "index.volt" %}
 {% block title %}{%  set title ='Over all status' %}   {% endblock %}
{% block head %}

 <div class="col" align="left">
  <h1>Translations</h1>
     {% if router.getActionName()!=='index' %}
     {{ link_to(["for": "action-auth",'controller': router.getControllerName(),'action':''], 'Back to transations','class':'menu-link') }}
     {% endif %}
 </div>

{% endblock %}

{% block content %}
    {{ super() }}
{% endblock %}



