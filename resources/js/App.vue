<template>
    <div>
        <TheNavbar></TheNavbar>

        <router-view></router-view>

        <TheFooter></TheFooter>
    </div>
</template>


<script>
import TheNavbar from './components/TheNavbar.vue';
import TheFooter from './components/TheFooter.vue';
import Home from './pages/Home.vue';
import Restaurant from './pages/Restaurant.vue';
import Restaurantslist from './pages/Restaurantslist.vue';


export default {
    components: { TheNavbar, TheFooter, Home, Restaurant, Restaurantslist }
}
</script>




<style lang="scss">
// @import "../sass/frontend.scss";

.container {
    font-family: 'IBM Plex Sans Arabic', sans-serif;
}
</style>