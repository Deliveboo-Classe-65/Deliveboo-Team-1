<template>
    <div>
        <TheNavbar></TheNavbar>

        <TheMain></TheMain>
        <router-view></router-view>

        <TheFooter></TheFooter>
    </div>
</template>


<script>
import TheNavbar from './components/TheNavbar.vue';
import TheFooter from './components/TheFooter.vue';
import TheMain from './components/TheMain.vue';

export default {
    components: { TheNavbar, TheFooter, TheMain }
}
</script>




<style lang="scss">
@import "../sass/app.scss";

.container {
    font-family: 'IBM Plex Sans Arabic', sans-serif;
}
</style>