{% if pages %}
    <table class="table">
        <tr><th>URL</th><th>Module Name</th><th>Languages</th></tr>
{% for page in pages  %}
    <tr>
        <td>{{ page['url'] }}</td>
        <td>{{ page['module_name'] }}</td>
        <td>
            {% for name, value in page['available_langs'] %}
                <a href="edit/{{ page['module_name'] }}?lang={{ name }}">{{ value }}</a>
            {% endfor %}
        </td>
    </tr>
{% endfor %}
    </table>
{% endif %}