<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabler Dashboard</title>
    <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('tabler/js/tabler.min.js') }}" defer></script>
</head>
<body>
<div class="page">
    <div class="page-wrapper">
        <main class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
</html>
