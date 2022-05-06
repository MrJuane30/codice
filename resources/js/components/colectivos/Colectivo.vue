<template>
<div>
        <navbar-component></navbar-component>
    <div class="container p-5">
    <h2 class="text-center mt-5">{{colectivo.nombre}}</h2>
    <div class="row align-items-start">
        <div class="col-md-8">
            <img :src="`storage/${colectivo.imagen_principal}`" style="width: 700px">
            <div class="container">
            <p class="mt-5 text-justify">{{colectivo.descripcion}}</p>

            </div>
        </div>
        <aside class="col-md-4">
            <div>
            <mapa-ubicacion></mapa-ubicacion>
            </div>
            <div class="bg-primary p-4">
                 <h2 class="text-center text-white mt-2 mb-4">Acerca del colectivo</h2>
            <p class="text-white mt-1">
                <span class="font-weight-bold">
                   La dirección del colectivo es:
                </span>
                {{colectivo.direccion}}
            </p>
            <p class="text-white mt-1">
                <span class="font-weight-bold">
                   La colonia del colectivo es:
                </span>
                {{colectivo.colonia}}
            </p>
            <p class="text-white mt-1">
                <span class="font-weight-bold">
                   La pagina del colectivo es:
                </span>
                <a class="text-light" :href="`{{colectivo.direccion}}`">{{colectivo.pagina_web}}</a>
            </p>
         
            
            </div>
        </aside>
    </div>
</div>
        <footer-component></footer-component>

</div>
</template>

<script>
import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
import MapaUbicacion from './MapaColectivo.vue';

export default {
    components:{ 
        NavbarComponent,
          FooterComponent,
          MapaUbicacion
    },
     mounted(){
    const {id}= this.$route.params;
    console.log(id);
      axios.get('/api/colectivos/' + id)
      .then(respuesta =>{
          console.log(respuesta);
        this.$store.commit('AGREGAR_COLECTIVO', respuesta.data);
      });
  },
computed: {
       colectivo(){
            return this.$store.state.colectivo;      
     }
   },

}
</script>