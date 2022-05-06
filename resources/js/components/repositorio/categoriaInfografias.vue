<template>
    <div>
        <navbar-component></navbar-component>
        <listado-repositorio></listado-repositorio>
        <div class="container">
            <h2 class="mt-2 mb-2 text-center titulo text-warning">{{this.$route.params.categoria.toUpperCase()}}</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" v-for="documento in this.documentos" v-bind:key="documento.id">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img :src="`storage/${documento.url}`" class="img-fluid" style="height: 80vh;"/>
                                <a href="#!">
                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                         <div class="card-body">
                         <h5 class="card-title">{{documento.titulo}}</h5>
                            <p class="card-text">
                            {{documento.descripcion}}
                            </p>
                             <a class="btn btn-primary d-block" @click="readFile(documento.url)">Ver</a>
                     </div>
                </div>
          </div>
     </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
import listadoRepositorio from './RepositorioCategorias.vue'
export default {
    components: {
      NavbarComponent,
      FooterComponent,
      listadoRepositorio
  },

   mounted(){
    const {categoria}= this.$route.params;
      axios.get('/api/repositorio/' + categoria)
      .then(respuesta =>{
          console.log(respuesta);
        this.$store.commit('AGREGAR_DOCUMENTOS', respuesta.data);
      });
  },
  methods:{
      readFile(documento) {
           
                 window.open("storage/"+ documento, '_blank') //to open in new tab   
         },
  },
  computed: {
          documentos(){
              return this.$store.getters.obtenerDocumentos;
          }
      }
}
</script>