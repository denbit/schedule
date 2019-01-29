
 {% block content %}

     <div class="row">
         <div class="col-2 offset-1">
             <ul class="carrier-menu">
                 {{ partial('layouts/menu') }}
         </div>
         <div class="col-8">  {{ content() }}</div>
     </div>
     <div class="row">
         <div class="col-md-offset-0"> {{ var_dump }}</div>
     </div>



 {% endblock %}


