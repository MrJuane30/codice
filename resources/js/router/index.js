import Vue from 'vue'
import VueRouter from 'vue-router'
import VuePageTransition from 'vue-page-transition'
import InicioPagina from '../components/ExampleComponent'
import NosotrosPagina from '../components/nosotros/NosotrosComponent'
import CorreoComponent from '../components/correo/CorreoComponent'
import PrincipalColectivos from '../components/colectivos/PrincipalColectivos'
import Colectivo from '../components/colectivos/Colectivo'
import Blog from '../components/blog/blogPrincipal'
import CategoriaCiencia from '../components/blog/categoriaCiencia'
import CategoriaEducacion from '../components/blog/categoriaEducacion'
import CategoriaAvisos from '../components/blog/categoriaAvisos'
import CategoriaOpinion from '../components/blog/categoriaOpinion'
import CategoriaNoticias from '../components/blog/categoriaNoticias'
import Publicacion from '../components/blog/publicacion'
import serviciosPrincipal from '../components/servicios/serviciosPrincipal'
import servicio from '../components/servicios/servicio'
import AmigosForm from '../components/amigos/AmigosForm'
import EventosPrincipal from '../components/eventos/eventosPrincipal'
import MiembroComponent from '../components/nosotros/MiembroComponent'
import RepositorioPrincipal from '../components/repositorio/RepositorioPrincipal'
import RepositorioDocumentos from '../components/repositorio/categoriaDocumentos'
import RepositorioInfografias from '../components/repositorio/categoriaInfografias'
import RepositorioVideos from '../components/repositorio/categoriaVideos'








const routes = [
    {
        path: '/',
        component: InicioPagina
    },
    {
        path: '/nosotros',
        component: NosotrosPagina
    },
    {
        path:'/miembro/:id',
        name: "miembro",
        component: MiembroComponent
    }, 
    {
        path:'/contacto',
        component:CorreoComponent
    },
    {
    path:'/colectivos',
    component:PrincipalColectivos
    },
    {
        path:'/colectivos/:id',
        name: "colectivo",
        component: Colectivo
    }, 
    {
        path:'/blog',
        component: Blog
    },
    {
        path:'/categoria/:categoria',
        name: "ciencia",
        component: CategoriaCiencia
    },
    {
        path:'/categoria/:categoria',
        name: "educacion",
        component: CategoriaEducacion
    },
    {
        path:'/categoria/:categoria',
        name: "avisos",
        component: CategoriaAvisos
    },
    {
        path:'/categoria/:categoria',
        name: "opinion",
        component: CategoriaOpinion
    },
    {
        path:'/categoria/:categoria',
        name: "noticias",
        component: CategoriaNoticias
    },
    {
        path:'/publicaciones/:id',
        name: "publicacion",
        component: Publicacion
    }, 
    {
        path:'/servicios',
        component: serviciosPrincipal
    },
    {
        path:'/servicios/:id',
        name: "servicio",
        component: servicio
    }, 
    {
        path:'/amigos',
        component: AmigosForm
    }, 
    {
        path:'/coDiEventos',
        component: EventosPrincipal
    }, 
    {
        path:'/repositorio',
        component: RepositorioPrincipal
    }, 
    {
        path:'/repositorios/:categoria',
        name: "documentos",
        component: RepositorioDocumentos
    },
    {
        path:'/repositorios/:categoria',
        name: "infografias",
        component: RepositorioInfografias
    },
    {
        path:'/repositorios/:categoria',
        name: "videos",
        component: RepositorioVideos
    },

]

const router= new VueRouter({
    routes
});

Vue.use(VueRouter)
Vue.use(VuePageTransition)

export default router;