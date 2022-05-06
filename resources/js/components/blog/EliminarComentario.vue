<template>
    
        <a type="submit" class="text-danger" v-on:click="eliminarComentario">Eliminar comentario</a>
          
                    
</template>

<script>
export default {
    props: ['comentarioId'], 
    methods: {
        eliminarComentario(){
           this.$swal({
            title: '¿Deseas eliminar este comentario?',
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
                            id: this.comentarioId,
                        }
                        axios.post(`/comentario/${this.comentarioId}`, {params, _method: 'delete'})
                            .then(respuesta=> {
                                this.$swal({
                                        title: 'comentario Eliminado',
                                        text: 'Se eliminó el comentario',
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