

    <nav class="justify-content-start navbar navbar-expand-sm navbar-light">
        <div class="col-1 offset-1">
            <img class=" navbar-brand" src="{{ url('images/btn.gif') }}">
        </div>
        <div><img class="logo_size" src="{{ url('images/logo.png') }}"> </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-4">
                    <a class="nav-link active main_mn schedule" href="#">Schedule</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link active main_mn" href="#">For passangers</a>
                </li>
                <li class="nav-item mx-">
                    <a class="nav-link active main_mn tickets" href="#">My tickets</a>
                </li>
            </ul>
            <div> ADmin@admin.uk</div>
            <ul class="navbar-nav">
                <li class="nav-item  mx-5 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="lang" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ lang|default("UK") }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right langpopup" aria-labelledby="lang">
                        <a class="dropdown-item" href="#">UA</a>
                        <a class="dropdown-item" href="#">EN</a>
                        <a class="dropdown-item" href="#">RU</a>
                    </div>
                </li>
                <li class="nav-item mx-5 dropdown">
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
