<template>
    <div>
        <navbar-component></navbar-component>
        <listado-categorias></listado-categorias>
        <div class="container">
            <h2 class="mt-2 mb-2 text-center titulo text-warning">Blog</h2>
            <jump-servicios></jump-servicios>
            <recientes></recientes>
            <div class="row g-5">
                <div class="col-md-8">
                    <article class="blog-post">
                        <h2 class="blog-post-title">
                            Nuestra historia
                        </h2>
                        <p class="blog-post-meta">
                            25 mayo 2021
                        </p>
                        <p class="text-justify">
                            CoDiCE surge de la colaboración de expertos en las
                            distintas ramas del conocimiento, el cual se forma a
                            partir del Curso de Divulgación Oral de la Ciencia
                            organizado por la Direcciónde Comunicación de la
                            Ciencia de la Universidad Veracruzana, impartido por
                            el M. en C. José Manuel Posada de la Concha, en el
                            cual los integrantes unen sus habilidiades e
                            intereses con el único objetivo de divulgar la
                            ciencia a la población de Xalapa y la región.
                            Nuestra misión es promover, divulgar, comunicar la
                            ciencia y fomentar la cultura científica a
                            diferentes sectores de la población en Xalapa y
                            lugares aldeñados. El Colectivo de Divulgación de la
                            Ciencia y la Educación, CoDiCE está integrado por 5
                            especialistas en diferentes áreas como: química,
                            matemáticas, biología, ingeniería y nutrición.
                            Además, contamos con 2 personas de apoyo en áreas
                            como administración y mercadotecnia.
                        </p>
                    </article>
                </div>
                <div class="col-md-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="p-4 mb-3 bg-light rounded">
                            <h4 class="font-italic">
                                CoDiCE
                            </h4>
                            <p class="mb-0">
                                Colectivo de la divulgación de la ciencia y la eduación.
                            </p>
                        </div>
                        <div class="p-4">
                            <h4 class="font-italic">
                                Categorias
                            </h4>
                            <ol class="list-unstyled mb-0">
                                <li>
                                    <router-link
                                        :to="{
                                            name: 'avisos',
                                            params: { categoria: 'avisos' }
                                        }"
                                    >
                                        <a> Avisos </a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link
                                        :to="{
                                            name: 'ciencia',
                                            params: { categoria: 'ciencia' }
                                        }"
                                    >
                                        <a> Ciencia </a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link
                                        :to="{
                                            name: 'educacion',
                                            params: { categoria: 'educacion' }
                                        }"
                                    >
                                        <a> Educación </a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link
                                        :to="{
                                            name: 'opinion',
                                            params: { categoria: 'opinion' }
                                        }"
                                    >
                                        <a> Opinión </a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link
                                        :to="{
                                            name: 'noticias',
                                            params: { categoria: 'noticias' }
                                        }"
                                    >
                                        <a> Noticias </a>
                                    </router-link>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import NavbarComponent from "../NavbarComponent";
import FooterComponent from "../FooterComponent";
import listadoCategorias from "./listadoCategorias";
import recientes from "./recientes";
import jumpServicios from "./jumbuttronServicios";
export default {
    components: {
        NavbarComponent,
        FooterComponent,
        listadoCategorias,
        recientes,
        jumpServicios
    }
};
</script>

<style lang="scss">
.blog-post {
    margin-bottom: 4rem;
}
.blog-post-title {
    margin-bottom: 0.25rem;
    font-size: 2.5rem;
}
.blog-post-meta {
    margin-bottom: 1.25rem;
    color: #727272;
}
</style>
