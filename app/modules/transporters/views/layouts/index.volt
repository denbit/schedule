
 {% block content %}

     <div class="row">
         <div class="col-2 offset-1">
             <ul class="carrier-menu">
                 <li class="my-2 {% if section =="index" %}active{% endif %}">{{ link_to('carrier/', 'Personal information','class':'menu-link') }} </li>
                 <li class="my-2 {% if section =="company" %}active{% endif %}">{{ link_to('carrier/index/company', 'Company','class':'menu-link') }}</li>
                 <li class="my-2 {% if section =="routes" %}active{% endif %}">{{ link_to('carrier/routes', 'Routes','class':'menu-link') }} </li>
                 <li class="my-2 {% if section =="stops" %}active{% endif %}">{{ link_to('carrier/stops', 'Stops','class':'menu-link') }}</li>
                 <li class="my-2 {% if section =="sells" %}active{% endif %}">{{ link_to('carrier/sells', 'Sells','class':'menu-link') }}</li>
                 <li class="my-2 {% if section =="orders" %}active{% endif %}">{{ link_to('carrier/orders', 'Orders','class':'menu-link') }}</li>
                 <li class="my-2 {% if section =="comments" %}active{% endif %}">{{ link_to('carrier/comments', 'Comments','class':'menu-link') }}</li>
             </ul>
         </div>
         <div class="col-8">  {{ content() }}</div>
     </div>
     <div class="row">
         <div class="col-md-offset-0"> {{ var_dump }}</div>
     </div>



 {% endblock %}


