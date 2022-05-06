<template>
    <div class="container mt-5">
        <h3 class="text-center">Modelo de playeras</h3>
        <carousel :autoplay="true">
            <slide>
            <div class="card">
              <img class="card-img-top" src="storage/static/modelo1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Modelo 1</h5>
              </div>
            </div>           
           </slide>
              <slide>
            <div class="card">
              <img class="card-img-top" src="storage/static/modelo2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Modelo 2</h5>
              </div>
            </div>           
           </slide>
              <slide>
            <div class="card">
              <img class="card-img-top" src="storage/static/modelo3.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Modelo 3</h5>
              </div>
            </div>           
           </slide>
              <slide>
            <div class="card">
              <img class="card-img-top" src="storage/static/modelo4.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Modelo 4</h5>
              </div>
            </div>           
           </slide>
              <slide>
            <div class="card">
              <img class="card-img-top" src="storage/static/modelo5.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Modelo 5</h5>
              </div>
            </div>           
           </slide>
              <slide>
            <div class="card">
              <img class="card-img-top" src="storage/static/modelo6.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center">Modelo 6</h5>
              </div>
            </div>           
           </slide>
    </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
   components: {
       Carousel,
       Slide
   }
}
</script>