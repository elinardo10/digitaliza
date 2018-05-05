<nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
           <!--  <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>-->
            <div class="title">
              <h1 class="h4">{{ Auth::user()->name }}</h1>
             <!--  <p>Web Designer</p>-->
            </div>
          </div>
          <!-- Sidebar Navidation Menus<span class="heading">Main</span>-->
          <ul class="list-unstyled">
            <li class="active"> <a href="{{ route('folders.listar') }}"><i class="fa fa-home" aria-hidden="true"></i>
</i>Home</a></li>
            @can('create-link')
            <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"><i class="fa fa-cogs" aria-hidden="true"></i> Ajustes</a>
              <ul id="dashvariants" class="collapse list-unstyled">
                <!-- <li><a href="{{ route('folders.listar') }}">Listar Arquivos</a></li>-->
                <li><a href="{{ route('new.link') }}"><i class="fa fa-file-text" aria-hidden="true"></i>Cadastrar Link</a></li>
                <li><a href="{{ route('user.list') }}"><i class="fa fa-users" aria-hidden="true"></i>Usuários</a></li>
                <li><a href="{{ route('pasta.new') }}"><i class="fa fa-folder-open" aria-hidden="true"></i>+ Pastas</a></li>
                @endcan
              </ul>
            </li>
            <!-- <li> <a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
            <li> <a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
            <li> <a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
            <li> <a href="login.html"> <i class="icon-interface-windows"></i>Login Page</a></li>
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
          </ul>-->
        </nav>