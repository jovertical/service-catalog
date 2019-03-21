<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Metas -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width, shrink-to-fit=no" />

        <title>{{ config('app.name') }}</title>
    </head>

    <body>
        <div id="root"></div>

        <script src="{{ _asset('js/vendor.js') }}"></script>
        <script src="{{ _asset('js/admin.js') }}"></script>
    </body>
</html>
