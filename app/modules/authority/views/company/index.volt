{% extends 'layouts/company.volt' %}
 {% block subhead %} Огляд первізників{% endblock %}
{% block content %}

    {{ super() }}
    {% for company in companies %}
        {{ dump(company) }}
    {% endfor %}

{% endblock %}
