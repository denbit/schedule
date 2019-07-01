<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Carrier Company - {{ title |default("Transportation, schedule and ticket control system")}}</title>
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('shared/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ url('css/common.css') }}" />
    <link rel="stylesheet" href="{{ url('css/carrier.css') }}"/>
</head>

<body>
<header class="top_fixed">
{{ partial('../../shared_views/header') }}
    <h2 class="text-center my-5 text-white">Find your path! <br>{{ subtitle|default("Szlach") }}</h2>
</header>
<div class="container-fluid">
    <div class="row breadcrumbs-row">
        <div class="col-12"><i>Bradcrumps > Main</i></div>
    </div>
    <div class="row submenu">
        <div class="col-sm-2 offset-1 ">
            <div class="row sub-bd">
                <div class="pict"></div>
                <div class="col my-3">
                    <p>Company</p>
                    <p>COntent</p>
                </div>
            </div>
            <div class="row align-items-end justify-content-end ">
                <div class="col-4 add"><span>add+</span></div>
            </div>
        </div>
        <div class="col-sm-2 ">
            <div class="row sub-bd">
                <div class="pict"></div>
                <div class="col my-3">
                    <p>Company</p>
                    <p>COntent</p>
                </div></div>
            <div class="row align-items-end justify-content-end">
                <div class="col-4 add"><span>add+</span></div>
            </div></div>
        <div class="col-sm-2">
            <div class="row sub-bd">
                <div class="pict"></div>
                <div class="col my-3">
                    <p>Company</p>
                    <p>COntent</p>
                </div>
            </div>
            <div class="row align-items-end justify-content-end">
                <div class="col-4 add"><span>add+</span></div>
            </div></div>
        <div class="col-sm-2">
            <div class="row sub-bd">
                <div class="pict"></div>
                <div class="col my-3">
                    <p>Company</p>
                    <p>COntent</p>
                </div>
            </div>
            <div class="row align-items-end justify-content-end">
                <div class="col-4 add"><span>add+</span></div>
            </div></div>
        <div class="col-sm-2">
            <div class="row sub-bd">
                <div class="pict"></div>
                <div class="col my-3">
                    <p>Company</p>
                    <p>COntent</p>
                </div>
            </div>
            <div class="row align-items-end justify-content-end" >
                <div class="col-4 add"><span>add+</span></div>
            </div></div>
    </div>
    {{ content() }}
</div>
<footer class="mt-4"><h6 class="text-center">Carrier control system v1.0</h6></footer>
{{ partial('../../shared_views/js_libs') }}
<script src="/js/carrier.main.js" async></script>
</body>


</html>