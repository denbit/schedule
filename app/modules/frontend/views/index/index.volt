<div class="content"> <h2 class="text-center padding_top mb-4 text-white">
        {% if  page.seo_before_route %}
            {{ page.seo_before_route }}
        {% else %}
            Bus tickets in Ukraine, Russia and Europe
        {% endif %}</h2>
    <form class="form row">
        <div class="form_container_search col ">
            <div class="string">From</div>
            <input class="input city from" placeholder="Kharkov">
        </div>
        <div class="form_container_search col ">
            <div class="string">To</div>
            <input class="input city to" placeholder="Kiev">
        </div>
        <div class="form_container_search col">
            <div class="string">Data</div>
            <input class="input" placeholder="March 28">
        </div>
        <div class="form_container_search col">
            <div class="string"></div>
            <input class="input" placeholder="1 passenger">
        </div>
        <div class="form_container_search col">
            <div class="string"></div>
            <div class="button"><span class="align">Schedule</span></div>
        </div>
    </form>
    <div class="additional_icons row">
        <div class="icon_block mx-4 air col"><br><span> </span><div>{{ translate("air_charter","Air charter") }}</div></div>
        <div class="icon_block mx-4 free col"><br><span> </span><div>{{ translate("free_shipping","Free shipping") }}</div></div>
        <div class="icon_block mx-4 safe col"><br><span> </span><div>{{ translate("Safe_payment","Safe payment by the card") }}</div></div>
        <div class="icon_block mx-4 directions col"><br><span> </span><div>{{ translate("directions","More than 300 directions") }}</div></div>
        <div class="icon_block mx-4 service col"><br><span> </span><div>{{ translate("support_service","24-hour support service") }}</div></div>
        <div class="icon_block mx-4 money col"><br><span> </span><div>{{ translate("Return","Return without problems") }}</div></div>
    </div>
</div>
</div>

<div class="container-fluid">
    <div class="row breadcrumbs-row">
        <div class="col-12"><i>{{ translate("path","Path") }} > </i></div>
{#       <div style="word-break: break-all; word-wrap: break-word">{{dump(page)  }}</div>#}
    </div></div>