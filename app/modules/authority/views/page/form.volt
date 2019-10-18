{% extends 'layouts/page.volt' %}
{% block subhead %}
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
    {{ super() }}
    <h3 class="card-title">Редагування сторінки {% if alias is not empty %}{{ alias }} {% endif %}</h3>
{% endblock %}
{% block content %}
     {% set jsInclude='' %}
<div class="row">
    <div class="col-md-9 card">
        <div class="card-body">
            {% if alias is empty %}{{ link_to(['for':'action-edit-all','controller':router.getControllerName(),'action':'clone','params':form.get('id').getValue() ],'Клонувати') }}{% endif %}
{{ form(url.get(['for':'action-auth','controller': router.getControllerName(),'action':'create']), 'method': 'post') }}


{% for element in form %}
    <div class="control-group form-group">
       {% if element.getUserOption('no_style') %}
            {{ element }}
       {% else %}
            <div class="control-group">
                {{ element.label(["class": "control-label"]) }}
                <div class="controls {{ element.getName() }}">
                 {% if element.getUserOption('jsInclude')is not empty %}
                     {% set jsInclude=jsInclude~element.getUserOption('jsInclude') %}
                 {% endif %}
                 {{ element }}
                </div>
            </div>
       {% endif %}
    </div>
{% endfor %}

            <div id="toolbar"></div>
            <div class="clearfix my-2">
{{ submit_button('Save','class': 'btn btn-outline-primary float-left') }}
            </div>
{{ end_form() }}
        </div>
    </div>
</div>
{% endblock %}
{% block footer %}
{{ super() }}

    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var page_types = {{ page_types }};
        var options = { theme: 'snow' };
        var fields = [];
        {% if jsInclude is not empty %}
         {{ jsInclude }}
        {% endif %}


        $(document).ready(function () {
			fields.forEach(function (value) {
				var source = '.controls.'+value+' input#'+value;
				window[value].root.innerHTML=$(source).val();
			});
            if ($('select#page_type').val()==page_types.dynamic){
                $('[id^="content_"]').prop('disabled',true);
                if(window.content_content !=undefined){
                    content_content.disable();
                }
            }
            $('select#page_type').change(function () {
            if ($(this).val()==page_types.dynamic){
                $('[id^="content_"]').prop('disabled',true);
                if(window.content_content !=undefined){
                    content_content.disable();
                }
            }else  {
                $('[id^="content_"]').prop('disabled',false);
                if(window.content_content !=undefined){
                    content_content.enable();
                }
            }
        });

            $('form').submit(function (e) {
                $("#language").prop('disabled',false);
              e.preventDefault();
              fields.forEach(function (value) {
                  var target = '.controls.'+value+' input#'+value;
                  $(target).val(window[value].root.innerHTML);
              });
              $(this).unbind('submit').submit();


            });
        });
    </script>
{% endblock %}