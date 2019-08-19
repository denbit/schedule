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
			{{ form(companyForm.getAction(), 'method': 'post','class':'company-form') }}

{% for element in companyForm %}

    <div class="control-group">
        {{ element.label(["class": "control-label"]) }}
        {% if element.getName()=='user' %}
            <div class="controls input-group">
                {{ element.render(['readonly':true]) }}
                <div class="input-group-append">
                    <input type="button" class="input-group-text btn btn-secondary" id="add-user" value="Обрати">
                </div>
            </div>
        {% else %}
        <div class="controls">
            {{ element }}
        </div>
            {% endif %}
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
 const users=fetch('{{ url(['for':'action-auth','controller':'users','action':'list']) }}');
        $('#add-user').click(function () {
            users.then(response=>{
                return  response.json()
            }).then((resp)=>{
                console.log(resp)
            })
        });
    </script>
{% endblock %}