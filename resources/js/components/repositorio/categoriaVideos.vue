<template>
    <div>
        <navbar-component></navbar-component>
        <listado-repositorio></listado-repositorio>
        <div class="container">
            <h2 class="mt-2 mb-2 text-center titulo text-warning">{{this.$route.params.categoria.toUpperCase()}}</h2>
           <div class="row mb-6">
                <div class="col-md-6 mb-2" v-for="documento in this.documentos" v-bind:key="documento.id">
                    <div class="card w-75">
                        <div class="card-body">
                            <h5 class="card-title">{{documento.titulo}}</h5>
                            <p class="card-text">
                              {{documento.descripcion}}
                            </p>
                            <a class="btn btn-primary" @click="redirect(documento.url)">Ver</a>
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
         redirect(documento){
                    window.open(documento, '_blank') //to open in new tab            
    },
  },

  computed: {
          documentos(){
              return this.$store.getters.obtenerDocumentos;
          }
      }
}
</script>