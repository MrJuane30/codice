<template>
    <div id="fondoNav" class="mt-2">
        <nav class="navbar  d-flex flex-colum flex-md-row container justify-content-center mt-5 fondoN">
          <router-link :to="{name: 'documentos', params: {categoria: 'documentos'}}">
               <a> Documentos </a>
          </router-link>
          <router-link :to="{name: 'infografias', params: {categoria: 'infografias'}}">
               <a> Infografías </a>
          </router-link>
           <router-link :to="{name: 'videos', params: {categoria: 'videos'}}">
               <a> Vídeos </a>
          </router-link>
        </nav>
    </div>
</template>

<script>
export default {
   
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