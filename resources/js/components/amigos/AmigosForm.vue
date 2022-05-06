<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container">
            <h2 class="text-center mt-5 text-success titulo">coDi-Amigos</h2>
            <carousel-amigos></carousel-amigos>
            <advertise></advertise>
            <modelos></modelos>
            <h3 class="text-center">Llena este formulario y nosotros te contactaremos</h3>
            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(send)" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label"
                            >Nombre</label
                        >
                        <div class="col-md-4">
                            <ValidationProvider
                                name="name"
                                rules="required"
                                v-slot="{ errors }"
                            >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    v-model="name"
                                />
                                <small>{{ errors[0] }}</small>
                            </ValidationProvider>
                        </div>
                        <label for="lastname" class="col-md-2 col-form-label"
                            >Apellidos</label
                        >
                        <div class="col-md-4">
                            <ValidationProvider
                                name="lastname"
                                rules="required"
                                v-slot="{ errors }"
                            >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="lastname"
                                    name="lastname"
                                    placeholder=""
                                    v-model="lastname"
                                />
                                <small>{{ errors[0] }}</small>
                            </ValidationProvider>
                        </div>
                    </div>
                       <div class="form-group row">
                                <label
                                    for="staticEmail"
                                    class="col-md-2 col-form-label"
                                    >Email</label
                                >
                                <div class="col-md-4">
                                    <ValidationProvider
                                        name="correo"
                                        rules="required|email"
                                        v-slot="{ errors }"
                                    >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="correo"
                                            name="correo"
                                            v-model="correo"
                                        />
                                        <small>{{ errors[0] }}</small>
                                    </ValidationProvider>
                                </div>
                                <label
                                    for="numero"
                                    class="col-md-2 col-form-label"
                                    >Celular</label
                                >
                                <div class="col-md-4">
                                    <ValidationProvider
                                        name="numero"
                                        rules="digits:10"
                                        v-slot="{ errors }"
                                    >
                                           <input
                                            type="text"
                                            class="form-control"
                                            id="numero"
                                            name="numero"
                                            v-model="numero"
                                        />
                                        <small>{{ errors[0] }}</small>
                                    </ValidationProvider>
                                </div>
                            </div>
                        <div class="form-group row">
                              <div class="col-md-4 text-center">
                            <ValidationProvider
                                name="recaptcha2"
                                rules="required"
                                v-slot="{ errors }"
                            >
                                <vue-recaptcha
                                    :load-recaptcha-script="true"
                                    sitekey="6LfvOyIbAAAAAJhn5YpiyMkhxXKTuJi7cH1tyiWr"
                                    @verify="mxVerify"
                                    v-model="recaptcha"
                                ></vue-recaptcha>
                                <small>{{ errors[0] }}</small>
                            </ValidationProvider>
                        </div>
                         <label for="rol" class="col-md-2 col-form-label text-md-right">Tipo de amigo</label>
                                <div class="col-md-6">
                                <ValidationProvider
                                name="tipo"
                                rules="required"
                                v-slot="{ errors }"
                                >
                                <select 
                                v-model="tipo"
                                class="form-control"
                                id="tipo"
                                >
                                <option disabled selected>Selecciona una opción</option>
                                <option value="plata">Amigo Plata</option>
                                <option value="diamante">Amigo Diamante</option>
                                </select>
                                <small>{{ errors[0] }}</small>
                                </ValidationProvider>
                              </div>
                        </div>
                         <div class="form-group row">
                        <div class="col-md text-center">
                            <button type="submit" class="btn btn-primary mb-2">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </ValidationObserver>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import NavbarComponent from "../NavbarComponent";
import FooterComponent from "../FooterComponent";
import VueRecaptcha from "vue-recaptcha";
import carouselAmigos from "./CarouselAmigos.vue";
import advertise from "./Advertise.vue";
import modelos from "./modelos.vue";
import { ValidationObserver, ValidationProvider, extend } from "vee-validate";
import { required, email, alpha, digits, regex } from "vee-validate/dist/rules";
extend("required", {
    ...required,
    message: "Este campo es requerido."
});

extend("email", {
    ...email,
    message: "Este campo debe ser de tipo email."
});

extend("regex", {
    ...regex,
    message: "Este campo solo admite valores númericos"
});

extend("digits", {
    ...digits,
    message: "Este campo no puede tener más de diez dígitos"
});
export default {
    components: {
        NavbarComponent,
        FooterComponent,
        carouselAmigos,
        ValidationProvider,
        ValidationObserver,
        VueRecaptcha,
        advertise,
        modelos
    },
     data() {
        return {
            recaptcha: null,
            name: null,
            lastname: null,
            correo: null,
            numero: null,
            tipo:null
        };
    },
    methods: {
        mxVerify(response) {
            this.recaptcha = response;
        },clearForm() {
            this.name = null;
            this.lastname = null;
            this.correo = null;
             this.numero = null;
            this.tipo = null;
            grecaptcha.reset();
        },
        showMessage(message) {
            this.$swal({
                icon: "success",
                title: message,
                text: "Espera nuestra respuesta"
            });
        },
        send() {
             var currentObj = this;
            axios
                .post("/api/codiamigo", {
                    name: this.name,
                    lastname: this.lastname,
                    correo: this.correo,
                    numero: this.numero,
                    tipo: this.tipo,
                    recaptcha: this.recaptcha
                })
                .then(response => {
                    this.clearForm();
                    currentObj = response.data;
                    this.showMessage(currentObj["Mensaje"]);
                })
                .catch(function(error) {
                    currentObj.output = error;
                });
        }
    }
};
</script>
