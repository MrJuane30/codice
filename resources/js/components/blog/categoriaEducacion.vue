<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container">
            <listado-categorias></listado-categorias>
            <h2 class="mt-2 mb-2 text-center titulo text-warning">{{this.$route.params.categoria.toUpperCase()}}</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" v-for="publicacion in this.publicaciones" v-bind:key="publicacion.id">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img :src="`storage/${publicacion.imagen}`" class="img-fluid" />
                                <a href="#!">
                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                         <div class="card-body">
                         <h5 class="card-title">{{publicacion.titulo}}</h5>
                            <p class="card-text">
                            {{publicacion.descripcion.substr(5,publicacion.descripcion.length-11)}}
                            </p>
                        <router-link :to="{name: 'publicacion', params: {id: publicacion.id}}">
                             <a class="btn btn-primary d-block">Leer más</a>
                        </router-link>         
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
import listadoCategorias from './listadoCategorias'
export default {
    components: {
      NavbarComponent,
      FooterComponent,
      listadoCategorias
  },

   mounted(){
       this.publicaciones.length=0;
    const {categoria}= this.$route.params;
      axios.get('/api/categorias/' + categoria)
      .then(respuesta =>{
          console.log(respuesta);
        this.$store.commit('AGREGAR_CATEGORIA', respuesta.data);
      });
  },

  computed: {
          publicaciones(){
              return this.$store.state.categoria;
          }
      }
}
</script>