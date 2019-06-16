<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    {% block title %}{% set title ='Main' %}   {% endblock %}
    <title>Site Managing system - {{ title |default("Main") }}
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/shared/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ url('/css/common.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/authority.css') }}"/>
</head>
<body>

<div class="container-fluid text-white bg-dark">
    <div class="row">
        <div class="col">
            <img src="/images/authority/top.svg">
        </div>
        {% block head %}{% endblock %}
    </div>

</div>
<div class="container-fluid">
    <div class="row">
    <div class="authority-menu navbar-dark  col-3 pr-0">
        <h5 class="p-2 title">
            <span class="navbar-toggler-icon auth-title"></span>
            Menu
        </h5>
        <ul class="ul_all_collapse">
            <li>
                <a class="btn btn-link" data-toggle="collapse" href="#translations_collapse" role="button"
                   aria-expanded="true" aria-controls="collapse">translations</a>
                <div class="collapse" id="translations_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a class="btn btn-link" data-toggle="collapse" href="#pages_collapse" role="button" aria-expanded="true"
                   aria-controls="collapse"> pages </a>
                <div class="collapse show" id="pages_collapse">
                    <div class="card card-body bg-light local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link" data-toggle="collapse" href="#blog_collapse" role="button" aria-expanded="true"
                   aria-controls="collapse">blog</a>
                <div class="collapse show" id="blog_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link" data-toggle="collapse" href="#companies_list_collapse" role="button"
                   aria-expanded="true" aria-controls="collapse">companies list</a>
                <div class="collapse show" id="companies_list_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="col pl-0">
    {% block content %}{% endblock %}
    </div>
    </div>
</div>

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