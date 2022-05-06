<template>
   <div class="container mb-2">
    <div class="row">
        <div class="col-md-8 panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Comentarios recientes</h3>
                <span class="label label-info">
                    {{comentarios.length}}</span>
            </div>
            <div class="panel-body">
                <ul class="list-group" v-for="comentario in this.comentarios" v-bind:key="comentario.id">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img :src="`storage/${comentario.imagen}`" width="40" height="40" class="rounded-circle" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <div class="mic-info">
                                        Por: <a href="#">{{comentario.autor}}</a>  {{moment(comentario.created_at).format('L')}}
                                    </div> 
                                </div>
                                <div class="comment-text">
                                  {{comentario.contenido}}
                                  <a href="#" class="text-danger" v-if="comentario.user_id == usuario.id" @click.prevent="deleteComment(comentario.id)">Eliminar comentario</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item" v-if="pagination.current_page>1">
                                            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page--)">
                                                <span>Atrás</span>
                                            </a>
                                        </li>
                                       
                                        <li class="page-item" v-if="pagination.current_page< pagination.last_page">
                                            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page++)">
                                                <span>Siguiente</span>
                                            </a>
                                        </li>
                                    </ul>
            </nav>
        </div>
    </div>
</div>
</template>

<script>
import publicacionVue from './publicacion.vue';

let user= document.head.querySelector('meta[name=user]');
export default {
 props: ['publicacionId', 'userId'],  
  data() {
            return {
               pagination: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from':0,
                'to': 0
               }
            }
        },
  mounted(){

      },
       created(){
        this.getComments();
      },
      computed: {
          comentarios(){
              return this.$store.getters.obtenerComentarios;
          },
          isActivated: function() {
              return this.pagination.current_page;
          },
          pagesNumber: function(){
              if(!this.pagination.to){
                  return []
              }
              var from= this.pagination.current_page-2//TODO offset

              if(from<1 ){
                  from=1;
              }

              var to= from+(2*2); //todo ofsset
              if(to>=this.pagination.last_page){
                  to= pagination.last_page;
              }
              var pageArray= [];

              while(from<=to){
                  pageArray.push(from);
                  from++;
              }
              return pageArray;
          },
          usuario(){
          return JSON.parse(user.content);
        },
      },
      methods: {
        getComments: function(page)
        {
         var urlComments = 'api/'+this.publicacionId+'/comentarios?page='+page;
          axios.get(urlComments) .then(respuesta=> {
              this.$store.commit("AGREGAR_COMENTARIOS", respuesta.data.comentarios.data);
              this.pagination= respuesta.data.pagination;
          });
        },
        changePage: function(page) 
        {
         page= this.pagination.current_page;
         this.getComments(page);
        },
        deleteComment: function(comentario){
         axios.delete('/api/comentarios/' + comentario)
            .then(response=>{
                console.log(response.data);
            });
        }
        },
}
</script>

<style lang="scss">
.widget .panel-body { padding:0px; }
.widget .list-group { margin-bottom: 0; }
.widget .panel-title { display:inline }
.widget .label-info { float: right; }
.widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
.widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
.widget .mic-info { color: #666666;font-size: 11px; }
.widget .action { margin-top:5px; }
.widget .comment-text { font-size: 12px; }
.widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
</style>