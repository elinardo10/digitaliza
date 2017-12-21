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
              <li class="breadcrumb-item active">Pastas           </li>
            </ul>
          </div>
 <!-- listando pastas-->
            @include('partials._messages')
          <section class="projects no-padding-bottom">
            <div class="container-fluid">
              <!-- Project-->
              @foreach($pastas as $pasta)
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="text">
                        
              <h3 class="h4"><i class="fa fa-folder fa-4" aria-hidden="true"></i> <a href="{{route('subpasta.listar', $pasta->id)}}">{{$pasta->pasta}}</a></h3>
                      </div>
                    </div>
                   </div>
                  </div>
                </div>
                @endforeach
                
              <!-- Project-->
              <br><br><br><br><br><br><br>
             
            </div>
          </section>
             @endsection