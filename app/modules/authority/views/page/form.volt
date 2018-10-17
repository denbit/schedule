{{ form('authority/page/create', 'method': 'post') }}
{% for element in form %}
    <div class="control-group">
        {{ element.label(["class": "control-label"]) }}
        <div class="controls">
            {{ element }}
        </div>
    </div>
{% endfor %}
{{ submit_button('Send') }}
{{ end_form() }}