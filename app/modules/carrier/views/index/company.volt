{% block content %}<div class="row pers ">
    <div class="screener row screener-gray w-75">
        <div class="col ml-3">
            <div class="row ">
                <div class="col-4 offset-9 my-2 ">
                    <button class="btn btn-outline-light" id="screener">Show company information</button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-5 card py-3">
        {{ form('carrier/index/company/',"class":"person-data",'method': 'post') }}
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