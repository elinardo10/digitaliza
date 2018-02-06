 @extends('layouts.app')

@section('content')
<!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Lista de Usuários</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
             {{ Breadcrumbs::render('usuarios') }}
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
                        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                         <a href="{{route('register' )}}" class="dropdown-item edit"> <i class="fa fa-user-plus"></i>Adicionar Usuários</a>
                       </div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Lista de Usários do Sistema</h3>
                    </div>
                    @include('partials._messages')
                    <div class="card-body">
                        <table class="table">
                        <thead>
                          <tr>
                            <th>Nome do Usuário</th>
                            <th>E-mail</th>
                            <th>Ações</th>

                          </tr>
                        </thead>
                         @foreach($users as $user)
               <tbody>
                <tr>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>

                        <td width="1%" nowrap="nowrap">
                       <a href="{{route('user.edit', $user->id )}}" title="Editar"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true" alt="Editar Usuário"></i></button></a>
                          
                       <a href="{{route('user.delete', $user->id)}}" title="Delete Dados" onclick="return confirm('Tem certeza disso?')"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-user-times" aria-hidden="true" alt="deletar"></i></button></a>
               
                        </td>

                </tr>
             </tbody>
            @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
             @endsection