<template>
    <div>
        <div class="bg-primary justify-content-center border">
            <div class="container my-4 mt-5">
                <h2 class="text-center text-success titulo mb-2">Más colectivos</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img :src=" '/images/colective.png'" class="w-75 h-75 p-3" alt="">                     
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis sunt amet debitis quae accusamus dolorum incidunt provident, dignissimos facilis maxime exercitationem aliquam quidem enim! Nesciunt similique explicabo omnis dolor eaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nemo tenetur quibusdam velit. Assumenda qui expedita obcaecati corporis odit, molestias, explicabo a et velit, fugit praesentium temporibus quidem reiciendis dignissimos!</p>
                        <div class="col-md text-center">
                             <router-link to="/colectivos">
                                 <a class="btn bg-success btn-lg">Ver más</a>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
   
}
</script>