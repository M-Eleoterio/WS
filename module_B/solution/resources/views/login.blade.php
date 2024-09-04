<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>

<body>
    <div id="lg-container">
        <!-- BACKGROUND -->
        <div class="background">
            <div></div>
            <div></div>
        </div>

        <h1 id="lg-title">TOKENIZE</h1>
        <form action={{ route('user.login') }} method="post" id="lg-form">
            @csrf
            <h3>Login</h3>
            <label>
                <p>Email:</p>
                <input type="email" name="email" placeholder="example@email.com">
            </label>
            <label>
                <p>Password:</p>
                <input type="password" name="password" placeholder="******">
            </label>
            <div id="line">
                <div class="line"></div>
                <div class="dot"></div>
                <div class="line"></div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>