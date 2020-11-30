<!DOCTYPE html>
<html lang="pt-BR" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url(mix('/css/bootstrap.css')) }}">
    <title>Login</title>
</head>
<body class="h-100">
    <div class="container pt-5">
        <form id="formLogin" method="POST" action='{{route('login.todo')}}'>
            @csrf
            <div class="form-group">
                <label for="registration">Matrícula</label>
                <input type="text" class="form-control" name="registration" id="registration" placeholder="">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
            <button type="submit" name="systemLogin" id="systemLogin" class="btn btn-maincolor">Entrar</button>
        </form>
    </div>
</body>

</html>
