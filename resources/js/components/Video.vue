<template>
    <div>
        <div class="video">
            <video autoplay muted loop class="video-jb">
                <source src="img/jb.mp4">
            </video>
            <div class="my-absolute-div">
                <div class="m-3 my-background text-start">
                    <h1 class="fw-bold display-3 text-primary mb-4">I piatti dei ristoranti che ami a domicilio</h1>
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