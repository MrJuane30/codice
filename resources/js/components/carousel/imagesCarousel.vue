<template>
    <carousel :autoplay="true">
        <slide v-for="imagen in imagenes" v-bind:key="imagen.id">
            <div class="col-md" >
             <img class="img-fluid" :src="`storage/${imagen.ruta_imagen}`" alt="Card image cap">
            </div>
        </slide>
    </carousel>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
    props:['servicioUuid'],
   components: {
       Carousel,
       Slide
   },
    data(){
        return {
            images: []
        }
    },
   created(){
          this.consultarImagenes();
      },
      methods: {
          consultarImagenes(){
                      const { id } = this.$route.params;
              axios.get('/api/imagenes/' + this.servicioUuid)
          .then(respuesta=> {
              this.images=respuesta.data;
              this.$store.commit("AGREGAR_IMAGENES", respuesta.data);
          });
        }
      },
      computed: {
          imagenes(){
              return this.$store.getters.obtenerImagenes;
          }
      }
}
</script>