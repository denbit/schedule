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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  >
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
        {% if session.has('auth_file') %}
    <div class="authority-menu navbar-dark  col-3 pr-0">
        <h5 class="p-2 title">
            <span class="navbar-toggler-icon auth-title"></span>
            Menu
        </h5>
        <ul class="ul_all_collapse_padding">
            <li>
                <a class=" btn btn-link collapsed" data-toggle="collapse" href="#translations_collapse" role="button"
                   aria-expanded="false" aria-controls="collapse">Переклади</a>
                {% if router.getControllerName()!='translation' %}
                    {{ link_to(["for": "action-auth",'controller':'translation','action':''], 'List ','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="translations_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a class="btn btn-link collapsed" data-toggle="collapse" href="#pages_collapse" role="button"
                   aria-expanded="false"
                   aria-controls="collapse"> Сторінки </a>
                {% if router.getControllerName()!='page' %}
                    {{ link_to(["for": "action-auth",'controller':'page','action':''], 'List','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="pages_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a class="btn btn-link collapsed" data-toggle="collapse" href="#route_collapse" role="button"
                   aria-expanded="false"
                   aria-controls="collapse"> Маршути </a>
                {% if router.getControllerName()!='route' %}
                    {{ link_to(["for": "action-auth",'controller':'route','action':''], 'List','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="route_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>Створити</li>
                            <li>Видалити масово</li>
                            <li>Опублікувати</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link collapsed" data-toggle="collapse" href="#blog_collapse" role="button"
                   aria-expanded="false"
                   aria-controls="collapse">blog</a>
                <div class="collapse" id="blog_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link collapsed" data-toggle="collapse" href="#companies_list_collapse" role="button"
                   aria-expanded="false" aria-controls="collapse">companies list</a>
                <div class="collapse" id="companies_list_collapse">
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
        {% endif %}
    <div class="col pl-0">
    {% block content %}{% endblock %}
    </div>
    </div>
</div>
{{ partial('../../shared_views/js_libs') }}
{% block footer %}
    <script src="/js/common.main.js" async></script>
{% endblock %}
</body>

</html>