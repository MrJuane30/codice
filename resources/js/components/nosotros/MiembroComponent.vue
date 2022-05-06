<template>
<div>
        <navbar-component></navbar-component>
    <div class="container p-5">
    <h2 class="text-center mt-5 titulo text-primary">{{miembro.nombre + " "+  miembro.apellidos}}</h2>
    <div class="row align-items-start">
        <div class="col-md-12">
            <img :src="`storage/${miembro.imagen}`" style="width: 100%"  v-if="Object.keys(miembro).length">
            <div class="container text-justify">
            <h3 class="text-center" v-if="miembro.intereses"> Intereses: </h3>
            <p  v-if="miembro.intereses" style="" v-html="miembro.intereses"></p>
             <!--`{{publicacion.contenido.substr(5,publicacion.contenido.length-11)}}` -->
             <h3 class="text-center">Curriculum:</h3>
             <div v-html="miembro.curriculum">
             </div>
            <h3 class="text-center" v-if="miembro.gustos">¿Qué me gusta?</h3>
            <div v-if="miembro.gustos" v-html="miembro.gustos"></div>
            </div>
        </div>

    </div>
    
    </div>
        <footer-component
        ></footer-component>

</div>
</template>

<script>
import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
export default {
    components:{ 
        NavbarComponent,
          FooterComponent
    },
    data(){
        return {
            miembro: {}
        }
    },
    mounted(){
    const {id}= this.$route.params;
      axios.get('/api/miembros/' + id)
      .then(r =>{
        this.$store.commit('AGREGAR_MIEMBRO', r.data);
        this.miembro= r.data;
      });
  },
computed: {
       membrer(){
            return this.$store.getters.obtenerMiembro;      
     },
}

}
</script>

