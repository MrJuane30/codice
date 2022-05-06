<template>
<div>
        <navbar-component></navbar-component>
    <div class="container p-5">
    <h2 class="text-center mt-5 titulo text-primary">{{publicacion.titulo}}</h2>
    <div class="row align-items-start">
        <div class="col-md-8">
            <img :src="`storage/${publicacion.imagen}`" style="width: 100%"  v-if="Object.keys(publicacion).length">
            <div class="container text-justify">
             <div class="row">
                 <div class="col-md-4">
                       <p class="text-left mt-2 font-weight-bold">Autor <i class="far fa-user"></i> : {{publicacion.autor}}</p>
                 </div>
                 <div class="col-md-4">
                     <like-button
                     :publicacion-id="publicacion.id" v-if="Object.keys(publicacion).length"></like-button>
                 </div>
                 <div class="col-md-4">
                     <p class="text-right mt-2 font-weight-bold">Fecha <i class="fas fa-calendar-week"></i> : {{publicacion.fecha}}</p>
                 </div>
            </div>
            <p class="font-italic text-center" style="font-size: 1.5rem" v-html="publicacion.descripcion"></p>
             <!--`{{publicacion.contenido.substr(5,publicacion.contenido.length-11)}}` -->
             <div v-html="publicacion.contenido">
             </div>
            <p class="mb-2 font-weight-bold" v-if="publicacion.fuentes">Fuentes:</p>
            <p class="mb-2 font-weight-bold" v-if="publicacion.fuentes" v-html="publicacion.fuentes">Fuentes:</p>
            </div>
        </div>
        <aside class="col-md-4">
            <anuncio-uno></anuncio-uno>
            <anuncio-dos></anuncio-dos>
        </aside>
    </div>
    <comentario-show
    :publicacionId="publicacion.id" v-if="Object.keys(publicacion).length"></comentario-show>
    <comentarios-form
    :publicacionId="publicacion.id"></comentarios-form>
    </div>
        <footer-component
        ></footer-component>

</div>
</template>

<script>
import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
import ComentariosForm from './comentariosForm.vue'
import ComentarioShow from './comentarioShow.vue'
import anuncioUno from './anuncioUno.vue'
import anuncioDos from './anuncioDos.vue'
import anuncioTres from './anuncioTres.vue'
import LikeButton from './likeButton.vue'
export default {
    components:{ 
        NavbarComponent,
          FooterComponent,
          ComentariosForm,
          ComentarioShow,
          anuncioUno,
          anuncioDos,
        LikeButton,
    },
    mounted(){
    const {id}= this.$route.params;
      axios.get('/api/publicaciones/' + id)
      .then(r =>{
        this.$store.commit('AGREGAR_PUBLICACION', r.data);
      });
  },
computed: {
       publicacion(){
            return this.$store.getters.obtenerPublicacion;      
     },
   },

}
</script>

