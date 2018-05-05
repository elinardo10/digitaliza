  <div class="search-box">
  	<button class="dismiss"><i class="icon-close"></i></button>
  	<form id="searchForm" method="GET" action="{{ url('links/autocomplete') }}" role="search">
  		<input type="search" name="term" id="q" placeholder="O que procura?" class="form-control" data-action="{{ route('search-autocomplete') }}"  value="">
  	</form>
  </div>

  @section('scripts-pesquisar')
  <script type="text/javascript">
 $( "#q" ).autocomplete({
	  source: "{{ url('links/autocomplete') }}",
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#q').val(ui.item.value);
	  }
	});
  </script>
  @endsection

