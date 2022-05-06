<template>
    <div class="container mt-5">
        <carousel :autoplay="true">
            <slide  v-for="amigo in this.amigos" v-bind:key="amigo.id">
            <div class="card"  v-if="amigo.foto">
              <img class="card-img-top" v-if="amigo.foto" :src="`storage/${amigo.foto}`" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">{{amigo.nombre}}</h5>
                  <p class="card-text text-center">{{amigo.comentario}}</p>
                  <div class="col-md text-center">
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
   mounted(){
          axios.get('/api/amigos')
          .then(respuesta=> {
              this.$store.commit("AGREGAR_AMIGOS", respuesta.data);
          });
      },
      computed: {
          amigos(){
              return this.$store.state.amigos;
          }
      }
}
</script>