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
{{ partial('../../shared_views/header') }}
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/js/carrier.main.js" async></script>
</body>


</html>