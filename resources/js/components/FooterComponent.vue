<template>
    <div>
        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #3b5998;"
                        href="#!"
                        role="button"
                        @click="redirect('https://www.facebook.com/codiceoficialmx')"
                        ><i class="fab fa-facebook-f" ></i
                    ></a>

                    <!-- Twitter -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #55acee;"
                        href="#!"
                        role="button"
                        ><i class="fab fa-twitter"></i
                    ></a>

                    <!-- Google -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #dd4b39;"
                        href="#!"
                        role="button"
                        @click="redirect('https://www.youtube.com/channel/UCzTyQcEInACmpaysF2cTKaQ')"
                        ><i class="fab fa-youtube"></i
                    ></a>

                    <!-- Instagram -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #ac2bac;"
                        href="#!"
                        role="button"
                        ><i class="fab fa-instagram"></i
                    ></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div
                class="text-center p-3"
                style="background-color: rgba(0, 0, 0, 0.2);"
            >
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/"
                    >codice.com</a
                >
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</template>

<script
    src="https://kit.fontawesome.com/2760dbc43b.js"
    crossorigin="anonymous"
></script>

<script>
export default {
    methods: {
      redirect: function (link, target = '_blank') {
            window.open(link, target);
        },
    }
};
</script>
