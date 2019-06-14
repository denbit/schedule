<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    {% block title %}{%  set title ='Main' %}   {% endblock %}
    <title>Site Managing system  -  {{ title |default("Main")}}
         </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/shared/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ url('/css/common.css') }}"/>
</head>
<body>

<div class="container-flex text-white bg-dark">
    <div class="row">
        <div class="col">
            <img src="/images/authority/top.svg">
        </div>
    </div>

</div>
<div class="container-flex">
    <div class="authority-menu navbar-dark">
        <h5 class="p-2 tittle">
            <span class="navbar-toggler-icon auth-title"></span>
            Menu
        </h5>
        <ul>
            <li>translations</li>
            <li><a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button"
                   aria-expanded="false" aria-controls="collapseExample">
                    pages
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        -smth<br>
                        -smsh
                    </div>

            </li>
            <li> blog
            </li>
            <li>companies list</li>
        </ul>
    </div>
</div>{% block content %}{% endblock %}{% block content2 %}{% endblock %}

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>