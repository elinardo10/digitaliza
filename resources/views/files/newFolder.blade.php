  @extends('layouts.app')

  @section('content')
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Controle de Arquivos</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
 
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
              <h3 class="h4">Cadastrando Nova Pasta</h3>
            </div>
            @include('partials._messages')
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{ route('store.folder') }}">          
                {{ csrf_field() }}                            
                <div class="line"> </div>
                <div class="row">
                  <label class="col-sm-3 form-control-label">Dados da Pasta</label>
                  <div class="col-sm-9">
                    <div class="form-group-material">
                      <input id="register-name" type="text" name="pasta" required class="input-material">
                      <label for="register-name" class="label-material">Nome da Pasta</label>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                  <div class="col-sm-4 offset-sm-3">
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