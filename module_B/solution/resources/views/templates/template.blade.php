<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokenize - @yield('title')</title>
</head>
<body>
    <nav style="display: flex; flex-direction: column; gap: 20px;">
        <a href={{ route('view.dashboard') }} >Home</a>
    </nav>
    @yield('content')
</body>
</html>