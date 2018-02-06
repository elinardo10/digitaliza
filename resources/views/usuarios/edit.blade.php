  @extends('layouts.app')

@section('content')
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Forms</h2>
            </div>
          </header>
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Alteradando user</li>
            </div>
          </ul>
          <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
               <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">alterar usuario: {{$user->name}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update', $user->id) }}">
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