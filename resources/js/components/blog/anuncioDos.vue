<template>
    <div class="container">
        <div class="row bg-primary mt-5">
            <div class="card">
                <div
                    class="bg-image hover-overlay ripple"
                    data-mdb-ripple-color="light"
                >
                    <img
                        src="https://mdbootstrap.com/img/new/standard/nature/035.jpg"
                        class="img-fluid"
                    />
                    <a href="#!">
                        <div
                            class="mask"
                            style="background-color: rgba(251, 251, 251, 0.15);"
                        ></div>
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Visita nuestro repositorio</h3>
                    <p class="card-text">
                        Podrás encontrar fotos, vídeos y documentos.
                    </p>
                    <router-link to="/repositorio">
                                <a class="btn btn-dark btn-lg">Repositorio</a>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
