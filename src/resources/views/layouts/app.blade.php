<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
    </script>

    @yield('styles')
</head>
<body>

    <div id="app">
        @include('components.navigation')
        <div class="container">
            @include('flash::message')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ url('/js/app.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // flash modal
            $('#flash-overlay-modal').modal();

            // auto hide modal
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

            // setup ajax csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
