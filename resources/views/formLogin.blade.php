<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url(mix('/css/bootstrap.css')) }}">
    <title>Login</title>
</head>
<body>
    <div class="container pt-5">
        <form id="formLogin">
            <div class="form-group">
                <label for="registration">Matrícula</label>
                <input type="text" class="form-control" name="registration" id="registration" placeholder="">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
            <button type="button" name="systemLogin" id="systemLogin" class="btn btn-maincolor">Entrar</button>
        </form>
    </div>
</body>

<script src="{{ url(mix('/js/jquery.js')) }}"></script>
<script src="{{ url(mix('/js/sweetalert2.js')) }}"></script>
<script src="{{ url(mix('/js/login.js')) }}"></script>

</html>