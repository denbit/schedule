{% extends 'layouts/translation.volt' %}
{% block subhead %}
    <div class="col" align="left">
        <h5>S переклад</h5>
    </div>
{% endblock %}
{% block content %}
<style>
    th{
        padding: .65rem .5rem!important;
    }

</style>
    {{ super() }}
    {{ form(url(["for": "action-auth",'controller':'translation','action':'search']),'method':'GET') }}
    <table class="table middle_row">
        <tr><th colspan="2">S</th></tr>
        <tr>
            <td>
                <label for="search">Key:
                {{text_field('key','value':request.getQuery('key'),'class':"form-control")}}</label>
            </td>
            <td>
                <label for="sort">Sort:</label>
                {{select_static('sort',[
                    'key_desc':'Key desc',
                    'key_asc':'Key asc',
                    'languages':'By Languages'
                ],'class':"custom-select")}}
            </td>
        </tr>

        <tr><td class="text-right" colspan="2">{{submit_button('Find','class':"btn btn-success btn-sm px-3 mr-2")}}</tr>
    </table>
    {{ end_form() }}
    <table class="table middle_row" >
        <thead class="thead-dark">
        <tr>
            <th  scope="col"> Key </th>
            <th  scope="col">Ukrainian</th>
            <th  scope="col">English</th>
            <th  scope="col">Russian</th>
            <th  scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        {% if translations is not empty %}
            {% for key,translation in  translations %}
                <tr id="{{ key }}">
                    <td><input type="checkbox" data-key="{{ key}}">  <i>{{ key}}</i></td>
                    {% if translation.uk is not empty  %}
                        <td data-id="{{ translation.uk.id }}">{{  crop(translation.uk.value) }}</td>
                    {% else %}
                        <td ></td>
                    {% endif %}
                    {% if translation.en is not empty  %}
                        <td data-id="{{ translation.en.id }}">{{  crop(translation.en.value) }}</td>
                        {% else %}
                            <td ></td>
                    {% endif %}
                    {% if translation.ru is not  empty  %}
                        <td data-id="{{ translation.ru.id }}">{{  crop(translation.ru.value) }}</td>
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
