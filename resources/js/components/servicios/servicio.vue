<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container py-5">
            <h2 class="text-center titulo text-danger">{{ taller.nombre }}</h2>
            <div class="row">
                <div class="col-md-8">
                    <img
                        class="img-fluid mb-2"
                        :src="`storage/${taller.imagen_principal}`"
                        alt="Card image cap"
                    />
                    <p
                        class="text-center font-italic font-weight-bold"
                        style="font-size: 1.5rem"
                    >
                        {{ taller.descripcion }}
                    </p>
                    <carousel :autoplay="true">
                        <slide
                            v-for="imagen in imagenes"
                            v-bind:key="imagen.id"
                        >
                            <div class="col-md">
                                <img
                                    class="img-fluid"
                                    :src="`storage/${imagen.ruta_imagen}`"
                                    alt="Card image cap"
                                />
                            </div>
                        </slide>
                    </carousel>
                </div>
                <aside class="col-md-4">
                    <div class="bg-dark p-2">
                        <h3 class="text-center text-center text-light mb-2">
                            Más informes
                        </h3>
                        <div class="col-md text-center">
                            <a class="btn btn-success" @click="servicioContact"
                                >Ir a whatsapp</a
                            >
                        </div>
                    </div>
                    <anuncio-dos></anuncio-dos>
                </aside>
            </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import NavbarComponent from "../NavbarComponent";
import FooterComponent from "../FooterComponent";
import anuncioDos from "../blog/anuncioDos";
import imagesCarousel from "../carousel/imagesCarousel";
import { Carousel, Slide } from "vue-carousel";

export default {
    setup() {},
    components: {
        NavbarComponent,
        FooterComponent,
        anuncioDos,
        imagesCarousel,
        Carousel,
        Slide
    },
    data() {
        return {
            IMG: []
        };
    },
    mounted() {
        const { id } = this.$route.params;
        axios.get("/api/talleres/" + id).then(r => {
            this.$store.commit("AGREGAR_TALLER", r.data);
            console.log(r);
        });
    },
    created() {},
    methods: {
        servicioContact() {
            let user = document.head.querySelector("meta[name=user]");
            if (user.content) {
                alert("redireccionado a whatsapp");
            } else {
                window.location = "/register";
            }
        }
    },
    computed: {
        taller() {
            return this.$store.getters.obtenerTaller;
        },
        imagenes() {
            return this.$store.getters.obtenerIMGS;
        }
    }
};
</script>
