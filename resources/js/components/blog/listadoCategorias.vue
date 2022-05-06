<template>
    <div id="fondoNav" class="mt-2">
        <nav class="navbar  d-flex flex-colum flex-md-row container justify-content-center mt-5 fondoN">
          <router-link :to="{name: 'avisos', params: {categoria: 'avisos'}}">
               <a> Avisos </a>
          </router-link>
          <router-link :to="{name: 'ciencia', params: {categoria: 'ciencia'}}">
               <a> Ciencia </a>
          </router-link>
           <router-link :to="{name: 'educacion', params: {categoria: 'educacion'}}">
               <a> Educación </a>
          </router-link>
           <router-link :to="{name: 'opinion', params: {categoria: 'opinion'}}">
               <a> Opinión </a>
          </router-link>
           <router-link :to="{name: 'noticias', params: {categoria: 'noticias'}}">
               <a> Noticias </a>
          </router-link>
        </nav>
    </div>
</template>

<script>
export default {
    created() {
        axios.get('/api/categorias')
            .then(respuesta => {
                this.$store.commit('AGREGAR_CATEGORIAS', respuesta.data);
            });
    },
    computed: {
        categorias(){
            return this.$store.getters.obtenerCategorias;
        }
    }
    }
</script>

<style scoped>
#fondoNav {
  background-color: #2a2e4d;
}
.fondoN a {
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  padding: 0.5rem 2rem;
  text-align: center;
  flex: 1;
}

</style>