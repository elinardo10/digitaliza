      @include('partials.header')
      <div class="page-content d-flex align-items-stretch">
      	<!-- Side Navbar -->
      	@include('partials.sidebar')
      	<div class="content-inner" id="app">
      		@yield('content')

      		<!-- Page Footer-->
      		@include('partials.footer')