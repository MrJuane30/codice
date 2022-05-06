<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container p-5">
            <h2 class="text-center titulo text-success" data-aos="fade-down-right">Talleres</h2>
        <div class="row mt-5" data-aos="fade-left" v-for="taller in this.talleres" v-bind:key="taller.id">
          <div class="col-md-6" >
            <img class="img-fluid" v-if="taller.imagen_principal" :src="`storage/${taller.imagen_principal}`" alt="Card image cap">
          </div>
          <div class="col-md-6">
            <h3 class="text-center">{{taller.nombre}}</h3>
            <p class="text-center text-italic">{{taller.descripcion}}</p>
            <div class="col-md text-center">
                  <router-link :to="{name: 'servicio', params: {id: taller.id}}">
                     <a class="btn btn-outline-success btn-lg">Ver más</a>
                  </router-link>
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
import imagesCarousel from '../carousel/imagesCarousel'
import { Carousel, Slide } from 'vue-carousel';

export default {

    components: {
        NavbarComponent,
        FooterComponent,
        imagesCarousel,
        Carousel,
        Slide
     },
      mounted(){
          axios.get('/api/talleres')
          .then(respuesta=> {
              this.$store.commit("AGREGAR_TALLERES", respuesta.data);
          });
      },
      computed: {
          talleres(){
              return this.$store.state.talleres;
          }
      }
}
</script>