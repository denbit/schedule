{%- macro crop(value)  %}
    {%- if value|length>10 %}
        {{ substr(value,0,10)~"..." }}
    {%- else %}
        {{ value }}
    {%- endif  %}
{%- endmacro  %}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    {% block title %}{% endblock %}
    <title>Site Managing system - {{ title | default("Main") }}
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/shared/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ url('/css/common.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/authority.css') }}"/>
    {{ partial('../../shared_views/css_libs') }}
    {% if debugbarHEAD is not empty %}
        {{  debugbarHEAD }}
    {% endif %}
    {% block head_script %}{% endblock %}
</head>
<body>

<div class="container-fluid text-white bg-dark">
    <div class="row">
        <div class="col">
            {{ link_to(['for':'main-authority'], image('/images/authority/top.svg',"alt":'Szlach managing system')) }}
        </div>
        <div class="col">
            <div class="row">{% block head %}{% endblock %} </div>
            <div class="row"> {% block subhead %}{% endblock %}</div>
        </div>
		{% if router.getActionName()!=='index' %}
            <div class="navbar navbar-light bg-light">{{ link_to(["for": "action-auth",'controller': router.getControllerName(),'action':''],'На головну розділу','class':'nav-item nav-link') }}</div>

		{% endif %}

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
                    {{ link_to(["for": "action-auth",'controller':'translation','action':''], '<i class="fa fa-bars"></i>','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="translations_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li> {{ link_to(["for": "action-auth",'controller':'translation','action':''], 'Видалити масово','class':'btn-link') }}</li>
                            <li> {{ link_to(["for": "action-auth",'controller':'translation','action':'search'], 'Знайти строку','class':'btn-link') }}</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a class="btn btn-link collapsed" data-toggle="collapse" href="#pages_collapse" role="button"
                   aria-expanded="false"
                   aria-controls="collapse"> Сторінки </a>
                {% if router.getControllerName()!='page' %}
                    {{ link_to(["for": "action-auth",'controller':'page','action':''], '<i class="fa fa-bars"></i>','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="pages_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>{{ link_to(["for": "action-auth",'controller':'page','action':'form'], 'Створити нову','class':'btn-link') }}</li>
                            <li>{{ link_to(["for": "action-auth",'controller':'page','action':'form'], 'Всі сторінки','class':'btn-link') }}</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a class="btn btn-link collapsed" data-toggle="collapse" href="#route_collapse" role="button"
                   aria-expanded="false"
                   aria-controls="collapse"> Маршрути </a>
                {% if router.getControllerName()!='route' %}
                    {{ link_to(["for": "action-auth",'controller':'route','action':''], '<i class="fa fa-bars"></i>','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="route_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>{{ link_to(["for": "action-auth",'controller':'route','action':'form'], 'Створити','class':'btn-link') }}</li>
                            <li>{{ link_to(["for": "action-auth",'controller':'route','action':'search'], 'Пошук','class':'btn-link') }}</li>
                            <li>{{ link_to(["for": "action-auth",'controller':'route','action':''], 'Видалити масово','class':'btn-link') }}</li>
                            <li>{{ link_to(["for": "action-auth",'controller':'route','action':''], 'Опублікувати','class':'btn-link') }}</li>

                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link collapsed" data-toggle="collapse" href="#location_collapse" role="button"
                   aria-expanded="false"
                   aria-controls="collapse">Розташування</a>
                {% if router.getControllerName()!='location' %}
                    {{ link_to(["for": "action-auth",'controller':'location','action':''], '<i class="fa fa-bars"></i>','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="location_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>Нове розташування</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link collapsed" data-toggle="collapse" href="#companies_list_collapse" role="button"
                   aria-expanded="false" aria-controls="collapse">Компанії-перевізники </a>
                {% if router.getControllerName()!='company' %}
                    {{ link_to(["for": "action-auth",'controller':'company','action':''], '<i class="fa fa-bars"></i>','class':'btn-link') }}
                {% endif %}
                <div class="collapse" id="companies_list_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>smth</li>
                            <li>smth</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="btn btn-link collapsed" data-toggle="collapse" href="#users_list_collapse" role="button"
                   aria-expanded="false" aria-controls="collapse">Користувачі </a>
				{% if router.getControllerName()!='users' %}
					{{ link_to(["for": "action-auth",'controller':'users','action':''], '<i class="fa fa-bars"></i>','class':'btn-link') }}
				{% endif %}
                <div class="collapse" id="users_list_collapse">
                    <div class="card card-body local_padding">
                        <ul class="ul_all_collapse">
                            <li>{{ link_to(["for": "action-auth",'controller':'users','action':'form'], 'Створити','class':'btn-link') }}</li>
                            <li>{{ link_to(["for": "action-auth",'controller':'users','action':'form'], 'Пошук','class':'btn-link') }}</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li> {% set link="#" %}
               	{% if router.getControllerName()!='widget' %}
                    {% set link=["for": "action-auth",'controller':'widgets','action':'list'] %}
                {% endif %}
                {{ link_to(link, 'Front page widgets','class':'btn btn-link') }}
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

{% if  flashSession.has('success') or flashSession.has('error') or flashSession.has('warning')  %}
    <div class="modal fade" tabindex="-1" role="dialog" id="system_info" aria-labelledby="systemMessage" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="systemMessage">Повідомлення системи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {{ flashSession.output() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default modal-footer-close btn-sm" data-dismiss="modal">Зачинити</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        setTimeout(()=>$('#system_info').modal({show: true}),2000);
    </script>
{% endif %}
{% if debugbar is not empty %}
    {{  debugbar }}
{% endif %}
</body>

</html>