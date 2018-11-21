<div class="row">
    <div class="col-5">
        {{ form('carrier/index/create',"class":"person-data",'method': 'post') }}
        {% for element in form %}
            {% if element.getUserOption('no_style') %}
                {{ element }}
            {% else %}
                <div class="control-group form-group  row">
                    {{ element.label(["class": "control-label col-form-label col-sm-5 "]) }}
                    <div class="controls col-sm-7 ">
                        {{ element }}
                    </div>
                </div>
            {% endif %}
        {% endfor %}

        {{ end_form() }}
    </div>
    <div> {{ content() }}</div>
</div>