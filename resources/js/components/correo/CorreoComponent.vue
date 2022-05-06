<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container">
            <h2 class="text-center mt-5 text-success titulo">Contáctanos</h2>
            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(enviar)" method="post">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-2 col-form-label"
                            >Email</label
                        >
                        <div class="col-md-4">
                            <ValidationProvider
                                name="email"
                                rules="required|email"
                                v-slot="{ errors }"
                            >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    v-model="email"
                                />
                                <small>{{ errors[0] }}</small>
                            </ValidationProvider>
                        </div>
                        <label
                            for="inputPassword"
                            class="col-md-2 col-form-label"
                            >Asunto</label
                        >
                        <div class="col-md-4">
                            <ValidationProvider
                                name="asunto"
                                rules="required|alpha|min:4"
                                v-slot="{ errors }"
                            >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="asunto"
                                    name="asunto"
                                    placeholder=""
                                    v-model="asunto"
                                />
                                <small>{{ errors[0] }}</small>
                            </ValidationProvider>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-2 col-form-label"
                            >Mensaje</label
                        >
                        <div class="col-md-12">
                            <ValidationProvider
                                name="mensaje"
                                rules="required|min:10"
                                v-slot="{ errors }"
                            >
                                <textarea
                                    name="mensaje"
                                    class="form-control"
                                    rows="15"
                                    id="mensaje"
                                    v-model="mensaje"
                                ></textarea>
                                <small>{{ errors[0] }}</small>
                            </ValidationProvider>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <ValidationProvider
                                name="recaptcha"
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
import { ValidationObserver, ValidationProvider, extend } from "vee-validate";
import { required, email, alpha, min } from "vee-validate/dist/rules";

extend("required", {
    ...required,
    message: "Este campo es requerido."
});

extend("email", {
    ...email,
    message: "Este campo debe ser de tipo email."
});

extend("alpha", {
    ...alpha,
    message: "Este campo solo admite caracteres"
});

extend("min", {
    ...min,
    message: "Este campo debe contener más caracteres."
});

export default {
    components: {
        VueRecaptcha,
        NavbarComponent,
        FooterComponent,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            recaptcha: null,
            email: null,
            asunto: null,
            mensaje: null
        };
    },
    methods: {
        mxVerify(response) {
            this.recaptcha = response;
        },
        ressetForm() {
            this.email = null;
            this.asunto = null;
            this.mensaje = null;
            grecaptcha.reset();
        },
        showAlert(message) {
            this.$swal({
                icon: "success",
                title: message,
                text: "Espera nuestra respuesta"
            });
        },
        enviar() {
            var currentObj = this;
            axios
                .post("/api/send-email", {
                    email: this.email,
                    asunto: this.asunto,
                    mensaje: this.mensaje,
                    recaptcha: this.recaptcha
                })
                .then(response => {
                    this.ressetForm();
                    currentObj = response.data;
                    this.showAlert(currentObj["Mensaje"]);
                })
                .catch(function(error) {
                    currentObj.output = error;
                });
        }
    }
};
</script>
