{% extends  'layouts/translation.volt' %}
{% block subhead %}
    <div class="col" align="left">
        <h5>Редагувати переклад</h5>
    </div>
    {% endblock %}
{% block content %}
<div class="card">
    <div class="card-body">
        <h3 class="card-title"> Переклад для ключа <code>{{ pair['key'] }} </code> </h3>
        <div class="card-text form-group">
            <form  class="form" method="post" action="{{ url.get(['for':'action-save',"id": pair['key'], 'controller':router.getControllerName()]) }}" >
            {% for key in  langs  %}
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text" id="small">{{ key }}</span>
                </div>
                {% if pair['content'][key] is not empty %}
                    <input type="text" class="form-control" data-lang="{{ key }}" required name="k_{{ pair['content'][key]['id'] }}" value="{{ pair['content'][key]['description'] }}" aria-describedby="small" >
                {% else %}
                    <input type="text" class="form-control" data-lang="{{ key }}" required name="k_{{ key }}" placeholder="{{ key }} translation" aria-describedby="small" >
                {% endif %}
            </div>
            {% endfor %}
                <button type="submit" class="btn float-right btn-primary mb-2">Confirm changes</button>
            </form>

        </div>

    </div>
</div>

{% endblock%}