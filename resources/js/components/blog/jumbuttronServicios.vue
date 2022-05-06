<template>
      <div class="p-4 p-md mb-4 text-white rounded bg-dark justify-content-center ">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4 font-italic">Conoce nuestros Talleres</h1>
                        <p class="py-4 lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, quas dignissimos doloremque tempora voluptas officiis magnam vitae quos itaque! Corrupti dolore ratione nostrum! At laudantium est exercitationem odit nemo atque!</p>
                    </div>
                     <div class="col-md-6 col-md-offset-5">
                         <div class="icono d-flex justify-content-center mt-5">
                            <i class="fas fa-concierge-bell"></i>                       
                         </div>
                     <div class="mt-5 py-6 d-flex justify-content-center">
                         <router-link to="/servicios">
                            <a class="btn btn-outline-warning btn-lg">Ver más</a>
                        </router-link>       
                     </div>
                    </div>
                </div>  
            </div>
</template>

<script>
export default {
    
}
</script>

<style lang="scss">
 .icono {
     font-size: 7rem;
 }

</style>>
