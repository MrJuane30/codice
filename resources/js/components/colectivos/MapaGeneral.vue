<template>
<div>
    <h1 class="text-center">Ubicación servicios</h1>
    <div class="mapa">
        <l-map
        :zoom="zoom"
        :center="center"
        :options="mapOptions">
        <l-tile-layer :url="url" :attribution="attribution" />
        <l-marker
        v-for="colectivo in colectivos" v-bind:key="colectivo.id"
        :lat-lng="obtenerCoordenas(colectivo)" 
        @click="redireccionar(colectivo.id)"
>
                <l-tooltip>
                    <div>{{colectivo.nombre}}</div>
                </l-tooltip>
            </l-marker>
        </l-map>
    </div>
</div>
</template>

<script>
import {latLng} from 'leaflet';
import {LMap, LTileLayer, LMarker, LTooltip} from 'vue2-leaflet';
export default {
    components:{
        latLng,
        LMap,
        LTileLayer,
        LMarker,
        LTooltip
    },
    data() {
    return {
      zoom: 6,
      center: latLng(19.533867, -96.925807),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      currentZoom: 11.5,
      currentCenter: latLng(19.533867, -96.925807),
      showParagraph: false,
      mapOptions: {
        zoomSnap: 0.5
      },
      showMap: true
    };
  },
  created(){
        axios.get('/api/colectivos/')
      .then(respuesta =>{
         this.$store.commit("AGREGAR_COLECTIVOS", respuesta.data);
         console.log(respuesta.data)
      });
  },
  computed: {
      colectivos(){
          return this.$store.state.colectivos;
      }
  },
  methods:{
      obtenerCoordenas(colectivo){
          return {
              lat: colectivo.lat,
              lng: colectivo.lng
          }
      },
       redireccionar(id){
            this.$router.push({name:`colectivo`, params: {id}})
        }
  }
}
</script>

<style scoped>
@import 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css';
.mapa{
    height: 800px;
    width: 100%;
}
</style>