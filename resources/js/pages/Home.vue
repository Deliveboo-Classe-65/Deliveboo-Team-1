<template>
    <div>    
        <h1>Home</h1>
        <img src="/storage/img/categorie/categoria_messicano.png">

        <Restaurant></Restaurant>

    </div>
</template>

<script>
    import Restaurant from './Restaurant.vue';

    export default {
    components: { Restaurant }
}
</script>