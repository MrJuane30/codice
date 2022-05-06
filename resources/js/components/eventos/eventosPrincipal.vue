<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container p-5">
            <h2 class="text-center titulo text-success" data-aos="fade-down-right">Eventos</h2>
               <div class="row">
                     <div class="col-lg-4 col-md-4 mb-4" v-for="evento in this.eventos" v-bind:key="evento.id">
                    <div class="card justify-content-center">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img :src="`storage/${evento.imagen}`" class="img-fluid" />
                                <a href="#!">
                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                         <div class="card-body">
                         <h5 class="card-title">{{evento.nombre}}</h5>
                           <p class="text-justify"><b>Fecha y hora: </b>{{evento.fecha}}</p>
                            <p class="text-justify"><b>Dirección:</b>{{evento.direccion}}</p>
                            <p class="card-text">
                            <b>Descripción del evento: </b>{{ evento.descripcion}}</p> 
                            <button v-if="evento.link" class="btn-success" @click="redirect(evento.link)">Ver más</button>
        
                    </div>
                </div>
          </div>
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
        <footer-component></footer-component>
    </div>    
</template>
<script>
import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
export default {

    components: {
        NavbarComponent,
        FooterComponent,
     },
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
 
     created(){
        this.getEvents();
      },
      
       computed: {
          eventos(){
              return this.$store.state.eventos;
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
       },
       methods: {
           redirect: function (link, target = '_blank') {
            window.open(link, target);
        },
        getEvents: function(page)
        {
         var urlEvents = 'api/events?page='+page;
          axios.get(urlEvents) .then(respuesta=> {
              this.$store.commit("AGREGAR_EVENTOS", respuesta.data.eventos.data);
              this.pagination= respuesta.data.pagination;
          });
        },
        changePage: function(page) 
        {
         page= this.pagination.current_page;
         this.getEvents(page);
        },
       }
}
</script>