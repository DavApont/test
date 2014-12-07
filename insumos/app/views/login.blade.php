<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
</head>
<body>
    @if (! Sentry::check())
        {{ Form::open(array('url' => 'user/login', 'method' => 'post', 'class' => 'pure-form')) }}
            <fieldset>
                    <legend>Login form</legend>

                    <input name="login" type="text" placeholder="Login">
                    <input name="password" type="password" placeholder="Password">

                    <label for="remember">
                        <input name="remember" id="remember" type="checkbox"> Remember me
                    </label>

                    <button type="submit" class="pure-button pure-button-primary">Sign in</button>
                </fieldset>
        {{ Form::close() }}
    @else
        <p>User is logged in!</p>

        {{ Form::open(array('url' => 'user/logout', 'method' => 'get', 'class' => 'pure-form')) }}
            <button type="submit" class="pure-button pure-button-primary">Sign out</button>
        {{ Form::close() }}
    @endif
</body>
</html>