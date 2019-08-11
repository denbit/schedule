{% extends 'layouts/company.volt' %}
{% block subhead %} {{ super() }}
    <div class="col" align="left">
    <h5>
		{% if router.getActionName()=='edit' %}
            Редагувати
		{% else %}
            Створити
		{% endif %}
        профіль компанії
    </h5>
    </div>{% endblock %}
{% block content %}
<div class="row">
    <div class="col-md-6 card">
        <div class="card-body">
			{% set id='' %}
			{% if dispatcher.getParam('id') is not empty %}
				{% set id=dispatcher.getParam('id') %}
			{% endif %}
			{{ form(url.get(['for':'action-save','controller':router.getControllerName(),'id':id]), 'method': 'post','class':'company-form') }}

{% for element in form %}

    <div class="control-group">
        {{ element.label(["class": "control-label"]) }}
        <div class="controls">
            {{ element }}
        </div>
    </div>

{% endfor %}
            <div class="clearfix my-2">
{{ submit_button('Save','class': 'btn btn-outline-primary float-left') }}
            </div>
{{ end_form() }}
        </div>
    </div>
</div>
{% endblock %}
{% block footer %}
{{ super() }}
    <script>

    </script>
{% endblock %}