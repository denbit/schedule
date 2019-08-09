{% extends "index.volt" %}

{% block head %}
    {{ super() }}
        <div class="col">
            <h2>Page Control System</h2>
        </div>
    {% if router.getActionName()!=='index' %}
            <div class="navbar navbar-light bg-light">{{ link_to(["for": "action-auth",'controller': router.getControllerName(),'action':''],'До списку сторінок','class':'nav-item nav-link') }}</div>

    {% endif %}

{% endblock %}
{% block content %}
<body>
<div class="container">

{{ content() }}


<div class="row"></div>


    {% endblock %}
    {% block footer %}
</div>
<footer class="mt-4"> <h6 class="text-center">Managing system v1.0</h6></footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{% endblock %}