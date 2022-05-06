import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        colectivos :[],
        colectivo: {},
        categorias: [],
        categoria: [],
        publicacion: {},
        comentarios: [],
        amigos: [],
        eventos: [],
        servicios: [],
        talleres: [],
        imagenes: [],
        taller: {},
        miembros: [],
        miembro: {},
        documentos: [],
        repositorio: []
    },
    mutations : {
        AGREGAR_COLECTIVOS(state,colectivos){
            state.colectivos= colectivos;
        },
        AGREGAR_COLECTIVO(state, colectivo){
            state.colectivo= colectivo;
        },
        AGREGAR_CATEGORIAS(state, categorias){
            state.categorias= categorias;
        },
        AGREGAR_CATEGORIA(state, categoria){
            state.categoria= categoria;
        },
        AGREGAR_PUBLICACION(state, publicacion){
            state.publicacion= publicacion;
        },
        AGREGAR_COMENTARIOS(state, comentarios){
            state.comentarios= comentarios;
        },
        AGREGAR_AMIGOS(state, amigos){
            state.amigos= amigos;
        },
        AGREGAR_EVENTOS(state, eventos){
            state.eventos= eventos;
        },
        AGREGAR_SERVICIOS(state, servicios){
            state.servicios= servicios;
        },
        AGREGAR_TALLERES(state, talleres){
            state.talleres= talleres;
        },
        AGREGAR_IMAGENES(state, imagenes){
            state.imagenes= imagenes;
        },
        AGREGAR_TALLER(state, taller){
            state.taller= taller;
        },
        AGREGAR_MIEMBROS(state, miembros){
            state.miembros= miembros;
        },
        AGREGAR_MIEMBRO(state, miembro){
            state.miembro= miembro;
        },
        AGREGAR_DOCUMENTOS(state, documentos){
            state.documentos= documentos;
        },
        AGREGAR_REPOSITORIO(state, repositorio){
            state.repositorio= repositorio;
        },

    },
    getters: {
        obtenerColectivo: state => {
            return state.colectivo;
        },
        obtenerCategorias: state => {
            return state.categorias;
        },
        obtenerCategoria: state => {
            return state.categoria;
        },
        obtenerPublicacion: state => {
            return state.publicacion;
        },
        obtenerComentarios: state => {
            return state.comentarios;
        },
        obtenerAmigos: state => {
            return state.amigos;
        },
        obtenerEventos: state => {
            return state.eventos;
        },
        obtenerServicios: state => {
            return state.servicios;
        },
        obtenerTalleres: state => {
            return state.talleres;
        },
        obtenerImagenes: (state) => {
            return state.imagenes;
        },
        obtenerTaller: state => {
            return state.taller;
        },
        obtenerIMGS: state => {
            return state.taller.imagenes;
            },
        obtenerMiembros: state => {
            return state.miembros;
        },
        obtenerMiembro: state => {
            return state.miembro;
        },
        obtenerDocumentos: state => {
            return state.documentos
        },
        obtenerRepositorio: state => {
            return state.repositorio
        }

    }
});