<div class="top_fixed_main">
	{{ partial('../../shared_views/header') }}
	<div class="content">
		<h2 class="text-center padding_top mb-4 text-white">
        {% if  page.seo_before_route %}
            {{ page.seo_before_route }}
        {% else %}
            Bus tickets in Ukraine, Russia and Europe
		{% endif %}
		</h2>
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
        <div class="icon_block mx-4 safe col"><br><span> </span>
            <div>{{ translate("safe_payment","Safe payment by the card") }}</div>
        </div>
        <div class="icon_block mx-4 directions col"><br><span> </span><div>{{ translate("directions","More than 300 directions") }}</div></div>
        <div class="icon_block mx-4 service col"><br><span> </span><div>{{ translate("support_service","24-hour support service") }}</div></div>
        <div class="icon_block mx-4 money col"><br><span> </span><div>{{ translate("Return","Return without problems") }}</div></div>
    </div>
</div>
</div>
<div class="container-fluid">
	<div class="row breadcrumbs-row">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">{{ translate("path","Path") }} > </li>
		</ol>
	</div>
	<div class="row">
		<div class="col">

		</div>
	</div>


	<section>
		<div class="popular_destinations ">
			<h2>{{ translate('popular_destinations', 'Popular destinations') }}</h2>
			<div class="subhead-popular-dest">
				<span class="sub-popular-dest">{{ translate('date_popular_dest','April 2020') }}</span>
				<span class="sub-popular-dest">{{ translate('city_popular_dest','From: Lviv') }}</span>
		</div>
			<div class="shadow-popular"><img src="/images/frontend/st_top_bg2.png"></div>
			<div class="d-inline-flex">
				<div class="img-container">
					<div class="popular-dest first-popular-dest">
						<div class="text-first-popular">
							<div class="content-first-popular-dest">
								<div class="d-inline h2">
									{{ translate('lisbon','Lisbon') }},&nbsp
								</div>
								<div class="d-inline h5">
									{{ translate('portugal','Portugal') }}
								</div>
							</div>

							<div class="pt-2">
							<span class="p-1 mr-4">
								{{ translate('view_prices','View prices') }}
							</span>
								<span>
								<img src="/images/frontend/arrow_png24.png">
							</span>
							</div>
						</div>
					</div>
				</div>
				<div class="img-container">
					<div class="popular-dest second-popular-dest">
						<div class="text-first-popular">
							<div class="content-first-popular-dest">
								<div class="d-inline h2">
									{{ translate('vilnius','Vilnius') }},&nbsp
								</div>
								<div class="d-inline h5">
									{{ translate('lithuania','Lithuania') }}
								</div>
							</div>

							<div class="pt-2">
							<span class="p-1 mr-4">
								{{ translate('view_prices','View prices') }}
							</span>
								<span>
								<img src="/images/frontend/arrow_png24.png">
							</span>
							</div>
						</div>
					</div>

				</div>
				<div class="img-container">
					<div class="popular-dest third-popular-dest">
						<div class="text-first-popular">
							<div class="content-first-popular-dest">
								<div class="d-inline h2">
									{{ translate('barcelona','Barcelona') }},&nbsp
								</div>
								<div class="d-inline h5">
									{{ translate('spain','Spain') }}
								</div>
							</div>

							<div class="pt-2">
							<span class="p-1 mr-4">
								{{ translate('view_prices','View prices') }}
							</span>
								<span>
								<img src="/images/frontend/arrow_png24.png">
							</span>
							</div>
						</div>
					</div>

				</div>

				<div class="img-container">
					<div class="popular-dest fourth-popular-dest">
						<div class="text-first-popular">
							<div class="content-first-popular-dest">
								<div class="d-inline h2">
									{{ translate('prague','Prague') }},&nbsp
								</div>
								<div class="d-inline h5">
									{{ translate('czech','Czech') }}
								</div>
							</div>

							<div class="pt-2">
							<span class="p-1 mr-4">
								{{ translate('view_prices','View prices') }}
							</span>
								<span>
								<img src="/images/frontend/arrow_png24.png">
							</span>
							</div>
						</div>
					</div>

				</div>

			</div>
	</div>
	</section>

</div>




