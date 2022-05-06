<template>
    <div>
        <navbar-component></navbar-component>
        <listado-repositorio></listado-repositorio>
        <div class="container">
            <h2 class="mt-2 mb-2 text-center titulo text-warning">Repositorio</h2>
            <div class="row g-5">
                <div class="col-md-8">
                    <article class="blog-post">
                        <h2 class="blog-post-title">
                            ¿Por qué un repositorio?
                        </h2>
                        <p class="blog-post-meta">
                            25 mayo 2021
                        </p>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, dicta laudantium dignissimos quam ab velit eos quia quae suscipit itaque, voluptatem totam voluptate aspernatur. Iure facere nisi ullam voluptates alias adipisci beatae omnis repudiandae impedit molestias voluptatum consectetur ipsum, doloremque molestiae veniam, dicta ducimus quod, quae quibusdam quasi. Quod, recusandae?
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil voluptatem rem aliquam sed ex earum cum quod eaque consequatur, impedit fuga eligendi facere nulla tempora hic assumenda et beatae obcaecati.
                        </p>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, dicta laudantium dignissimos quam ab velit eos quia quae suscipit itaque, voluptatem totam voluptate aspernatur. Iure facere nisi ullam voluptates alias adipisci beatae omnis repudiandae impedit molestias voluptatum consectetur ipsum, doloremque molestiae veniam, dicta ducimus quod, quae quibusdam quasi. Quod, recusandae?
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil voluptatem rem aliquam sed ex earum cum quod eaque consequatur, impedit fuga eligendi facere nulla tempora hic assumenda et beatae obcaecati.
                        </p>
                    </article>
                     <article class="blog-post">
                        <h2 class="blog-post-title">
                            ¿Qué encontrarás?
                        </h2>
                        <p class="blog-post-meta">
                            25 mayo 2021
                        </p>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, dicta laudantium dignissimos quam ab velit eos quia quae suscipit itaque, voluptatem totam voluptate aspernatur. Iure facere nisi ullam voluptates alias adipisci beatae omnis repudiandae impedit molestias voluptatum consectetur ipsum, doloremque molestiae veniam, dicta ducimus quod, quae quibusdam quasi. Quod, recusandae?
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil voluptatem rem aliquam sed ex earum cum quod eaque consequatur, impedit fuga eligendi facere nulla tempora hic assumenda et beatae obcaecati.
                        </p>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, dicta laudantium dignissimos quam ab velit eos quia quae suscipit itaque, voluptatem totam voluptate aspernatur. Iure facere nisi ullam voluptates alias adipisci beatae omnis repudiandae impedit molestias voluptatum consectetur ipsum, doloremque molestiae veniam, dicta ducimus quod, quae quibusdam quasi. Quod, recusandae?
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil voluptatem rem aliquam sed ex earum cum quod eaque consequatur, impedit fuga eligendi facere nulla tempora hic assumenda et beatae obcaecati.
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
                                    <router-link :to="{name: 'documentos', params: {categoria: 'documentos'}}">
                                    <a> Documentos </a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'infografias', params: {categoria: 'infografias'}}">
                                    <a> Infografías </a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'videos', params: {categoria: 'videos'}}">
                                    <a> Vídeos </a>
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

import NavbarComponent from '../NavbarComponent'
import FooterComponent from '../FooterComponent'
import listadoRepositorio from './RepositorioCategorias'
export default {
  components: {
      NavbarComponent,
      FooterComponent,
      listadoRepositorio
  }
}
</script>

<style lang="scss">
.blog-post {
    margin-bottom: 4rem;
}
.blog-post-title{
    margin-bottom: .25rem;
    font-size: 2.5rem;
}
.blog-post-meta {
        margin-bottom: 1.25rem;
    color: #727272;
}

</style>
