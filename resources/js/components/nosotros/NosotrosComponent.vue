<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container">
          <h2 class="text-center mt-5  text-primary titulo">Nosotros</h2>
          <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" v-for="miembro in this.miembros" v-bind:key="miembro.id">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img :src="`storage/${miembro.imagen}`" class="img-fluid" />
                                <a href="#!">
                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                         <div class="card-body">
                         <h5 class="card-title">{{miembro.nombre +" "+ miembro.apellidos}}</h5>
                        <router-link :to="{name: 'miembro', params: {id: miembro.id}}">
                             <a class="btn btn-primary d-block">Leer más</a>
                        </router-link>         
                    </div>
                </div>
          </div>
        </div>
          <services-carousel></services-carousel>
      </div>
        <footer-component></footer-component>
  </div>
</template>

<script> 
import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
import servicesCarousel from'../carousel/servicesCarousel'


   export default {
      components: { 
          NavbarComponent,
          FooterComponent,
          servicesCarousel
      },
       mounted(){
          axios.get('/api/miembros')
          .then(respuesta=> {
              this.$store.commit("AGREGAR_MIEMBROS", respuesta.data);
          });
      },
      computed: {
          miembros(){
              return this.$store.state.miembros;
          }
      }
    }
</script>
<style lang="scss">
.titulo {
      color: #050000;
      font-size: 7rem;
      font-family: 'Teko', sans-serif;
      text-shadow: 8px 8px #12081f;
      margin: 0;
      @media (max-width: 767px) {
        font-size: 3rem;
      }
    }
</style>

