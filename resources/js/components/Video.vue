<template>
    <div>
        <div class="video">
            <video autoplay muted loop class="video-jb">
                <source src="img/jb.mp4">
            </video>
            <div class="my-absolute-div">
                <div class="my-background text-md-start text-center">
                    <h1 class="fw-bold display-3 text-primary mb-4 my-w-75 mx-auto">I piatti dei ristoranti che ami a domicilio</h1>
                    <router-link :to="{ name: 'restaurants.index' }" tag="button" class="border-none btn btn-secondary px-5 py-2 fs-4">Visualizza i ristoranti</router-link>
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
    .video-jb {
        height: 60vh;
        width: 100%;
        object-fit: cover;
        object-position: top;
        filter: brightness(60%);
    }

    .my-background {
        max-width: 500px;
    }

    .video {
        position: relative;
    }

    .my-absolute-div {
        position: absolute;
        right: 0;
        bottom: 10%;
        left: 10%;
        align-items: center;

        @media only screen and (max-width: 768px) {
            left: 0;

            div {
                margin: 0 auto;
            }
        }
    }
</style>