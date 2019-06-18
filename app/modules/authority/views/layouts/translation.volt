{% extends "index.volt" %}
 {% block title %}{%  set title ='Over all status' %}   {% endblock %}
{% block head %}

 <div class="col" align="left">
  <h1>Translations</h1>
     {{ link_to(['for': 'action-save', 'id': '123', 'controller': 'carrots'], 'Show','class':'edit-btn') }}
     {{ link_to(["for": "action-auth",'controller':'translation','action':''], 'List all transations','class':'menu-link') }}
 </div>

{% endblock %}

{% block content %}
    {{ super() }}
{% endblock %}



