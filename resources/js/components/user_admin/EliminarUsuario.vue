<template>
    
    <a type="submit" class="btn btn-danger w-100 mb-2" v-on:click="eliminarUsuario">Eliminar <i class="fas fa-user-times"></i></a>
                
                    
</template>

<script>
export default {
    props: ['usuarioId'], 
    methods: {
        eliminarUsuario(){
           this.$swal({
            title: '¿Deseas eliminar este usuario?',
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
                            id: this.usuarioId,
                        }
                        axios.post(`/usuario/${this.usuarioId}`, {params, _method: 'delete'})
                            .then(respuesta=> {
                                this.$swal({
                                        title: 'Usuario Eliminado',
                                        text: 'Se eliminó el usuario',
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