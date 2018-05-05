 <footer class="main-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <p>Digitaliza Soluções &copy; {{ date('Y') }} - Todos os direitos Reservados</p>
      </div>
      <div class="col-sm-6 text-right">
        <p>Desenvolvido na <a href="https://www.instagram.com/etech.elinardo/" target="_blank" class="external"><img src="{{ asset('img/logo_etech.png')}}" style="max-height:30px;" class="img-fluid" alt=""></a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
      </div>
    </div>
  </footer>
</div>
</div>
</div>
<!-- Javascript files-->

<script src="{{ asset('js/app.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
    <script src="{{ asset('admin/js/tether.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{ asset('admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
@yield('js-seach')
@yield('scripts')
@yield('vue-can')

</body>
</html>