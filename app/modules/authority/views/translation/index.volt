{% extends 'layouts/translation.volt' %}

{% block content %}

    {{ super() }}

    <div align="center">
        <h1>Translations</h1>
        {{ link_to(["for": "action-auth",'controller':'translation','action':''], 'List all transations','class':'menu-link') }}
    </div>
    <table class="mx-5">
        <thead>
        <tr>
            <th> Key </th><th>Ukrainian</th><th>English</th><th>Russian</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        {% if translations %}
            {% for key,translation in  translations %}
                <tr id="{{ key }}">
                    <td><input type="checkbox" data-key="{{ key}}">  <i>{{ key}}</i></td>
                    {% if translation.uk is not empty  %}
                        <td data-id="{{ translation.uk.id }}">{{ translation.uk.value }}</td>
                    {% else %}
                        <td ></td>
                    {% endif %}
                    {% if translation.en is not empty  %}
                        <td data-id="{{ translation.en.id }}">{{ translation.en.value }}</td>
                        {% else %}
                            <td ></td>
                    {% endif %}
                    {% if translation.ru is not  empty  %}
                        <td data-id="{{ translation.ru.id }}">{{ translation.ru.value }}</td>
                    {% else %}
                        <td ></td>
                    {% endif %}
                    <td>
                        <button class="btn btn-dark">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            {% endfor %}
        {% endif %}
        </tbody>
    </table>
{% endblock %}
