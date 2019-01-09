<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Szlach - {{ title |default("Transportation and schedule  system") }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('shared/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ url('css/common.css') }}"/>
</head>

<body>
<header class="top_fixed">
    <nav class="justify-content-start navbar navbar-expand-sm navbar-light">
        <div class="col-1 offset-1">
            <img class=" navbar-brand " src="{{ url('images/btn.gif') }}">
        </div>
        <div class="col-1"><h1>ШЛЯХ
            </h1></div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-4">
                    <a class="nav-link active" href="#">Schedule</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link active" href="#">For passangers</a>
                </li>
                <li class="nav-item mx-">
                    <a class="nav-link active" href="#">My tickets</a>
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
    <h2 class="text-center my-5 text-white">Find your path! <br>{{ subtitle|default("Szlach") }}</h2>
</header>
<div class="container-fluid">
    <div class="row breadcrumbs-row">
        <div class="col-12"><i>Szlach > </i></div>
    </div>

    {{ content() }}
</div>
<footer class="mt-4"><h6 class="text-center"> Szlach 2018 &reg;</h6></footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="/js/carrier.main.js" async></script>
</body>


</html>
