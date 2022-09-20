<template>
    <div>    
        <h1>Home</h1>
        <img src="/storage/img/categorie/categoria_messicano.png">

        <Restaurant></Restaurant>
        <Menu></Menu>


    </div>
</template>

<script>
    import Restaurant from './Restaurant.vue';
    import Menu from '../components/Menu.vue';

    export default {
    components: { Restaurant, Menu }
}
</script>