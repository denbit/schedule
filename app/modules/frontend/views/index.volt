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
<div class="top_fixed_main">
{{ partial('../../shared_views/header') }}
    <h2 class="text-center margin_top mb-2 text-white">Bus tickets in Ukraine, Russia and Europe</h2>
    <form class="form">
        <div class="from">
            <div class="string">From</div>
            <input class="input" placeholder="Kharkov">
        </div>
        <div class="from">
            <div class="string">To</div>
            <input class="input" placeholder="Kiev">
        </div>
        <div class="from">
            <div class="string">Data</div>
            <input class="input" placeholder="March 28">
        </div>
        <div class="from">
            <div class="string"></div>
            <input class="input" placeholder="1 passenger">
        </div>
        <div class="from">
            <div class="string"></div>
            <div class="button"><span class="align">Schedule</span></div>
        </div>
    </form>
    <div class="additional_icons">
        <div class="icon_block">

        </div>
        <div class="icon_block">

        </div>
        <div class="icon_block">

        </div>
        <div class="icon_block">

        </div>
        <div class="icon_block">

        </div>
        <div class="icon_block">

        </div>

    </div>
</div>

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
