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
                    <div class="card-body">
                      <form class="form-horizontal">                                      
                      
                        <div class="line"> </div>
                        <div class="row">
                          <label class="col-sm-3 form-control-label">Dados do Link</label>
                          <div class="col-sm-9">
                            <div class="form-group-material">
                              <input id="register-username" type="text" name="registerUsername" required class="input-material">
                              <label for="register-username" class="label-material">Nome do Arquivo</label>
                            </div>
                            <div class="form-group-material">
                              <input id="register-email" type="email" name="registerEmail" required class="input-material">
                              <label for="register-email" class="label-material">Link do Google Driver</label>
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
                            <select name="pasta_id" class="form-control">
                              @foreach($pastas as $pasta)
                              <option value="{{ $pasta->id }}">{{ $pasta->nome }}</option>
                              @endforeach
                            </select>
                          </div>

                            <label class="col-sm-3 form-control-label">Selecione uma Sub Pasta</label>
                          <div class="col-sm-9 select">
                            <select name="subpasta_id" class="form-control">
                              @foreach($pasta->subpasta as $subp)
                              <option value="{{ $subp->id }}">{{ $subp->nome }}</option>
                              @endforeach
                            </select>
                          </div>
                         
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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