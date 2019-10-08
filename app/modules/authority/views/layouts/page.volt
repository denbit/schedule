{% extends "index.volt" %}

{% block head %}
    {{ super() }}
        <div class="col">
            <h2>Система контролю сторінок</h2>
        </div>
{% endblock %}
{% block content %}
<body>
<div class="container">

{{ content() }}


<div class="row"></div>


    {% endblock %}
    {% block footer %}
</div>
<footer class="mt-4">{{ super() }}
    <h6 class="text-center">Система контролю сторінок v1.1</h6></footer>

{% endblock %}