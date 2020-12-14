@extends('templates.default')

@section('title')
    Horários
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor font-weight-bold">Horários</h2>
            </div>
            @can('isAdmin')
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn btn-maincolor addLab font-weight-bold" href="{{route('schedules.create')}}"
                       role="button">Novo</a>
                </div>
            @endcan
        </div>
        <hr class="mb-3">
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <p class="m-0 text-black">{{session()->get('message')}}</p>
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <div class="h-100">
                <h4>Segunda-Feira</h4>
                <div class="container">
                    @foreach($schedules as $schedule)

                        @if($schedule->day  == 'Segunda-Feira')
                            <hr>
                            <a @can('isAdmin') href="{{route('schedules.edit', ['schedule' => $schedule->id])}}"
                               @endcan class="m-0">{{$schedule->start.' às '. $schedule->end}}</a><br>
                            <a href="{{route('labs.show', ['labs' => $schedule->laboratory->id])}}">{{$schedule->laboratory->description}}</a>
                            <br>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="h-100">
                <h3>Terça-Feira</h3>
                <div class="container">
                    @foreach($schedules as $schedule)
                        @if($schedule->day  == 'Terca-Feira')
                            <hr>
                            <a @can('isAdmin') href="{{route('schedules.edit', ['schedule' => $schedule->id])}}"
                               @endcan class="m-0">{{$schedule->start.' às '. $schedule->end}}</a><br>
                            <a href="{{route('labs.show', ['labs' => $schedule->laboratory->id])}}">{{$schedule->laboratory->description}}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="h-100">
                <h3>Quarta-Feira</h3>
                <div class="container">
                    @foreach($schedules as $schedule)
                        @if($schedule->day  == 'Quarta-Feira')
                            <hr>
                            <a @can('isAdmin') href="{{route('schedules.edit', ['schedule' => $schedule->id])}}"
                               @endcan class="m-0">{{$schedule->start.' às '. $schedule->end}}</a><br>
                            <a href="{{route('labs.show', ['labs' => $schedule->laboratory->id])}}">{{$schedule->laboratory->description}}</a>
                            <br>

                        @endif
                    @endforeach
                </div>
            </div>
            <div class="h-100">
                <h3>Quinta-Feira</h3>
                <div class="container">
                    @foreach($schedules as $schedule)
                        @if($schedule->day  == 'Quinta-Feira')
                            <hr>
                            <a @can('isAdmin') href="{{route('schedules.edit', ['schedule' => $schedule->id])}}"
                               @endcan class="m-0">{{$schedule->start.' às '. $schedule->end}}</a><br>
                            <a href="{{route('labs.show', ['labs' => $schedule->laboratory->id])}}">{{$schedule->laboratory->description}}</a>
                            <br>

                        @endif
                    @endforeach
                </div>
            </div>
            <div class="h-100">
                <h3>Sexta-Feira</h3>
                <div class="container">
                    @foreach($schedules as $schedule)
                        @if($schedule->day  == 'Sexta-Feira')
                            <hr>
                            <a @can('isAdmin') href="{{route('schedules.edit', ['schedule' => $schedule->id])}}"
                               @endcan class="m-0">{{$schedule->start.' às '. $schedule->end}}</a><br>
                            <a href="{{route('labs.show', ['labs' => $schedule->laboratory->id])}}">{{$schedule->laboratory->description}}</a>
                            <br>

                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @if(count($schedules) == 0)
            <p class="d-flex justify-content-center mt-2">Nenhuma horário encontrado</p>
    @endif

@endsection

