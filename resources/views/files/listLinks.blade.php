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
              {{ Breadcrumbs::render('show.links', $subpasta->id) }}
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
                      <h3 class="h4">Lista dos Link</h3>
                    </div>
                    @include('partials._messages')
                    <div class="card-body">
                        <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nome do Arquivo</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                         @foreach($pasta as $linkar)
            <tbody>
                <tr>
                        <td>{{ $linkar->id }} </td>
                        <td><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ $linkar->nome }} </td>
                        
                        <td width="1%" nowrap="nowrap">
  <a href="{{$linkar->link}}" target="_blank" title="Baixar"><button type="button" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true" alt="baixar"></i></button></a>

 <a href="" title="Delete Dados" onclick="return confirm('Tem certeza disso?')"><button type="button" class="btn btn-danger btn-large"><i class="fa fa-trash-o" aria-hidden="true" alt="deletar"></i></button></a>
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