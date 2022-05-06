<template>
    <div>
        <navbar-component></navbar-component>
        <vue-particles
            color="#dedede"
            :particleOpacity="0.7"
            :particlesNumber="40"
            shapeType="star"
            :particleSize="4"
            linesColor="#dedede"
            :lineLinked="false"
        ></vue-particles>
        <div class="centered-text">
            <h2 class="titulo text-danger">CoDiCE</h2>
            <p class="subtitle">
                Colectivo de Divulgación de la Ciencia y Educación
            </p>
            <small class="text-light">¿Te gustaría ser nuestro amigo?</small>
            <div class="text-center">
                <router-link to="/amigos">
                    <a class="btn btn-dark btn-lg">CoDi-amigo</a>
                </router-link>
            </div>
        </div>
        <main-component></main-component>
        <blog-component></blog-component>
        <colectivos-component></colectivos-component>
        <footer-component></footer-component>
    </div>
</template>
<script>
import BlogComponent from "./BlogComponent";
import MainComponent from "./MainComponent";
import NavbarComponent from "./NavbarComponent";
import FooterComponent from "./FooterComponent.vue";
import ColectivosComponent from "./ColectivosComponent.vue";

export default {
    components: {
        BlogComponent,
        MainComponent,
        NavbarComponent,
        FooterComponent,
        ColectivosComponent
    }
};
</script>
<style lang="scss">
#particles-js {
    height: 100%;
    background-image: url("../assets/sky.jpg");
    background-size: cover;
    padding: 10%;
}
.titulo {
    color: #050000;
    font-size: 7rem;
    font-family: "Teko", sans-serif;
    text-shadow: 8px 8px #12081f;
    margin: 0;

    @media (max-width: 767px) {
        font-size: 3rem;
    }
}
p.subtitle {
    font-size: 1.7rem;
    color: #f7f7f7;
    margin: 0;
    @media (max-width: 767px) {
        font-size: 1rem;
    }
}

.centered-text {
    position: absolute;
    text-align: center;
    top: 50%;
    width: 100%;
    @media (max-width: 767px) {
        top: 25%;
    }
}
</style>
