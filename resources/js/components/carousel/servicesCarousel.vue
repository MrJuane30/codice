<template>
    <div class="container mt-5">
        <carousel :autoplay="true">
            <slide v-for="servicio in this.servicios" v-bind:key="servicio.id">
            <div class="card">
              <img class="card-img-top" v-if="servicio.imagen_principal" :src="`storage/${servicio.imagen_principal}`" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{servicio.nombre}}</h5>
                  <p class="card-text">{{servicio.descripcion}}</p>
                  <div class="col-md text-center">
                  <router-link to="/servicios">
                     <a class="btn btn-outline-primary btn-lg">Ver más</a>
                  </router-link>
                </div>
              </div>
            </div>           
           </slide>
    </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
   components: {
       Carousel,
       Slide
   },
   data () {
        return {
            list: [],
            timer: ''
        }
   },
   mounted(){
        
   },
   created(){
           this.fetchEventsList();
      },
      methods: {
          fetchEventsList(){
              axios.get('/api/services')
          .then(respuesta=> {
              this.$store.commit("AGREGAR_SERVICIOS", respuesta.data);
          });
          vm.$forceUpdate();
          }
      },
      computed: {
          servicios(){
              return this.$store.state.servicios;
          }
      }
}
</script>