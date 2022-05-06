<template>
    <main class="border ">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        <h2 class="mb-5 text-primary titulo"><strong>Publicaciones recientes</strong></h2>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4" v-for="publicacion in this.publicaciones" v-bind:key="publicacion.id">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img :src="`storage/${publicacion.imagen}`" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{publicacion.titulo}}</h5>
                <p class="card-text" v-html="publicacion.descripcion">
                </p>
               <router-link :to="{name: 'publicacion', params: {id: publicacion.id}}">
                             <a class="btn btn-primary d-block">Leer más</a>
                </router-link>    
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->
      <div class="col-md text-center">
      <router-link to="/blog">
          <a class="btn bg-success btn-lg">Ver más</a>
      </router-link>
      </div>
    </div>
  </main>
</template>

<script>
export default {
      components: {    
          
      },
      data(){
        return {
          publicaciones:[]
        }
      },
      created() {
         axios.get('/api/publicacionesPrincipal')
            .then(respuesta => {
              this.publicaciones= respuesta.data;
              console.log(this.publicaciones);
            });
      },
     
}
</script>

<style style lang="scss">
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
