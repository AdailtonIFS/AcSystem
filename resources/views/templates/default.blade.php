<!DOCTYPE html>
<html class="h-100" lang="pt-br">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP System to manage the use of air conditioners at the Federal Institute of Sergipe.">
    <meta name="keywords" content="Airconditioner, Airconditioning, IFS, Instituto">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url(mix('/css/bootstrap.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('/css/dataTables.bootstrap4.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('/css/sweetalert2.css')) }}">
    <link rel="stylesheet"  href="{{ url(mix('/css/style.css')) }}" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>@yield('title')</title>

</head>

<body class="h-100" >
    {{-- div principal --}}
    <div class="container-fluid">
        {{-- row for grid system BOOTSTRAP --}}
        <div class="row">
            {{-- first column --}}
            <div class="mr-0 p-0 col-2">
                {{-- div menu --}}
                <div id="menu" class="sticky-top shadow-sm">
                    {{-- header menu --}}
                    <div id="sidebar-header" class="list-group d-flex bg-maincolor align-items-center justify-content-center border-bottom border-dark" style="font-size: 1rem;height: 100px;">
                        {{-- div items --}}
                        <div class="align-items-center ">
                    
                            <div class="d-flex justify-content-center">
                                <h5 class="text-white font-weight-bold" style="font-family:'Roboto', sans-serif;">Adailton Moura</h5>
                            </div>

                            <div class="d-flex justify-content-center">
                                <h5 class="text-white font-weight-bold" style="font-family:'Roboto', sans-serif;">2018300655</h5>
                            </div>

                        </div>
                        {{-- div items final --}}
                    </div>
                    {{-- header menu final --}}


                    <div id="links" class="list-group d-flex align-items-center bg-white">

                            <a href="{{route('home')}}" class="list-group-item d-flex justify-content-start align-items-center w-100 bg-transparent text-secondary border-0 font-weight-bold text-decoration-none ">
                                <img src="{{asset('/img/home.png')}}" alt="Home" style="width: 30px; height:30px;margin-right:9px;">
                                Home
                            </a>

                            <a href="{{route('user.index')}}" class="list-group-item d-flex justify-content-start align-items-center w-100 bg-transparent text-secondary border-0 font-weight-bold text-decoration-none">
                                <img src="{{asset('/img/teacher.png')}}" alt="Usuários" style="width: 30px; height:30px;margin-right:9px;">
                                Usuários
                            </a>

                            <a href="{{route('labs.index')}}" class="list-group-item d-flex justify-content-start align-items-center w-100 bg-transparent text-secondary border-0 font-weight-bold text-decoration-none">
                                <img src="{{asset('/img/computer.png')}}" alt="Laboratórios" style="width: 30px; height:30px;margin-right:9px;"> 
                                Laboratórios
                            </a>
                            <a href="#" class="list-group-item d-flex justify-content-start align-items-center w-100 bg-transparent text-secondary border-0 font-weight-bold text-decoration-none">
                                <img src="{{asset('/img/settings.png')}}" alt="Ocorrências" style="width: 30px; height:30px;margin-right:9px;">
                                Ocorrências
                            </a>
                            <a href="#" class="list-group-item d-flex justify-content-start align-items-center w-100 bg-transparent text-secondary border-0 font-weight-bold text-decoration-none">
                                <img src="{{asset('/img/logout.png')}}" alt="Logout" style="width: 30px; height:30px;margin-right:9px;">
                                Logout
                            </a>
                    </div>

                </div>
                {{-- div menu final --}}
            </div>
            {{-- first column final --}}




            <div class="mr-0 p-0 col-10  d-flex justify-content-center bg-bass">
                        {{-- Container --}}
                        <div class="container rounded bg-white shadow-sm mt-5 mb-5">
                            @yield('content')
                        </div>
            </div>

        </div>
        {{-- div row final --}}
    </div>
    {{-- div principal final --}}




    <script src="{{ url(mix('/js/jquery.js')) }}"></script>
    <script src="{{ url(mix('/js/bootstrap.js')) }}"></script>
    <script src="{{ url(mix('/js/dataTables.js')) }}"></script>
    <script src="{{ url(mix('/js/dataTables.bootstrap4.js')) }}"></script>
    <script src="{{ url(mix('/js/sweetalert2.js')) }}"></script>
    @yield('scripts')

    


</body>
</html>
