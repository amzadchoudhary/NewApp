<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest - Tabler</title>
    <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('tabler/js/tabler.min.js') }}" defer></script>
</head>
<body class="d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        @yield('content')
    </div>
</div>
</body>
</html>
