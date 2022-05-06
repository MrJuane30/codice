<template>
    
    <a type="submit" class="btn btn-danger w-100 mb-2" v-on:click="eliminarEvento">Eliminar <i class="fas fa-user-times"></i></a>
                
                    
</template>

<script>
export default {
    props: ['eventoId'], 
    methods: {
        eliminarEvento(){
           this.$swal({
            title: '¿Deseas eliminar este evento?',
            text: "Una vez eliminado no puede recuperarse",
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
                            id: this.eventoId,
                        }
                        axios.post(`/acontecimientos/${this.eventoId}`, {params, _method: 'delete'})
                            .then(respuesta=> {
                                this.$swal({
                                        title: 'Evento Eliminado',
                                        text: 'Se eliminó el evento',
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