const { default: Axios } = require("axios");

document.addEventListener('DOMContentLoaded', () =>{
    Dropzone.autoDiscover= false;


    if(document.querySelector('#dropzone')){
        const dropzone= new Dropzone('#dropzone', {
            url: '/imagenes/store',
            dictDefaultMessage: 'Sube hasta 10 imagénes',
            maxFiles:10,
            required: true,
            acceptedFiles: ".png,.jpg,.gif,.jpeg",
            addRemoveLinks: true,
            dictRemoveFile: "Eliminar imagen",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            init: function (){
                const galeria = document.querySelectorAll('.galeria');
                if(galeria.length>0){
                    galeria.forEach(imagen => {
                        const imagenPublicada={}
                        imagenPublicada.size=1;
                        imagenPublicada.name= imagen.value;
                        imagenPublicada.nombreServidor= imagen.value;
                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada, `/storage/${imagenPublicada.name}`);
                        imagenPublicada.previewElement.classList.add('dz-success');
                        imagenPublicada.previewElement.classList.add('dz-complete');

                    })
                }
            },
            success: function(file, respuesta) {
                 file.nombreServidor= respuesta.archivo;
            },
            sending: function(file, xhr, formData){
                formData.append('uuid', document.querySelector('#uuid').value);
            },
            removedfile: function(file, respuesta){
                const params = {
                    imagen: file.nombreServidor
                }
                axios.post('/imagenes/destroy', params).then(respuesta => {
                    console.log(respuesta);
                    //Eliminar del dom
                    file.previewElement.parentNode.removeChild(file.previewElement);
                });

            }
           
        }); 
    }

})