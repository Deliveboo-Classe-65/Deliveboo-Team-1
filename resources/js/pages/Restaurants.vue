<template>
    <div>
        <div class="container p-2">
        <div class="section-title">
            <h2>Ricerca per categoria</h2>
            <div class="categories-list">
                <button type="button" class="btn btn-light" v-for="category in categories" :key="category.id">
                    {{category.name}}</button>
            </div>
        </div>

        <!-- Restaurant image -->
        <div class="row restaurant-row">

            <div class="col-3" v-for="user in users" :key="user.id">
                <router-link class="text-decoration-none" :to="{ name: 'restaurant.show', params:{ id: user.id}}">
                    <div class="content">
                        <img :src="user.image" alt="Burger King" class="w-100">
                        <h4>{{user.name}}</h4>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
    </div>
</template>

<script>

    import axios from "axios"
    import Restaurant from '../pages/Restaurant.vue';
    
    
    export default {
        components: { Restaurant },
    
    
    
        data() {
            return {
                users: [],
                categories: [],
            }
        },
        methods: {
            fetchDataUsers() {
                axios.get("/api/users/")
                    .then((resp) => {
                        this.users = resp.data
                    })
            },
            fetchDataCategories() {
                axios.get("/api/categories/")
                    .then((resp) => {
                        this.categories = resp.data
                    })
            }
    
    
        },
        mounted() {
            this.fetchDataUsers();
            this.fetchDataCategories();
        },
    
    
    
    }
    </script>

<style lang="scss">

</style>