/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueParticles from 'vue-particles';
import router from './router';
import VueSweetAlert2 from 'vue-sweetalert2';
import VueApexCharts from 'vue-apexcharts';
import AOS from 'aos';
import 'aos/dist/aos.css';
import moment from 'moment';









window.Vue = require('vue').default;
Vue.use(VueParticles);
Vue.use(VueSweetAlert2);
Vue.use(VueApexCharts);
Vue.prototype.moment = moment;




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.config.ignoredElements= ['trix-editor', 'trix-toolbar'];
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagina-inicio-component', require('./components/PaginaInicioComponent.vue').default);
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('eliminar-usuario', require('./components/user_admin/EliminarUsuario.vue').default);
Vue.component('chart-month', require('./components/charts/ChartMonth.vue').default);
Vue.component('chart-gender', require('./components/charts/ChartGender.vue').default);
Vue.component('eliminar-colectivo', require('./components/colectivos/EliminarColectivo.vue').default);
Vue.component('eliminar-publicacion', require('./components/publicaciones/EliminarPublicacion.vue').default);
Vue.component('eliminar-comentario', require('./components/blog/EliminarComentario.vue').default);
Vue.component('eliminar-amigo', require('./components/amigos/EliminarAmigo.vue').default);
Vue.component('eliminar-evento', require('./components/eventos/EliminarEvento.vue').default);
Vue.component('eliminar-miembro', require('./components/nosotros/EliminarMiembro.vue').default);
Vue.component('eliminar-documento', require('./components/repositorio/EliminarDocumento.vue').default);



Vue.component('pagination', require('laravel-vue-pagination'));



Vue.component('apexchart', VueApexCharts);







/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    created() {
        AOS.init()
    },
    router,
    components: {
        VueParticles,
    
    }
});

require('./mapa');
require('./dropzone');



