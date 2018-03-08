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
                      <h3 class="h4">alterar usuario: {{$user->name}}</h3>
                    </div>
                    @include('partials._messages')

                <div class="panel-body">

                    <form class="form-horizontal" method="post" action="{{ route('user.update', $user->id) }}">
                        {{ csrf_field() }}

                      @include('usuarios.partials.form')

                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
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