<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Login</title>
</head>
<body>

    <div class="container">

        <form onsubmit="return false" class="form-signin" role="form" method="POST" action="/auth/login">
            <h2 class="form-signin-heading">Login</h2>
            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
<!--            <label class="checkbox">-->
<!--                <input type="checkbox" value="remember-me"> Remember me-->
<!--            </label>-->
            <button onclick="auth.login()" class="btn btn-lg btn-primary btn-block">Login</button>
        </form>

    </div>

    <script src="/resources/assets/js/auth.js"></script>
    <script src="/resources/assets/js/libraries/jquery-2.0.3.min.js"></script>
</body>
</html>