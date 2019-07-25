<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Szlach - {{ page.title |default("Transportation and schedule  system") }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/shared/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ url('/css/common.css') }}"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"/>
</head>

<body>
<div class="top_fixed_main">
{{ partial('../../shared_views/header') }}

    {{ content() }}
    <div class="form_login"></div>

<footer class="mt-4"><h6 class="text-center"> Szlach {{ date('Y') }}&reg;</h6></footer>
{{ partial('../../shared_views/js_libs') }}
    <script src="/js/common.main.js" async></script>

</body>


</html>
