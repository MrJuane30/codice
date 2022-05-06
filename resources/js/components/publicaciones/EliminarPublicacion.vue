<template>
    
    <a type="submit" class="btn btn-danger w-100 mb-2" v-on:click="eliminarPublicacion">Eliminar <i class="fas fa-user-times"></i></a>
                
                    
</template>

<script>
export default {
    props: ['publicacionId'], 
    methods: {
        eliminarPublicacion(){
           this.$swal({
            title: '¿Deseas eliminar esta publicación?',
            text: "Una vez eliminada no puede recuperarse",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
           }).then((result) => {
                    if (result.value) {
                        //Enviar la petición al servidor
                      const params = {
                            id: this.publicacionId,
                        }
                        axios.post(`/publicacion/${this.publicacionId}`, {params, _method: 'delete'})
                            .then(respuesta=> {
                                this.$swal({
                                        title: 'Publicación Eliminada',
                                        text: 'Se eliminó la publicación',
                                        icon: 'success'
                                    });
                                    //eliminar receta del dom
                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => 
                            console.log(error))
                        
                    }
                })
        }
    }
}
</script>