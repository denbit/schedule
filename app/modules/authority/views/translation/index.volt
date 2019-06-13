{% extends 'layouts/translation.volt' %}

{% block content %}

    {{ super() }}

    <div align="center">
        <h1>Translations</h1>
        {{ link_to('authority/translations/view', 'List all transations','class':'menu-link') }}
    </div>
    <table>
        <thead>
        <tr>
            <th> Key </th><th>Ukrainian</th><th>English</th><th>Russian</th><th>Actions</th>
        </tr>
        {% if translations %}
            {% for key,translation in  translations %}
                <tr id="{{ key }}">
                    <td> {{ key}}</td>
                    {% if translation.uk is not empty  %}
                        <td data-id="{{ translation.uk.id }}">{{ translation.uk.value }}</td>
                    {% endif %}
                    {% if translation.en is not empty  %}
                        <td data-id="{{ translation.en.id }}">{{ translation.en.value }}</td>
                    {% endif %}
                    {% if translation.ru is not  empty  %}
                        <td data-id="{{ translation.ru.id }}">{{ translation.ru.value }}</td>
                    {% endif %}

                </tr>
            {% endfor %}
        {% endif %}
        </thead>
    </table>
{% endblock %}
