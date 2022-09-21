<template>
    <div>
        <div class="video">
            <video autoplay muted loop class="video-jb">
                <source src="img/jb.mp4">
            </video>
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
        margin-top: 4rem;
        height: 100vh;
        width: 100%;
        object-fit: cover;
    }
</style>