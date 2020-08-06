<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/AirConditioning/public/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/AirConditioning/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="http://localhost/8000/AirConditioning/vendor/datatables/datatables/media/css/jquery.dataTables.min.css"> --}}
    <title>@yield('title')</title>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div id="oi" class="col-2">
                <div id="menu">
                    <div id="sidebar-header" class="d-flex justify-content-center">
                        <img id="profile" src="http://localhost/AirConditioning/public/Assets/img/profile.png">
                    </div>
                    <div id="links" class="list-group list-group-flush">
                        <a href="home" class="list-group-item list-group-item-action bg-transparent text-light h3">Home</a>
                        <a href="#" class="list-group-item list-group-item-action bg-transparent text-light h3">Professores</a>
                        <a href="laboratorios" class="list-group-item list-group-item-action bg-transparent text-light h3">Laboratórios</a>
                        <a href="#" class="list-group-item list-group-item-action bg-transparent text-light h3">Ocorrências</a>
                        <a href="#" class="list-group-item list-group-item-action bg-transparent text-light h3">Logout</a>
                    </div>
                </div>
            </div>
            <div id="oi" class="col-10">
                <div class="container=fluid">
                    <div class="main container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/AirConditioning/vendor/components/jquery/jquery.min.js"></script>
    <script src="http://localhost/AirConditioning/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    {{-- <script src="http://localhost/AirConditioning/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script> --}}

</body>

</html>