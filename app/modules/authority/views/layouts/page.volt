{% extends "index.volt" %}

{% block head %}
    <div class="row">
        <div class="col-12"><h2 class="text-center">Page Control System</h2></div>
    </div>
{% endblock %}
{% block content %}
<body>
<div class="container">
<div class="navbar-brand"><img src="https://placeimg.com/640/80/any/grayscale"></div>



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