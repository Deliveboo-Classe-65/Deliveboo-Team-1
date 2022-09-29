<template>
    <main class="py-5">
        <section class="restaurant p-3">
            <div class="container">
                <div class="row restaurant-row">
                    <!-- Restaurant image -->
                    <div class="col-12 col-md-4 my-3">
                        <img :src="'/storage/img/restaurants/' + user.image" :alt="user.name" class="w-100 restaurant-img">
                    </div>
                    <!-- Restaurant name and description -->
                    <div class="col-12 col-md-6 my-3">
                        <h1>{{user.name}}</h1>
                        <span v-for="category in user.categories" :key="'category' + category.id" class="text-capitalize badge text-bg-primary text-white me-2">{{category.name}}</span>
                        <p>{{user.description}}</p>
                    </div>
                    <!-- Restaurant time to deliver -->
                    <div class="col col-2 my-3 text-end">
                        <router-link :to="{ name: 'restaurants.index' }" tag="button" class="border-none btn btn-primary"><font-awesome-icon icon="fa-solid fa-arrow-left" /> Indietro</router-link>
                    </div>
                </div>
            </div>
        </section>
        <Menu></Menu>
    </main>
</template>


<script>
    import axios from 'axios';
    import Menu from './Menu.vue';

    export default {
        components: { Menu },

        data() {
            return {
                user: {},
                randomNumber: ''
            }
        },

        methods: {
            fetchData() {
                axios.get("/api/users/" + this.$route.params.id)
                    .then((resp) => {
                        this.user = resp.data
                    })
            },

            randomDelivery() {
                let min = 15;
                let max = 90;
                let randomNumber =  Math.floor(Math.random() * (max - min) + min);
                return this.randomNumber = randomNumber;
            },

        },

        mounted() {
            this.fetchData();
            this.randomDelivery();
        }
    }
</script>

<style lang="scss" scoped>
    .restaurant {
        background-color: #fff;
        border-bottom: 1px solid rgba(0,0,0,.08);
    }

    .restaurant-img {
        height: 200px;
        object-fit: cover;
        object-position: center;
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

