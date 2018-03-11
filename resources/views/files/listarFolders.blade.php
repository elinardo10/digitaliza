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
    {{ Breadcrumbs::render('home') }}
  </div>
  <!-- listando pastas-->
  
  <section class="projects no-padding-bottom">
    <div class="container-fluid">
      @include('partials._messages')
      <!-- Project-->
      @foreach($pastas as $pasta)
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="text">
                
                <h3 class="h4"><i class="fa fa-folder fa-4" aria-hidden="true"></i> <a href="{{route('subpasta.lista', $pasta->id)}}">{{$pasta->pasta}}</a></h3>
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