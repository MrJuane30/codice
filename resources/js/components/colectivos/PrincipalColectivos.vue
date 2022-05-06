<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container-fluid">
            <mapa-general></mapa-general>
            <h2 class="text-center mt-5  titulo">Colectivos</h2>
            <div class="row">
                <div class="col-md-4" v-for="colectivo in this.colectivos" v-bind:key="colectivo.id">
                 <div class="card my-2">
                     <img class="card-img-top mx-auto d-block " :src="`storage/${colectivo.imagen_principal}`" alt="" style="width: 75%; height:100%;">
                     <h3 class="card-title text-primary font-weight-bold text-center">{{colectivo.nombre}}</h3>
                        <p class="card-text">{{colectivo.descripcion.substr(0,150).concat('...')}}</p>

                        <router-link :to="{name: 'colectivo', params: {id: colectivo.id}}">
                             <a href="" class="btn btn-primary d-block">Ver Colectivo</a>
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
import MapaGeneral from './MapaGeneral';

export default {
   components: { 
          NavbarComponent,
          FooterComponent,
          MapaGeneral
      },
      mounted(){
          axios.get('/api/colectivos')
          .then(respuesta=> {
              this.$store.commit("AGREGAR_COLECTIVOS", respuesta.data);
          });
      },
      computed: {
          colectivos(){
              return this.$store.state.colectivos;
          }
      }
}
</script>