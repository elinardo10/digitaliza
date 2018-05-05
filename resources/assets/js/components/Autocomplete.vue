<template>
                      <div>
                      
                      <div class="search-box">
 							<div class="col-sm-5">
 								<div class="form-group-material">
 									<input id="searchLink" type="text" name="searchLink" class="input-material" placeholder="Pesquisar..." v-model="query" v-on:keyup="autoComplete">
 									<label for="searchLink" class="label-material"></label>
 								</div>
 							</div>
 						</div>
 							<table class="table" v-if="results.length">
 							
  								<tbody v-for="result in results">
 									<tr>
        <td ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ result.nome }} </td>
        <td width="1%" nowrap="nowrap">
                      <a v-bind:href="result.link" target="_blank" title="Baixar"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-download" aria-hidden="true" alt="baixar"></i></button></a></td>

 	 									</tr>
 								</tbody>
 								
 							</table>
 							</div>
</template>
<script>
	 export default{
  data(){
   return {
    query: '',
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 1){
     axios.get('/sistema/search',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
   }
  }
}



	
</script>
