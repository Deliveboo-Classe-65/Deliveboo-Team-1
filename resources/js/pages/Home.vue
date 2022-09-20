<template>

    <div class="container p-2">
        <div class="section-title">
            <h2>Ricerca per categoria</h2>
        </div>

        <!-- Restaurant image -->
        <div class="row restaurant-row">

            <div class="col-3" v-for="user in users" :key="user.id">
                <router-link class="text-decoration-none" :to="{ name: 'restaurant.show', params:{ id: user.id}}">
                    <div class="content">
                        <img src="../../../public/img/bk.jpeg" alt="Burger King" class="w-100">
                        <h4>{{user.name}}</h4>
                    </div>
                </router-link>
            </div>
        </div>
    </div>


    <!-- Restaurant name and description -->

    <!-- <div class="d-flex categories">
        <p class="delivery-time">20 - 25 minuti</p>
        <p class="me-3">Americano</p>
        <p class="me-3">Hamburger</p>
    </div>
    <h5>IL NOSTRO GUSTO? SUPERIORE. BURGER KING®. A MODO TUO.</h5>


    !-- Restaurant time to deliver -->






</template>
  
<script>

import axios from "axios"
import Restaurant from '../pages/Restaurant.vue';
import Menu from '../pages/Menu.vue';


export default {
    components: { Restaurant, Menu },



    data() {
        return {
            users: [],
        }
    },
    methods: {
        fetchData() {
            axios.get("/api/users/")
                .then((resp) => {
                    this.users = resp.data
                })
        }
    },
    mounted() {
        this.fetchData();
    }
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