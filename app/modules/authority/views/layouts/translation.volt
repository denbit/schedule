{% extends "index.volt" %}
 {% block title %}{%  set title ='Over all status' %}   {% endblock %}
{% block content2 %}{{ string }}
{% endblock %}

{% block content %}
<table>
 <thead>
 <tr>
  <th> Key </th><th>Ukrainian</th><th>English</th><th>Russian</th><th>Actions</th>
 </tr>
 {% for key,translation in  translations %}
  <tr id="{{ key }}">
   <td> {{ key}}</td>
   <td data-id="{{ translation.uk.id }}">{{ translation.uk.value }}</td>
   <td data-id="{{ translation.en.id }}">{{ translation.en.value }}</td>
   <td data-id="{{ translation.ru.id }}">{{ translation.ru.value }}</td>
  </tr>
 {% endfor %}
 </thead>
</table>
{% endblock %}



