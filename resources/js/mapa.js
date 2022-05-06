import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();


document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#mapa')) {
        const lat = document.querySelector('#lat').value === '' ? 19.5224986 : document.querySelector('#lat').value ;
        const lng = document.querySelector('#lng').value === '' ? -96.908937 : document.querySelector('#lng').value ;

    
    const mapa = L.map('mapa').setView([lat, lng], 16);

    //Eliminar pines previos
    let markers= new L.featureGroup().addTo(mapa);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapa);
    
    let marker;
    
    // agregar el pin
    marker = new L.marker([lat, lng], {
        draggable: true,
        autoPan: true
    }).addTo(mapa);

    //agregar el pin a las capas
    markers.addLayer(marker);

     //Llenar los campos
     function llenarInputs(resultado){
        document.querySelector('#direccion').value = resultado.address.Address  || '';
        document.querySelector('#colonia').value = resultado.address.Neighborhood || '';
        document.querySelector('#lat').value = resultado.latlng.lat || '';
        document.querySelector('#lng').value = resultado.latlng.lng || '';
     }

     //reubicar pin
     function reubicarPin(marker){
             //detectar el movimiento
        marker.on('moveend', function(e){
        marker= e.target;

        const posicion= marker.getLatLng();

        //centrar Automaticamente
        mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));
        //Reverse geocoding cuando el usuario reubica el pin

        geocodeService.reverse().latlng(posicion,16).run(function(error, resultado){
            console.log(error);

            marker.bindPopup(resultado.address.LongLabel);
            marker.openPopup();
             //Llenar los campos
             llenarInputs(resultado);
        });

    });
     }

    //GeocodeService
    const geocodeService= L.esri.Geocoding.geocodeService();   
    
    //Buscador de direcciones
    function buscarDireccion(e){
       
        if(e.target.value.length> 1){
            provider.search({query: e.target.value })
                .then(resultado => {
                    if(resultado[0]){
                        //limpiar pines previos
                        markers.clearLayers();
                         //Reverse geocoding cuando el usuario reubica el pin
                         geocodeService.reverse().latlng(resultado[0].bounds[0],16).run(function(error, resultado){
                            
                            //llenar inputs
                            llenarInputs(resultado);
                            //centrar el mapa
                            mapa.setView(resultado.latlng);
                            //agregar el pin
                            marker = new L.marker(resultado.latlng, {
                                draggable: true,
                                autoPan: true,
                            }).addTo(mapa);

                            markers.addLayer(marker);
                              //Mover el pin
                              reubicarPin(marker);
                         
                           
                        });
                    }
                }).catch(error => {
                    console.log(error);
                });
        }
    }
    const buscador= document.querySelector("#formbuscador");
    buscador.addEventListener('blur', buscarDireccion);
    reubicarPin(marker);
    }
    });

