<template>
    <div>
        <div class="video">
            <video autoplay muted loop class="video-jb">
                <source src="img/jb.mp4">
            </video>
            <div class="my-absolute-div">
                <h1 class="fw-bold text-white display-3 text-center w-75">I piatti dei ristoranti che ami a domicilio</h1>
                <button type="button" class="border-none my-floating-button btn btn-light">
                    <router-link :to="{ name: 'restaurants.index' }">
                    <span class="">Visualizza i ristoranti</span> </router-link>
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {

            }
        },
        methods: {

        },
        mounted() {

        },
    }


</script>

<style lang="scss">

    .video-jb {
        
        height: 100vh;
        width: 100%;
        object-fit: cover;
    }

    .video {
        position: relative;
    }

    .my-absolute-div {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: rgba($color: black, $alpha: 0.4);
    }
</style>