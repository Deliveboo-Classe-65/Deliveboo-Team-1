<template>
    
    <div class="video">
        <video autoplay muted loop class="video-jb">
            <source src="img/jb.mp4">
        </video>
        <div class="my-absolute-div">
            <h1 class="fw-bold text-white display-3 text-left w-75">I piatti dei ristoranti che ami a domicilio</h1>
        </div>
        <button type="button" class="border-none my-absolute-button btn btn-light">
            <router-link :to="{ name: 'restaurants.index' }">
                <span class="">Visualizza i ristoranti</span>
            </router-link>
        </button>
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
        
        height: 90vh;
        width: 100%;
        object-fit: cover;
        filter: brightness(60%);
    }

    .video {
        position: relative;
    }

    .my-absolute-div {
        position: absolute;
        top: 25%;
        right: 50%;
        bottom: 10%;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .my-absolute-button {
        position: absolute;
        top: 50%;
        right: 25%;

        a {
            text-decoration: none;
        }

    }

    @media only screen and (max-width: 768px) {

        .video-jb {
            height: 60vh;
        }

        .my-absolute-div {
            display: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 20%;
        }

        .my-absolute-button {
            position: absolute;
            top: 80%;
            right: 50%;
            transform: translate(50%, -50%);
        }

    }
</style>