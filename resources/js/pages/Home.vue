<template>
    <div>
    <Video></Video>
    <WorkWithUs></WorkWithUs>
    <!-- <div class="container p-2">
        <div class="section-title">
            <h2>Ricerca per categoria</h2>
            <div class="categories-list">
                <button type="button" class="btn btn-light" v-for="category in categories" :key="category.id">
                    {{category.name}}</button>
            </div>
        </div> -->

        <!-- Restaurant image -->
        <!-- <div class="row restaurant-row">

            <div class="col-3" v-for="user in users" :key="user.id">
                <router-link class="text-decoration-none" :to="{ name: 'restaurant.show', params:{ id: user.id}}">
                    <div class="content">
                        <img :src="user.image" alt="Burger King" class="w-100">
                        <h4>{{user.name}}</h4>
                    </div>
                </router-link>
            </div>
        </div>
    </div> -->


    <!-- Restaurant name and description -->

    <!-- <div class="d-flex categories">
        <p class="delivery-time">20 - 25 minuti</p>
        <p class="me-3">Americano</p>
        <p class="me-3">Hamburger</p>
    </div>
    <h5>IL NOSTRO GUSTO? SUPERIORE. BURGER KING®. A MODO TUO.</h5>


    !-- Restaurant time to deliver -->





    </div>
</template>
  
<script>

import axios from "axios"
import Restaurant from '../pages/Restaurant.vue';
import Menu from '../pages/Menu.vue';
import Video from '../components/Video.vue';
import WorkWithUs from '../components/WorkWithUs.vue';


export default {
    components: { Restaurant, Menu, Video, WorkWithUs },



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
.restaurant {
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, .08);
}

.restaurant-row {
    height: 100%;
    min-height: 244px;
    display: flex;
}

.icon {
    width: 20px;
    height: 20px;
    margin-right: 4px;
}
</style>