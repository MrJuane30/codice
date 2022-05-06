<template>
    <div class="col-md text-center">
        <span id="like-btn" class="like-btn" @click="likePublicacion" :class="{ 'like-active' : this.like}"></span>
            <p> A {{ cantidadLikes }} Les gustó este post</p>
    </div>
</template>

<script>
export default {
    props:['publicacionId'],
    data: function () {
        return {
            like: '',
            likes: 0
        }
    },
    mounted(){  
        axios.get('/likes/' + this.publicacionId)
        .then(res=>{
            this.like=res.data.like;
            this.likes= res.data.likes;
        });
    },
    methods: {
        likePublicacion(){
            document.getElementById("like-btn").classList.toggle('like-active');
            axios.post('/publicaciones/' + this.publicacionId)
            .then(respuesta=> {
                 if(respuesta.data.attached.length > 0 ) {
                            this.$data.likes++;
                        } else  {
                            this.$data.likes--;
                        }
                        this.like = !this.like

            })
            .catch(error => {
                     window.location = '/register';      
                    });
        }
    },
    computed: {
            cantidadLikes: function() {
                return this.likes
            }
        }
}
</script>