{% block content %}
    <div class="row pers ">
    <div class="screener row screener-gray w-75">
        <div class="col ml-3">
            <div class="row justify-content-end">
                <div class="col-3  my-2 text-right ">
                    <button class="btn btn-outline-light" id="screener">Show personal content</button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-5 card py-3">
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
        <div class="clearfix float-right"> {{ submit_button("Save","class":"submit") }}</div>
        {{ end_form() }}
    </div>

</div>
{% endblock %}

