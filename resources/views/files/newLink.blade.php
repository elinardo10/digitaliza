  @extends('layouts.app')

@section('content')
<!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Controle de Arquivos</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('folders.listar') }}">Home</a></li>
              <li class="breadcrumb-item active">cadastrar link           </li>
            </ul>
          </div>
   <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Cadastrando Novo Link</h3>
                    </div>
                    @include('partials._messages')
                    <div class="card-body">
                      <form class="form-horizontal" method="POST" action="{{ route('store.link') }}">          
                        {{ csrf_field() }}                            
                        <div class="line"> </div>
                        <div class="row">
                          <label class="col-sm-3 form-control-label">Dados do Link</label>
                          <div class="col-sm-9">
                            <div class="form-group-material">
                              <input id="register-name" type="text" name="nome" required class="input-material">
                              <label for="register-name" class="label-material">Nome do Arquivo</label>
                            </div>
                            <div class="form-group-material">
                              <input id="register-link" type="text" name="link" required class="input-material">
                              <label for="register-link" class="label-material">Link do Google Driver</label>
                            </div>
                        
                          </div>
                        </div>

                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Selecione um Usuário</label>
                          <div class="col-sm-9 select">
                            <select name="user_id" class="form-control">
                      @foreach($usuario as $u)
                            <option value="{{ $u->id }}">{{$u->name}}</option>
                        @endforeach
                            </select>
                          </div>

                           <label class="col-sm-3 form-control-label">Selecione uma Pasta</label>
                          <div class="col-sm-9 select">
                            <select name="pasta_id" id="pasta_id" class="form-control">
                              @foreach($pastas as $pasta)
                              <option value="{{ $pasta->id }}">{{ $pasta->pasta }}</option>
                              @endforeach
                            </select>
                          </div>

                            <label class="col-sm-3 form-control-label">Selecione uma Sub Pasta</label>
                          <div class="col-sm-9 select">
                            <select name="subpasta_id" id="subpasta_id" class="form-control" >
                               
                              <option value=""></option>
                               
                            </select>
                          </div>
                         
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
             @endsection

       @section('scripts')
       <script type="text/javascript">
         $('#pasta_id').on('change', function(e){
        console.log(e);

        var idPasta = e.target.value;
          $.get('subfolders/' + idPasta, function(data){
          //teste de data ok. funcionou no console
          $('#subpasta_id').empty();
          $.each(data, function(index, subpastObj){
            $('#subpasta_id').append('<option value=' + subpastObj.id+ '>' +subpastObj.subpasta+ '</option>');

          });
        });
      });
        </script>
     @endsection
