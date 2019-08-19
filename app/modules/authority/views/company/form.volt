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
                    <input type="button" class="input-group-text btn btn-secondary" id="add-user" data-toggle="modal" data-target="#users_list" value="Обрати">
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
    <div class="modal fade" id="users_list" tabindex="-1" role="dialog" aria-labelledby="users_list_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="users_list_title">Користувачі</h4>
                </div>
                <div class="modal-body">
                <ul id="user_selector"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Зачинити</button>
                </div>
            </div>
        </div>
    </div>
    <script>
 const users=fetch('{{ url(['for':'action-auth','controller':'users','action':'list']) }}');
        $('#add-user').click(function () {
            function addUser(e){
                $('#user').val($(this).data('id'));
                $('#users_list').modal('hide');
            }
            users.then(response=>{
                return  response.json();
            }).then((resp)=>{
                var list=[];
                for (user of resp){
                    const userElement=document.createElement('li');
                    userElement.setAttribute('data-id',user.id);
                    userElement.style.listStyle='none';
                    userElement.innerText=`<b>${user.login}</b>(${user.name})`;
                    userElement.addEventListener('click',addUser);
                    list.push(userElement);
                }
                $('#user_selector').append(list);

            })
        });
    </script>
{% endblock %}