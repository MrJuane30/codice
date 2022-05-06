<template>
        <div class="row">
        <div class="col-md-8" v-if="isAuth">
            <h3 class="text-center">Escribe tu comentario</h3>
            <div class="form-group">
                <ValidationObserver v-slot="{handleSubmit}">
                <form
        	    @submit.prevent="handleSubmit(comentar)"
			        method="post"
                >
               <ValidationProvider name="contenido" rules="required" v-slot="{ errors }">
                    <textarea name="contenido" class="form-control" rows="8" id="contenido" v-model="contenido"></textarea>
                      <small>{{errors[0]}}</small>
                </ValidationProvider>
                <div class="form-group row">
                  <div class="col-md text-center">
                  <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                </div>
            </div>
            </form>
        </ValidationObserver>
            </div>   
        </div>
        <div class="col-md-8" v-else>
            <vue-particles 
      color="#dedede"
       :particleOpacity="0.7"
        :particlesNumber="40"
        shapeType="star"
        :particleSize="4"
        linesColor="#dedede"
        :lineLinked="false"></vue-particles>
        <div class="centered-text2">
        <h2 class="titulo2 text-danger">¿Quieres dejar un comentario?</h2>
        <p  class="subtitle2">
            Inicia sesión o registrate para dejar tu comentario.
        </p> 
        <div class="col-md text-center">
            <a class="btn btn-dark btn-lg" href="http://127.0.0.1:8000/login">Iniciar sesión</a>
        </div>
         </div>
        </div>
    </div>
</template>

<script>
import { ValidationObserver, ValidationProvider, extend  } from 'vee-validate';
import { required} from 'vee-validate/dist/rules';
let user= document.head.querySelector('meta[name=user]');

extend('required', {
  ...required,
  message: 'Este campo es requerido!'
});
export default {
        props: ['publicacionId', 'userId'], 

    components: { 
          ValidationProvider,
          ValidationObserver    
      },
       data(){
       return {
        contenido: null,
        }
       },    
       methods: {
          ressetForm(){
            this.contenido= null;
        },
           comentar(){
              var currentObj = this;
               axios.post('/api/create-comment', {
                    contenido: this.contenido,
                    idUser: this.user.id,
                    idPublicacion: this.publicacionId
                })
                .then((response) => {
                  this.ressetForm();
                })
                .catch(function (error) {
                  alert("Error");
                });
           }
       },
       computed: {
            user(){
            
             return JSON.parse(user.content);
        },
         isAuth(){
            return !! user.content;
        }
       }
}
</script>

<style lang="scss">
 
    .titulo2 {
      color: #050000;
      font-size: 5rem;
      font-family: 'Teko', sans-serif;
      text-shadow: 8px 8px #12081f;
      margin: 0;
      
      @media (max-width: 767px) {
        font-size: 1rem;
      }
    }
    p.subtitle2 {
      font-size: 1.7rem;
      color: #f7f7f7;
      margin: 0;
      @media (max-width: 767px) {
        font-size: .6rem;
      }
    }
      
.centered-text2 {
  position: absolute;
  text-align: center;
  top: 25%;
  width: 100%;
   @media (max-width: 767px) {
        top: 15%;
      }
}



</style>