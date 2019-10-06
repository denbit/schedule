{% extends 'layouts/translation.volt' %}

{% block content %}
<style>
    th{
        padding: .65rem .5rem!important;
    }

</style>
    {{ super() }}
    <table class="table middle_row" >

        <thead class="thead-dark">
        <tr>
        <tr> <td>
                {{ form(url(["for": "action-auth",'controller':'translation','action':'index']),'id':'limit_form')}}
                {{ numeric_field('limit_input','value':limit ? limit : 25) }} {{ submit_button('Show') }}
                {{ end_form() }} </td></tr>
            <th  scope="col"> Key </th>
            <th  scope="col">Ukrainian</th>
            <th  scope="col">English</th>
            <th  scope="col">Russian</th>
            <th  scope="col">Actions</th>
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
                       {{ link_to(['for':'action-edit',"id": key, 'controller':router.getControllerName()] ,'Edit', 'class':"btn btn-outline-primary") }}
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            {% endfor %}
        {% endif %}
        </tbody>
    </table>
{% endblock %}
{% block footer %}
{{ super() }}
    <script>
        $('#limit_form').submit(function(e){
            e.preventDefault();
            $(this).prop('action',$(this).prop('action').concat('/',$('#limit_input').val()));
            $(this).unbind('submit');
            $(this).submit();

        });
    </script>
{% endblock %}
