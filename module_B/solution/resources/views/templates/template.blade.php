<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Tokenize - @yield('title')</title>
</head>

<body>
    <!-- BACKGROUND -->
    <div class="background">
        <div></div>
        <div></div>
    </div>

    <nav style="display: flex; flex-direction: column; gap: 20px;" id="header">
        <a href={{ route('workspace.index') }}>Home</a>
    </nav>
    @yield('content')
</body>

</html>