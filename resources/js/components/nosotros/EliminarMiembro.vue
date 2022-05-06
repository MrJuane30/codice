<template>
    
    <a type="submit" class="btn btn-danger w-100 mb-2" v-on:click="eliminarMiembro">Eliminar <i class="fas fa-user-times"></i></a>
                
                    
</template>

<script>
export default {
    props: ['miembroId'], 
    methods: {
        eliminarMiembro(){
           this.$swal({
            title: '¿Deseas eliminar este miembro?',
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
                            id: this.miembroId,
                        }
                        axios.post(`/miembros/${this.miembroId}`, {params, _method: 'delete'})
                            .then(respuesta=> {
                                this.$swal({
                                        title: 'Miembro eliminado',
                                        text: 'Se eliminó el miembro',
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