<!DOCTYPE html>
<html lang="pt-BR" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <title>Login</title>
</head>
<body class="h-100" style="background: #F6F6F6" >
    <div class="container pt-5 d-flex flex-column justify-content-center h-100 align-items-center">
        <form id="formLogin" method="POST" action='{{route('login.todo')}}' class=" rounded shadow-sm bg-white d-flex flex-column justify-content-center align-items-center w-75 h-75">
            @csrf
            <h3>Seja bem vindo a área administrativa do</h3>
            <img src="{{asset('img/ACSystem.svg')}}" class="mb-2" alt="ACSystem">
            <hr class="text-danger">
            @if(isset($message))
                <div class="alert alert-danger" role="alert">
                    <p class="m-0 text-black">{{$message ?? ''}}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <p class="m-0 text-black">{{$errors->all()[0] ?? ''}}</p>
                </div>
            @endif
            <div class="form-group  w-75 m-4">
                <label for="registration">Matrícula</label>
                <input type="text" class="form-control" name="registration" id="registration" placeholder="" value="{{old('registration')}}">
            </div>
            <div class="form-group   w-75 m-4">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
            <button type="submit" name="systemLogin" id="systemLogin" class="btn btn-success">Entrar</button>
        </form>
    </div>
</body>

</html>
