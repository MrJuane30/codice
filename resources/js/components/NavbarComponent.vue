<template>
    <div>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <router-link to="/">
                    <a class="navbar-brand" href="">
                        CoDiCE
                    </a>
                </router-link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label=""
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <router-link to="/nosotros">
                                <a class="btn btn-dark btn-lg">Nosotros</a>
                            </router-link>
                            <router-link to="/contacto">
                                <a class="btn btn-dark btn-lg">Contacto</a>
                            </router-link>
                            <router-link to="/servicios">
                                <a class="btn btn-dark btn-lg">Talleres</a>
                            </router-link>
                            <router-link to="/coDiEventos">
                                <a class="btn btn-dark btn-lg">Eventos</a>
                            </router-link>
                        </li>
                        <router-link to="/blog">
                                <a class="btn btn-dark btn-lg">Blog</a>
                            </router-link>
                         <li>
                            <router-link to="/repositorio">
                                <a class="btn btn-dark btn-lg">Repositorio</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/colectivos">
                                <a class="btn btn-dark btn-lg">Colectivos</a>
                            </router-link>
                        </li>
                    </ul>
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item dropdown" v-if="isAuth">
                            <a
                                id="navbarDropdown"
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >{{ user.name }}</a
                            >

                            <div
                                class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdown"
                            >
                                <a
                                    class="dropdown-item"
                                    href="http://127.0.0.1:8000/login"
                                    >Home <i class="fas fa-home"></i
                                ></a>
                                <a
                                    class="dropdown-item"
                                    href=""
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                >
                                    Salir <i class="fas fa-sign-out-alt"></i>
                                </a>

                                <form
                                    id="logout-form"
                                    action="logout"
                                    method="POST"
                                    class="d-none"
                                >
                                    <input
                                        type="hidden"
                                        name="_token"
                                        :value="csrf"
                                    />
                                </form>
                            </div>
                        </li>

                        <li class="nav-item" v-else>
                            <a
                                class="nav-link"
                                href="http://127.0.0.1:8000/login"
                                >Login</a
                            >
                        </li>
                        <li class="nav-item" v-if="!isAuth">
                            <a
                                class="nav-link"
                                href="http://127.0.0.1:8000/register"
                                >Registro</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
let user = document.head.querySelector("meta[name=user]");
export default {
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    computed: {
        user() {
            return JSON.parse(user.content);
        },
        isAuth() {
            return !!user.content;
        }
        /*methods: {
         submit : function(){
            this.$refs.form.submit();
            }
        }*/
    }
};
</script>
