
 {% block content %}

     <div class="row">
         <div class="col-2 offset-1">
             <ul class="carrier-menu">
                 <li class="my-2">{{ link_to('carrier/', 'Personal information','class':'menu-link') }} </li>
                 <li class="my-2">{{ link_to('carrier/company', 'Company','class':'menu-link') }}</li>
                 <li class="my-2">{{ link_to('carrier/routes', 'Routes','class':'menu-link') }} </li>
                 <li class="my-2">{{ link_to('carrier/stops', 'Stops','class':'menu-link') }}</li>
                 <li class="my-2">{{ link_to('carrier/sells', 'Sells','class':'menu-link') }}</li>
                 <li class="my-">{{ link_to('carrier/orders', 'Orders','class':'menu-link') }}</li>
                 <li class="my-2">{{ link_to('carrier/comments', 'Comments','class':'menu-link') }}</li>
             </ul>
         </div>
         <div class="col-8">  {{ content() }}</div>
     </div>




 {% endblock %}
<div class="row"></div>
