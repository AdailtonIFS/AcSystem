@extends('templates.default')
@section('title')
    Laboratórios
@endsection

@section('content')

        <div class="row">
            
            @if(count($labs))
            @foreach ($labs as $lab)
                        
                    <div id="colun" class="col-sm3 col-xl-4">

                        <div class="card bg-secondary h-100" style="width: 20rem;">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <div class="row">

                                    <div class="col-7">
                                        <div id="header">
                                            <h3 class="align-items-center d-flex justify-content-center card-title text-white">
                                                Laboratório 0{{$lab->id}} 
                                            </h3>
                                        </div>
                                        <div class="align-items-center d-flex justify-content-center">
                                            <p class="text-white">
                                                @if($lab->status==0)Desativado @else Ativado @endif
                                            </p>
                                        </div>
                                    <a href="" id="veroneLab" data-id="{{$lab->id}}">
                                        Ver Detalhes
                                    </a>
                                    </div>
                                    
                                    
                                    <div class="col-5 align-items-center d-flex justify-content-center">
                                        <img  src="{{asset('/img/macbook.png')}}" style="width:64px;height:64px;" alt="notebook">
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
                @endif

                <div id="colun" class="col-sm3 col-xl-4">

                    <div class="card bg-secondary h-100" style="width: 20rem;">
                        <div class="card-body align-items-center d-flex flex-column justify-content-center">

                                <img  src="{{asset('/img/macbook.png')}}" style="width:64px;height:64px;" alt="notebook">
                                <a href="javascript:void(0)" id="newLab" class="bg-transparent text-white text-decoration-none" onclick="openModal('#cadastrarLab')">Cadastrar</a>                               
                        </div>

                    </div>
                </div>


            </div>

            {{-- Modal para ver apenas um Laboratório --}}
                <div class="modal fade" id="verLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                
                            </div>
                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- Modal para cadastrar um laboratório --}}

                <div class="modal fade" id="cadastrarLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center bg-secondary">
                                <p class="heading">Cadastrando Laboratório</p>
                            </div>

                            <div class="modal-body">

                                <form autocomplete="off" method="post" id="formLab">
                                    <div class="form-group">
                                    <label for="numLab" class="col-form-label">Laboratório:</label>
                                    <input type="text" class="form-control" name="id" id="id">
                                    </div>
                                    <div class="form-group">
                                    <label for="description" class="col-form-label">Descrição:</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                    <button type="submit" id="novoLab"class="btn btn-secondary">Cadastrar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </form>
                                
                            </div>
                            
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                
        </div>




@endsection