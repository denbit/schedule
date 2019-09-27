

    <nav class="justify-content-start navbar navbar-expand-sm navbar-light">
        <div class="col-1 offset-1">
            <img class=" navbar-brand" src="{{ url('images/btn.gif') }}">
        </div>
        <div><img class="logo_size" src="{{ url('images/logo.png') }}"> </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link active main_mn schedule" href="#">Schedule</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active main_mn passengers" href="#">For passengers</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active main_mn tickets" href="#">My tickets</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active main_mn carriers" href="#">For carriers</a>
                </li>
            </ul>
            <div class="nav-link active main_mn login mr-auto" id="log_in" onclick="showForm()">Login</div>
            {{ partial('../../shared_views/mainForm') }}
            <ul class="navbar-nav">
                <li class="nav-item  mx-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="lang" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {% set lang = page.language %}
                        {{ lang|default("UK") }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right langpopup" aria-labelledby="lang">
                        <a class="dropdown-item" href=" {{ lang=="uk"?'':'?lang=uk'}}">UA</a>
                        <a class="dropdown-item" href=" {{ lang=="en"?'':'?lang=en'}}">EN</a>
                        <a class="dropdown-item" href=" {{ lang=="ru"?'':'?lang=ru'}}">RU</a>
                    </div>
                </li>
                <li class="nav-item mx-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="currency" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ currency|default("UAH") }}</a>
                    <div class="dropdown-menu dropdown-menu-right currencypopup" aria-labelledby="currency">
                        <a class="dropdown-item" href="#">UAH</a>
                        <a class="dropdown-item" href="#">USD</a>
                        <a class="dropdown-item" href="#">EUR</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
