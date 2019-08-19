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
    {% if element.getName()=='id' %}
        {{ element }}
        {% continue %}
    {% endif %}
    <div class="control-group">
        {{ element.label(["class": "control-label"]) }}
        {% if element.getName()=='user_id' %}
            <div class="controls input-group">
                {{ element.render(['readonly':true]) }}
                <div class="input-group-append">
                    <input type="button" class="input-group-text btn btn-secondary btn-sm" id="add-user" data-toggle="modal" data-target="#users_list" value="Обрати">
                    <input type="reset" class=" btn btn-danger btn-sm" id="remove-user" value="Видалити">
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="users_list_title">Користувачі</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <ul id="user_selector"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Зачинити</button>
                </div>
            </div>
        </div>
    </div>
    <script>
 const users=fetch('{{ url(['for':'action-auth','controller':'users','action':'list']) }}')
         .then(response=>{
             return  response.json();
         });
        const user_id = $('#user_id');
        $('#add-user').click(function () {
            function addUser(e){
                user_id.val($(this).data('id'));
                $('#users_list').modal('hide');
            }
            users.then((resp)=>{
                var list=[];
                for (user of resp){
                    const userElement=document.createElement('li');
                    userElement.setAttribute('data-id',user.id);
                    userElement.style.listStyle='none';
                    userElement.innerHTML=`<b>${user.login}</b>(${user.name})`;
                    userElement.addEventListener('click',addUser);
                    list.push(userElement);
                }
                $('#user_selector').empty();
                $('#user_selector').append(list);
            })
        });
        $('#remove-user').click(function (e) {
            e.preventDefault();
            user_id.val('');
        });
    </script>
{% endblock %}